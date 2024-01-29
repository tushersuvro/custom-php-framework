
<?php require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <!-- Portfolio Item Row-->
        <div class="row">
            <div class="col-md-7"><?= $video['embed'] ?? '<img class="img-fluid" src="https://via.placeholder.com/750x500" alt="..." />' ?></div>
            <div class="col-md-5">
                <h3 class="my-3"><?= $video['title'] ?></h3>
                <p><?= htmlspecialchars($video['description']) ?></p>
                <a class="btn btn-primary btn-sm float-left" href="/video/edit?id=<?= $video['id'] ?>">Edit</a> &nbsp;
                <form method="POST" action="/video" class="float-left ml-2">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" value="<?= $video['id'] ?>" name="id" >
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require VIEW_PATH . 'partials/footer.php' ?>