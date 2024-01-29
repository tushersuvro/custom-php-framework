<?php require VIEW_PATH . 'partials/header.php' ?>
<?php require VIEW_PATH . 'partials/nav.php' ?>

<!-- Page Content-->
<section class="py-5">
    <div class="container">
        <!-- Page Heading/Breadcrumbs-->
        <h1>
            403
            <small>Unauthorized Page access</small>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">403</li>
        </ol>
        <div class="jumbotron">
            <h2 class="display-2">403</h2>
            <p>The page you're looking for is not authorized for your access:</p>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contact.html">Contact</a></li>
            </ul>
        </div>
    </div>
</section>

<?php require VIEW_PATH . 'partials/footer.php' ?>