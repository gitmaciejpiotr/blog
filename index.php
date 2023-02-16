<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>
<?php require 'includes/header.php'; ?>

<header class="masthead" style="background-image: url('uploads/carpe noctem.jfif')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Za Piski,</h1>
                    <span class="subheading">czyli blog P. Macieja</span>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container px-4 px-lg-5">

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>

    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <ul id="index">
                <?php foreach ($articles as $article): ?>
                    <li>
                        <article class="post-preview">
                            <h2 class="post-title"><a href="article.php?id=<?= $article['id']; ?>"><?=
                                  htmlspecialchars($article['title']); ?></a></h2>

                            <time datetime="<?= $article['published_at'] ?>"><?php
                              $datetime = new DateTime($article['published_at']);
                              echo $datetime->format("j F, Y");
                              ?></time>

                            <?php if ($article['category_names']): ?>
                                <p>Kategorie:
                                    <?php foreach ($article['category_names'] as $name): ?>
                                        <?= htmlspecialchars($name); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>

                            <p class="post-meta">
                                <?= htmlspecialchars($article['content']); ?>
                            </p>
                        </article>
                    </li>

                    <hr class="my-4" />
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

    <?php require 'includes/pagination.php'; ?>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>