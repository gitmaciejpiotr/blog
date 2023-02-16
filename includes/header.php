<!DOCTYPE html>
<html lang="en">
<head>
    <title>Art. Spoż. Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/jquery.datetimepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">Art. Spoż.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>

                         <?php if (Auth::isLoggedIn()) : ?>
                    
                          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/admin/">Admin</a></li>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/logout.php">Log out</a></li>

                         <?php else : ?>
                    
                          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/login.php">Log in</a></li>

                         <?php endif; ?>

                         <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
