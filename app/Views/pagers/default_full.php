<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination pagination-lg">
    <?php if ($pager->hasPrevious()) : ?>
       
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Atras">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <li class="page-item  <?= $link['active'] ? 'active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        
    <?php endif ?>
    </ul>
</nav>