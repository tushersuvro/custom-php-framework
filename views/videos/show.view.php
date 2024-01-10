
<?php require BASE_PATH . 'views/partials/header.php' ?>
<?php require BASE_PATH . 'views/partials/nav.php' ?>

<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <!-- Portfolio Item Row-->
        <div class="row">
            <div class="col-md-7"><?= $video['embed'] ?? '<img class="img-fluid" src="https://via.placeholder.com/750x500" alt="..." />' ?></div>
            <div class="col-md-5">
                <h3 class="my-3"><?= $video['title'] ?></h3>
                <p><?= $video['description'] ?></p>
            </div>
        </div>
    </div>
</section>

<?php require BASE_PATH . 'views/partials/footer.php' ?>