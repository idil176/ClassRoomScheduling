// Sayfa tamamen yüklendiğinde aşağıdaki kodu çalıştır
$(document).ready(function () {

    // Giriş formu gönderildiğinde bu fonksiyon çalışır
    $('#sign-in-form').on('submit', function (e) {
        e.preventDefault(); // Sayfanın yeniden yüklenmesini engeller

        const form = this;             // Formun kendisini al
        const url = form.action;       // Formun gönderileceği back-end URL’si

        // Formdan alınan e-posta ve şifre bilgileri
        const formData = {
            email: form.email.value,
            password: form.password.value
        };

        // AJAX ile sunucuya POST isteği gönder
        $.ajax({
            url: url,                  // Hedef URL (örneğin: auth-login-ajax.php)
            method: 'POST',           // HTTP yöntemi
            data: formData,           // Gönderilecek veriler
            dataType: 'json',         // Beklenen cevap tipi

            // Sunucudan başarılı bir yanıt geldiğinde çalışır
            success: function (response) {
                // Eğer yanıtın durumu "success" ise kullanıcıya bildirim göster
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Giriş Başarılı',
                        text: response.message,
                        confirmButtonText: 'Tamam'
                    }).then(() => {
                        // Kullanıcıyı ilgili sayfaya yönlendir
                        window.location.href = response.redirect || 'Pages/User/Home.php';
                    });
                } else {
                    // Hatalı giriş durumu için uyarı ver
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata',
                        text: response.message || 'Giriş başarısız.'
                    });
                }
            },

            // AJAX isteğinde teknik bir hata olursa çalışır
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Sunucu Hatası',
                    // JSON cevabında hata mesajı varsa göster, yoksa varsayılan mesajı kullan
                    text: xhr.responseJSON?.message || 'Bir şeyler ters gitti.'
                });
            }
        });
    });
});
