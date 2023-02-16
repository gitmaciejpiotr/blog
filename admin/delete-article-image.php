<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if (!$article) {
        die("article not found");
    }

} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $previous_image = $article->image_file;

    if ($article->setImageFile($conn, null)) {

        if ($previous_image) {
            unlink("../uploads/$previous_image");
        }

        Url::redirect("/admin/edit-article-image.php?id={$article->id}");

    }
}

?>
<?php require '../includes/header.php'; ?>

<header>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h2>Usuń zdjęcie artykułu</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container px-4 px-lg-5 mb-4">
    <div id="deleteContainer" class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <form method="post">

                <p>Na pewno?</p>

                <button class="btn btn-primary text-uppercase mt-4">Usuń</button>
                <a class="btn text-uppercase mt-4" id="deleteButton"
                    href="article.php?id=<?= $article->id; ?>">Anuluj</a>

            </form>
        </div>
    </div>



    <?php require '../includes/footer.php'; ?>