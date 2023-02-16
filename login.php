<?php

require 'includes/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {

        Auth::login();

        Url::redirect('/');

    } else {

        $error = "login incorrect";

    }
}

?>
<?php require 'includes/header.php'; ?>

<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Art. Spoż.,</h1>
                    <span class="subheading">czyli blog o jedzeniu</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container px-4 px-lg-5 mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Logowanie</h2>

                <?php if (!empty($error)): ?>
                    <p>
                        <?= $error ?>
                    </p>
                <?php endif; ?>

                <form class="mt-6" method="post">

                    <div class="form-floating">

                        <input name="username" type="text" id="username" class="form-control" placeholder="hej">
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating">

                        <input type="password" name="password" id="password" class="form-control" placeholder="hej">
                        <label for="password">Password</label>
                    </div>

                    <button class="btn btn-primary text-uppercase mt-4" id="submitButton" type="submit">Zaloguj</button>

                </form>


            </div>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>