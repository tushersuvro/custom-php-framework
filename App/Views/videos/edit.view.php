<?php require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

    <!-- Page Content-->
    <section class="py-5">
        <div class="container">

            <!-- Contact Form-->
            <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if( $success ): ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?= $success ?>
                        </div>
                    <?php endif; ?>
                    <!-- Page Heading/Breadcrumbs-->
                    <h1 class="mb-4">
                        Edit Video
                    </h1>
                    <form id="contactForm" name="storeVideo" action="/video" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" value="<?= $video['id'] ?>" name="id">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="title">Title:</label>
                                <input id="title" name="title" type="text" value="<?= $video['title'] ?>" required class="form-control" >
                                <p class="help-block text-danger small"><?= ( $errors['title'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" required><?= $video['description'] ?></textarea>
                                <p class="help-block text-danger small"><?= ( $errors['description'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="embed">embed url:</label>
                                <input id="embed" name="embed" type="text" value="<?= htmlspecialchars($video['embed']) ?>" required class="form-control" >
                                <p class="help-block text-danger small"><?= ( $errors['embed'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages-->
                        <button class="btn btn-primary" id="sendMessageButton" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require VIEW_PATH . 'partials/footer.php' ?>