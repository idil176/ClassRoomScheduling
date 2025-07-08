
$(document).ready(function () {

    window.addEventListener('offline', () =>
        Alert('İnternet bağlantınızı kontrol ediniz.')
    );

    Engine.init();
});

function Engine() {
    Engine.MasterPage();
}
Engine.init = function () {
    var module = this.getModul().split(',');

    for (var i = 0; i < module.length; i++) {
        this.runModule(module[i]);
    }
};

Engine.getModul = function () {
    var scripts = document.getElementById('engine');
    return scripts.getAttribute("data-module");
};

Engine.getPage = function () {
    var scripts = document.getElementById('engine');
    return scripts.getAttribute("data-page");
};

Engine.runModule = function (module) {
    var page = this.getPage();

    switch (module) {
        case "Admin":
            switch (page) {
                case "Home":
                    this.AdminHome();
                    break;
                default:
                    break;
            }
            break;

        case "User":
            switch (page) {
                case "Home":
                    this.UserHome();
                    break;
                default:
                    break;
            }
            break;
        default:
            break;
            
    }
};

Engine.AdminHome = function () {
    console.log("Admin/Home yüklendi");
    // Buraya admin home işlemleri
};

Engine.UserHome = function () {
    console.log("User/Home yüklendi");
    // Buraya user home işlemleri
};
$.ajax({
    url: 'endpoint', // endpoint
    type: 'POST',
    data: {
        verileriniz
    },
    dataType: 'json',
    success: function (response) {
        if (response.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Başarılı',
                text: response.message || 'Ekleme Başarılı.'
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Hata',
                text: response.message || 'Bir hata oluştu'
            });
        }
    },
    error: function (xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'Sunucu Hatası',
            text: 'İstek gönderilirken bir sorun oluştu.'
        });
        console.error('AJAX Hatası:', status, error);
    }
    
});
