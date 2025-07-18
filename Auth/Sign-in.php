<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Giriş Yap</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />

    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background-color: grey; /* Arka plan beyaz */
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(10, 10, 10, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em #0000001a, inset 0 0.125em 0.5em #00000026;
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .bi {
        width: 1em;
        height: 1em;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      .yolculuk {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div
      class="card shadow p-4"
      style="max-width: 400px; background-color: rgba(96, 98, 198, 0.1);"
    >
      <form
        id="sign-in-form"
        action="../_management/data-bridge/auth-login-ajax.php"
        method="post"
      >
        <img
          class="mb-4 rounded"
          src="../assets/images/hogwarts.jpg"
          alt=""
          width="280"
          height="190"
          style="display: block; margin-left: auto; margin-right: auto"
        />
        <h2 class="yolculuk">Draco Dormiens Nunquam Titillandus</h2>
        <div class="form-floating">
          <input
            type="email"
            class="form-control"
            id="floatingInput"
            name="email"
            placeholder="name@example.com"
          />
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input
            type="password"
            class="form-control"
            id="floatingPassword"
            name="password"
            placeholder="Password"
          />
          <label for="floatingPassword">Şifre</label>
        </div>
        <div class="form-check text-start my-3">
          <input
            class="form-check-input"
            type="checkbox"
            value="remember-me"
            id="checkDefault"
          />
          <label class="form-check-label" for="checkDefault"> Aparecium </label>
        </div>
        <button
          class="btn btn-primary w-100 py-2"
          type="submit"
          style="background-color: rgb(19, 34, 78); border-color: #fff !important"
        >
          Alohomora
        </button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 11.yy-∞</p>
      </form>
      <p class="mt-3 mb-0 text-body-secondary text-center">
        Hesabınız Yoksa ⇒
        <a href="Register.php" style="color: rgb(3, 3, 3); font-weight: bold"
          >Kayıt Ol</a
        >
      </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/Auth.js"></script>
  </body>
</html>
