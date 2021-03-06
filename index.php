<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | LOGIN</title>
    <link rel="stylesheet" href="App/src/css/app.css">
    <script src="https://kit.fontawesome.com/f775054e0f.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header section, logo and navigations -->


    <header class="app-header">
        <nav class="app-navbar">
            <div class="app-logo">Todo App</div>
            <!-- Login form -->
            <form action="App/process/login_process.php" method="post" id="login-form">
                <input value="<?= isset($_GET['email']) ? $_GET['email'] : "" ?>" class="<?= isset($_GET['empty']) || isset($_GET['email']) ? "empty email" : "" ?>" type="email" name="user-email" placeholder="johndoe@gmail.com" id="login-email">
                <input class="<?= isset($_GET['empty']) ? "empty" : "" ?>" type="password" name="user-password" placeholder="xxxxxxxx" id="login-password">

                <button type="submit" name="submit" id="submit-login">
                    <i class="fas fa-location-arrow fa-fw link-icon"></i>&nbsp;Login
                </button>
            </form>

            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home fa-fw link-icon"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-globe fa-fw link-icon"></i>Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-newspaper fa-fw link-icon"></i>News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info fa-fw link-icon"></i>About</a>
                </li>
            </ul>
        </nav>
    </header> <!-- /Header section -->

    <!-- Main Section and forms -->
    <main class="app-main">
        <!-- Register -->
        <section class="register-section">
            <form action="App/process/register_process.php" method="post" id="register-form">
                <p>Welcome! Please Register</p>
                <p style="color:red"><?= isset($_GET['user_email']) == 'taken' ? "Email Taken!. Try Another one." : "" ?></p>
                <p style="color:green"><?= isset($_GET['user']) == 'success' ? "Acount Created Successfully. Please Login!" : "" ?></p>
                <div class="form-group">
                    <label for="text">Firstname</label>
                    <input type="text" name="firstname" placeholder="John" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="text">Lastname</label>
                    <input type="text" name="lastname" placeholder="Doe" id="lastname" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input value="<?= isset($_GET['user_email']) ? $_GET['value'] : "" ?>" type="email" name="user-email" placeholder="johndoe@gmail.com" id="user-email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="user-password" placeholder="xxxxxxxx" id="user-password" required>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="c-user-password" placeholder="xxxxxxxx" id="c-user-password" required>
                </div>
                <button type="submit" name="submit" id="create-account">
                    <i class="fas fa-location-arrow fa-fw link-icon"></i>&nbsp;Create New Account
                </button>

                <p>Already have an account? &nbsp;<a href="">Login</a></p>

            </form>
        </section>
    </main><!-- /Main Section -->

    <!-- Footer -->
    <footer class="app-footer"></footer>

    <!-- Scripts -->
    <script src="App/src/js/app.js"></script>
</body>

</html>