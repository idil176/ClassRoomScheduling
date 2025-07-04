<?php

class Sc
{
    public function getRouteInfo()
    {
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($url, '/'));

        $pagesIndex = array_search('Pages', $parts);

        $module = isset($parts[$pagesIndex + 1]) ? $parts[$pagesIndex + 1] : null;
        $page = isset($parts[$pagesIndex + 2]) ? pathinfo($parts[$pagesIndex + 2], PATHINFO_FILENAME) : null;

        return [
            'module' => $module,
            'page' => $page
        ];
    }

    public function callApi(string $method, string $url, array $data = [], array $headers = [], bool $useToken = true): array
    {
        $method = strtoupper($method);
        $ch = curl_init();

        $defaultHeaders = [
            'Content-Type: application/json'
        ];

        if ($useToken && isset($_SESSION['auth']['token'])) {
            $defaultHeaders[] = 'Authorization: Bearer ' . $_SESSION['auth']['token'];
        }

        $jsonData = json_encode($data);

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array_merge($defaultHeaders, $headers),
            CURLOPT_POSTFIELDS => $jsonData
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error || !$response) {
            return [
                'status' => 'error',
                'message' => 'Bağlantı hatası: ' . $error
            ];
        }

        $json = json_decode($response, true);
        if (!is_array($json)) {
            return [
                'status' => 'error',
                'message' => 'Geçersiz JSON yanıtı'
            ];
        }

        return $json + ['http_code' => $httpCode];
    }

    public function login(string $email, string $password, string $loginEndpoint)
    {
        session_start();

        $email = trim($email);
        $password = trim($password);

        if (!$email || !$password) {
            return $this->jsonResponse('error', 'Email veya şifre eksik.');
        }

        $response = $this->callApi('POST', $loginEndpoint, [
            'email' => $email,
            'password' => $password
        ], [], false); // Token gönderme

        if (!isset($response['token'])) {
            return $this->jsonResponse('error', $response['error'] ?? 'Giriş başarısız.');
        }

        $_SESSION['auth'] = [
            'email' => $email,
            'userType' => $response['role'] ?? 'user',
            'token' => $response['token']
        ];

        return $this->jsonResponse('success', 'Giriş başarılı.', [
            'redirect' => '../Pages/' . ucfirst($_SESSION['auth']['userType']) . '/Home.php'
        ]);
    }

    private function jsonResponse(string $status, string $message, array $extra = [])
    {
        header('Content-Type: application/json');
        echo json_encode(array_merge([
            'status' => $status,
            'message' => $message
        ], $extra));
        exit;
    }

    public function redirectByRole()
    {
        
        session_start();
        if (!isset($_SESSION['auth']['userType'])) {
            header("Location: ../../Auth/Sign-in.php");
            exit;
        }

        $userType = $_SESSION['auth']['userType'];
        switch ($userType) {
            case 'admin':
                header("Location: ../../Pages/Admin/Home.php");
                break;
            case 'user':
                header("Location: ../../Pages/User/Home.php");
                break;
            default:
                header("Location: ../../Auth/Sign-in.php");
                break;
        }

        exit;
    }

    public function checkAccess(string $requiredType)
    {
        session_start();
        if (!isset($_SESSION['auth']['userType'])) {
            header("Location: ../../Auth/Sign-in.php");
            exit;
        }

        if ($_SESSION['auth']['userType'] !== $requiredType) {
            // Farklı kullanıcı tipiyse kendi sayfasına at
            $this->redirectByRole();
            exit;
        }
    }
}

