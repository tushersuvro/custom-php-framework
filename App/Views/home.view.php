
<?php require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

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

<?php require VIEW_PATH . 'partials/footer.php' ?>