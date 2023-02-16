<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getWithCategories($conn, $_GET['id'], true);
} else {
    $article = null;
}

require 'includes/header.php';

?>

<body>
    <header class="masthead" style="background-image: url('/uploads/<?= $article[0]['image_file']; ?>')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>
                            <?= htmlspecialchars($article[0]['title']); ?>
                        </h1>
                        <time class="subheading" datetime="<?= $article[0]['published_at'] ?>"><?php
                          $datetime = new DateTime($article[0]['published_at']);
                          echo $datetime->format("j F, Y");
                          ?></time>
                        <span class="meta">
                            Zapostował
                            <a href="#!">Maciej P.</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <main class="container px-4 px-lg-5">


        <?php if ($article): ?>

            <article class="mb-4">

                <!-- <time datetime="<?= $article[0]['published_at'] ?>"><?php
                  $datetime = new DateTime($article[0]['published_at']);
                  echo $datetime->format("j F, Y");
                  ?></time> -->

                <?php if ($article[0]['category_name']): ?>
                    <p>Kategorie:
                        <?php foreach ($article as $a): ?>
                            <?= htmlspecialchars($a['category_name']); ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <?php if ($article[0]['image_file']): ?>
                                <img src="/uploads/<?= $article[0]['image_file']; ?>">
                            <?php endif; ?>

                            <p>
                                <?= htmlspecialchars($article[0]['content']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>

        <?php else: ?>
            <p>Article not found.</p>
        <?php endif; ?>

        <?php require 'includes/footer.php'; ?>