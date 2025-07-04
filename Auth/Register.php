<!-- Auth/Register.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğretim Üyesi Kayıt</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background:darkgrey;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: white;
            padding: 30px;
            border-0: 
            box-shadow: 0 0 15px rgba(36, 39, 200, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(49, 80, 103);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(37, 29, 152);
        }

        .error, .success {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
        
    </style>
</head>
<body>
    <div class="register-container">
    <img   class="mb-4 rounded"  src="../assets/images/norveç.jpg"  alt="" width="300" height="200" style="display: block; margin-left: auto; margin-right: auto;">
    <h2>Sihirli Yolculuğa Hoşgeldin!</h2>
    <form id="registerForm">
        <label>İsim:</label>
        <input type="text" name="name" required ><br>

        <label>E-posta:</label>
        <input type="email" name="email" required><br>

        <label>Şifre:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Kayıt Ol</button>
    </form>
     

        <p class="mt-3 mb-0 text-body-secondary text-center">
  Hesabınız Varsa ⇒ <a href="Sign-in.php" style="color:rgb(58, 94, 113); font-weight: bold;">Giriş yap</a>
</p>

        <div id="responseMessage" class="text-center mt-2 small  "></div>

        </form>
        <div id="responseMessage"></div>
    </div>
     

    <script>
        document.getElementById('registerForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            const response = await fetch('/room_scheduler/register-lecturer.php', { // DİKKAT: Yol
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert('Kayıt başarılı!');
                window.location.href = '../Pages/User/Home.php';
            } else {
                alert('Kayıt başarısız: ' + result.message);
            }
        });
    </script>
</body>
</html>
