<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 6, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

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

<main class="container px-4 px-lg-5 mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <h2>Administracja</h2>

                <p><a href="new-article.php">Nowy artykuł</a></p>

                <?php if (empty($articles)): ?>
                    <p>No articles found.</p>
                <?php else: ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tytuł</th>
                                <th>Opublikowano:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td>
                                        <a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a>
                                    </td>
                                    <td>
                                        <?php if ($article['published_at']): ?>
                                            <time>
                                                <?= $article['published_at'] ?>
                                            </time>
                                        <?php else: ?>
                                            Unpublished

                                            <button class="publish" data-id="<?= $article['id'] ?>">Publish</button>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php require '../includes/pagination.php'; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php require '../includes/footer.php'; ?>