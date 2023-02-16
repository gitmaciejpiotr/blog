<main class="container px-4 px-lg-5 mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

            <?php if (!empty($article->errors)): ?>
             <ul>
              <?php foreach ($article->errors as $error): ?>
                <li>
                     <?= $error ?>
                </li>
               <?php endforeach; ?>
             </ul>
            <?php endif; ?>

            <form class="mt-6" method="post">

                <div class="form-floating">
                    
                    <input class="form-control" name="title" id="title" placeholder="Article title" value="">
                    <label for="title">Tytuł</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control longText" name="content" id="content"
                        placeholder="Article content"></textarea>
                        <label for="content">Treść</label>
                </div>

                <div class="form-floating">
                    <input class="form-control" name="published_at" id="published_at" value="" placeholder="hej">
                    <label for="published_at">Data i godzina opublikowania</label>
                </div>

                <fieldset>
                    <legend>Kategorie</legend>

                    <?php foreach ($categories as $category): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category['id'] ?>"
                                id="category<?= $category['id'] ?>" <?php if (in_array($category['id'], $category_ids)): ?>checked<?php endif; ?>>
                            <label class="form-check-label" for="category<?= $category['id'] ?>"><?=
                                  htmlspecialchars($category['name']) ?></label>
                        </div>
                    <?php endforeach; ?>
                </fieldset>

                <button class="btn btn-primary text-uppercase mt-4" id="submitButton" type="submit">Zapisz</button>

            </form>

            </div>
        </div>
    </div>