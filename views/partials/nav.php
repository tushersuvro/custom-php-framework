<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Custom PHP Framework</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= isCurrentURI(['/about']) ? 'active' : '' ?>"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item <?= isCurrentURI(['/services']) ? 'active' : '' ?>"><a class="nav-link" href="/services">Services</a></li>
                <?php if ($_SESSION['user'] ?? false) : ?>
                <li class="nav-item <?= isCurrentURI(['/videos','/video','/video/edit']) ? 'active' : '' ?>"><a class="nav-link" href="/videos">Videos</a></li>
                <?php endif; ?>
                <li class="nav-item "><a class="nav-link" href="/contact.html">Contact</a></li>
                <?php if ($_SESSION['user'] ?? false) : ?>
                <li class="nav-item "><a class="nav-link" href="/dashboard"><?= $_SESSION['user']['name'] ?></a></li>
                <li class="nav-item ">
                    <form method="POST" action="/logout">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn nav-link">Log Out</button>
                    </form>
                <?php else: ?>
                    <li class="nav-item <?= isCurrentURI(['/register']) ? 'active' : '' ?>"><a class="nav-link" href="/register">Register</a></li>
                    <li class="nav-item <?= isCurrentURI(['/login']) ? 'active' : '' ?>"><a class="nav-link" href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>