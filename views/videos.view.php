
<?php require BASE_PATH . 'views/partials/header.php' ?>
<?php require BASE_PATH . 'views/partials/nav.php' ?>

<!-- Page Content-->
<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <h1 class="mb-4"><?= $header ?></h1>
        <!-- Marketing Icons Section-->
        <div class="row">
            <?php foreach( $videos as $video ) : ?>
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card h-100">
                    <h4 class="card-header"><?= $video['title'] ?></h4>
                    <div class="card-body"><p class="card-text"><?= $video['description'] ?></p></div>
                    <div class="card-footer"><a class="btn btn-primary" href="/video?id=<?= $video['id'] ?>">Learn More</a></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<hr class="my-0" />

<?php require BASE_PATH . 'views/partials/footer.php' ?>