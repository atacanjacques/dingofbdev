<header>
<!-- Navigation -->
<nav class="navbar  navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse header" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo site_url('home/index') ?>">Accueil</a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/gallery') ?>">Galerie</a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/price') ?>">Prix</a>
                </li>
                <li>
                    <a href="./Partager.php">Partager</a>
                </li>
                <?php if($_SESSION['isAdmin']){ ?>
                <li>
                    <a href="/admin">Admin</a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
</header>