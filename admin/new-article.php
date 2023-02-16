<?php

require '../includes/init.php';

Auth::requireLogin();

$article = new Article();

$category_ids = [];

$conn = require '../includes/db.php';

$categories = Category::getAll($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    $category_ids = $_POST['category'] ?? [];

    if ($article->create($conn)) {

        $article->setCategories($conn, $category_ids);

        Url::redirect("/admin/article.php?id={$article->id}");

    }
}

?>
<?php require '../includes/header.php'; ?>

<header class="masthead" style="background-image: url('../uploads/pobrane.jfif')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Napisz</h1>
                    <span class="subheading">nowy artykuł</span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php require 'includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>
