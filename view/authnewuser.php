<!DOCTYPE html>
<html class="no-js" lang="en" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | Bitzeel </title>
    <?php include '../assets/styles.php'; ?>
</head>

<body>
    <?php include '../assets/symbol.php'; ?>
    <div class="page-wrapper">
        <main class="page-auth">
            <div class="page-auth__content">
                <div class="page-auth__bg">
                    <img class="auth-bg-image-light" src="../assets/img/content/auth-newuser.jpg" alt="#">
                    <img class="auth-bg-image-dark" src="../assets/img/content/auth-newuser.jpg" alt="#">
                </div>
                <div class="page-auth__left">
                    <h1 class="page-auth__title">Welcome to 
                        <span class="text-theme">Bitzeel</span>
                    </h1>
                    <p class="page-auth__text">File management platform for uploading, downloading, sharing and commenting on documents.
                    </p>
                </div>
                <div class="page-auth__right">
                    <div class="auth-panel">
                        <form method="POST" id="formNewUser" class="auth-panel__wrapper">
                            <div class="auth-panel__container">
                                <div class="auth-panel__body">
                                    <div class="auth-panel__body-wrapper">
                                        <h2 class="auth-panel__title">Create account</h2>
                                        <div class="form-group">
                                            <div class="input-group input-group--prepend">
                                                <span class="input-group__prepend">
                                                    <svg class="icon-icon-user">
                                                        <use xlink:href="#icon-user"></use>
                                                    </svg>
                                                </span>
                                                <input class="input" type="text" name="username" placeholder="user name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group--prepend">
                                                <span class="input-group__prepend">
                                                    <svg class="icon-icon-email-2">
                                                        <use xlink:href="#icon-email-2"></use>
                                                    </svg>
                                                </span>
                                                <input class="input" type="email" name="email" placeholder="mail@bitzeel.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group--prepend">
                                                <span class="input-group__prepend">
                                                    <svg class="icon-icon-password">
                                                        <use xlink:href="#icon-password"></use>
                                                    </svg>
                                                </span>
                                                <input class="input" type="password" name="password" placeholder="****">
                                            </div>
                                        </div>
                                        <div class="auth-panel__submit">
                                            <button type="submit" id="storeData" class="button button--primary button--block">
                                                <span class="button__text">Create account</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="auth-panel__footer">
                                    <div class="auth-panel__sign">Already have account? 
                                        <a class="text-blue" href="authloginuser.php">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="resultNewUser"></div>
        </main>
    </div>

    <?php include '../assets/scripts.php'; ?>

    <!-- JS Plugins Init. -->
    <script>
        $("#formNewUser").submit(function(event) {
            $('#storeData').attr("disabled", true);

            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../controller/newuser.php",
                data: parametros,
                success: function(datos) {
                    $("#resultNewUser").html(datos);
                    $('#storeData').attr("disabled", false);
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