<?php $base = strtok($_SERVER["REQUEST_URI"], '?'); ?>

<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php if ($paginator->previous): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Poprzednia</a>
            <?php else: ?>
                <span class="page-link">Poprzednia</span>
            <?php endif; ?>
        </li>
        <li class="page-item">
            <?php if ($paginator->next): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->next; ?>">Następna</a>
            <?php else: ?>
                <span class="page-link">Następna</span>
            <?php endif; ?>
        </li>
    </ul>
</nav>