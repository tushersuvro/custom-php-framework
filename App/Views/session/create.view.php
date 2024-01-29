<?php use Core\Session;

require VIEW_PATH . 'partials/header.php' ?>
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
                        Login
                    </h1>
                    <form id="contactForm" name="sentMessage" action="/login" method="POST" novalidate>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Email Address:</label>
                                <input required class="form-control" id="email" name="email" value="<?= Session::old('email') ?>" type="email"/>
                                <p class="help-block text-danger small"><?= ( $errors['email'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Password:</label>
                                <input required class="form-control" id="password" name="password" type="password" />
                                <p class="help-block text-danger small"><?= ( $errors['password'] ) ?? '' ?></p>
                            </div>
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages-->
                        <button class="btn btn-primary" id="sendMessageButton" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require VIEW_PATH . 'partials/footer.php' ?>