
<?php require BASE_PATH . 'views/partials/header.php' ?>
<?php require BASE_PATH . 'views/partials/nav.php' ?>

<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <?php if( $success ): ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?= $success ?>
            </div>
        <?php endif; ?>
        <h1 class="mb-4"><?= $header ?></h1>
    </div>
</section>
<hr class="my-0" />

<?php require BASE_PATH . 'views/partials/footer.php' ?>