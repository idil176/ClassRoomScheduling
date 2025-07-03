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