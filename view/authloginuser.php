<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | BitOS </title>
    <?php include "../assets/styles.php"; ?>
</head>

<body>

    <?php include '../assets/symbol.php'; ?>
    <div class="page-wrapper">
        <main class="page-auth">
            <div class="page-auth__content">
                <div class="page-auth__bg">
                    <img class="auth-bg-image-light" src="../assets/img/content/auth-login.jpg" alt="#">
                    <img class="auth-bg-image-dark" src="../assets/img/content/auth-login.jpg" alt="#">
                </div>
                <div class="page-auth__left">
                    <h1 class="page-auth__title">Welcome to
                        <span class="text-theme">BitOS</span>
                    </h1>
                    <p class="page-auth__text">Duis aute irure dolor in reprehenderit in voluptate, qui in ea voluptate velit esse, quam
                        <br>nihil molestiae consequatur, vel illum, obcaecati cupiditate nons.
                    </p>
                </div>
                <div class="page-auth__right">
                    <div class="auth-panel">
                        <form method="POST" id="formLoginUser" class="auth-panel__wrapper">
                            <div class="auth-panel__container">
                                <div class="auth-panel__body">
                                    <div class="auth-panel__body-wrapper">
                                        <div class="auth-panel__logotype">
                                            <div class="auth-logo">
                                                <img class="auth-logo__icon" src="../assets/img/content/logoBitOS.png" width="44" alt="#" />
                                                <div class="auth-logo__text">BitOS</div>
                                            </div>
                                            <p class="auth-panel__text">Please login to your account.</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group--prepend">
                                                <span class="input-group__prepend">
                                                    <svg class="icon-icon-user">
                                                        <use xlink:href="#icon-user"></use>
                                                    </svg>
                                                </span>
                                                <input class="input" type="email" name="user" placeholder="mail@bitzeel.com">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="input-group input-group--prepend">
                                                <span class="input-group__prepend">
                                                    <svg class="icon-icon-password">
                                                        <use xlink:href="#icon-password"></use>
                                                    </svg>
                                                </span>
                                                <input class="input" type="password" name="password" placeholder="****">
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group input-group--prepend">
                                                        <label class="checkbox">
                                                            <input type="checkbox" checked>
                                                            <span class="checkbox__marker">
                                                                <span class="checkbox__marker-icon">
                                                                    <svg class="icon-icon-checked">
                                                                        <use xlink:href="#icon-checked"></use>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                            <span class="ml-2">Remember Me</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group">
                                                    <a class="text-blue" href="authforgotuser.php">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="auth-panel__submit">
                                            <button type="submit" id="validateData" class="button button--primary button--block">
                                                <span class="button__text">Login</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-panel__footer">
                                    <div class="auth-panel__sign">Don't have an account?
                                        <a class="text-blue" href="authnewuser.php">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="resultLoginUser"></div>
        </main>
    </div>
    <?php include '../assets/scripts.php'; ?>

    <!-- JS Plugins Init. -->
    <script>
        $("#formLoginUser").submit(function(event) {
            $('#validateData').attr("disabled", true);

            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../controller/userlogin.php",
                data: parametros,
                success: function(datos) {
                    $("#resultLoginUser").html(datos);
                    $('#validateData').attr("disabled", false);
                }
            });
            event.preventDefault();
        });
    </script>

    <!-- Prevent a resubmit on refresh and back button. -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>