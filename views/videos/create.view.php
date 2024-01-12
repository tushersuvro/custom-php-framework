<?php require BASE_PATH . 'views/partials/header.php' ?>
<?php require BASE_PATH . 'views/partials/nav.php' ?>

    <!-- Page Content-->
    <section class="py-5">
        <div class="container">

            <!-- Contact Form-->
            <!-- In order to set the email address and subject line for the contact form go to the assets/mail/contact_me.php file.-->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Page Heading/Breadcrumbs-->
                    <h1 class="mb-4">
                        <?= $heading ?>
                    </h1>
                    <form id="contactForm" name="storeVideo" action="/videos/store" method="POST">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="title">Title:</label>
                                <input id="title" name="title" type="text" value="" required class="form-control" >
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="embed">embed url:</label>
                                <input id="embed" name="embed" type="text" value="" required class="form-control" >
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

<?php require BASE_PATH . 'views/partials/footer.php' ?>