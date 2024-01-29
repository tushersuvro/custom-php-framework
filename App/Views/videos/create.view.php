<?php

use Core\Session;

require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

    <!-- Page Content-->
    <section class="py-5">
        <div class="container">

            <!-- Contact Form-->
            <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Page Heading/Breadcrumbs-->
                    <h1 class="mb-4">
                        Add Video
                    </h1>
                    <form id="contactForm" name="storeVideo" action="/videos/store" method="POST" novalidate>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="title">Title:</label>
                                <input id="title" name="title" type="text" value="<?= Session::old('title') ?>" required class="form-control" >
                                <p class="help-block text-danger small"><?= ( $errors['title'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description"  class="form-control" required ><?= Session::old('description') ?></textarea>
                                <p class="help-block text-danger small"><?= ( $errors['description'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="embed">embed url:</label>
                                <input id="embed" name="embed" type="text" value="<?= Session::old('embed' , true ) ?>" required class="form-control" >
                                <p class="help-block text-danger small"><?= ( $errors['embed'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages-->
                        <button class="btn btn-primary" id="sendMessageButton" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require VIEW_PATH . 'partials/footer.php' ?>