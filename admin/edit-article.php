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

$category_ids = array_column($article->getCategories($conn), 'id');

$categories = Category::getAll($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    $category_ids = $_POST['category'] ?? [];

    if ($article->update($conn)) {

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
                    <h1>A może by tak...</h1>
                    <span class="subheading">poedytować?</span>
                </div>
            </div>
        </div>
    </div>
</header>

<?php require 'includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>