
<?php

use Core\Session;

require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

<!-- Page Content-->
<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <?php if( $success ): ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?= $success ?>
        </div>
        <?php endif; ?>
        <h1 class="mb-4 float-left"><?= $header ?></h1> <a class="btn btn-primary btn-sm ml-2 mt-3" href="/videos/create">Add Video</a>
        <div class="clearfix"></div>
        <!-- Marketing Icons Section-->
        <div class="row">
            <?php foreach( $videos as $video ) : ?>
            <div class="col-lg-4 mt-2 mb-lg-4">
                <div class="card h-100">
                    <h4 class="card-header"><?= $video['title'] ?></h4>
                    <div class="card-body"><p class="card-text"><?= $video['description'] ?></p></div>
                    <div class="card-footer"><a class="btn btn-primary" href="/video?id=<?= $video['id'] ?>">Learn More</a></div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="col-lg-12 d-flex justify-content-center">
            <?= $pages->page_links() ?>
            </div>
        </div>
    </div>
</section>
<hr class="my-0" />

<?php require VIEW_PATH . 'partials/footer.php' ?>