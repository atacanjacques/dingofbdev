<body>
<!-- HEADER -->
<header>

<!doctype html>
<html>
<head>
    <!-- Page Title -->
    <title>Concours Photo Facebook Pardon-Maman</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Concours Facebook Pardon-Maman" />
    <meta name="description" content="Participe au concours photo Pardon-maman et tentez de remporter un tatouage gratuit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- Navigation -->
<nav class="navbar  navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse header" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php echo anchor('/admin/index', 'Accueil', 'title="Accueil"'); ?>
                </li>
                <li>
                    <?php echo anchor('admin/createConcours', 'Créer un concours', 'title="Créer un concours"'); ?>
                </li>
                <li>
                    <?php echo anchor('admin/listConcours', 'Historique', 'title="Historique des concours"'); ?>
                </li>
                <li>
                    <a href="<?php echo site_url('Admin/Style/') ?>">Styles</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Admin/moderation/') ?>">Modération</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
    </header>