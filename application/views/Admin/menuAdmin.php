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

<body>

<header>

    <!-- Navigation -->
    <nav class="navbar  navbar-fixed-top" role="navigation">

            <!-- Collect the nav links, forms, and other content for toggling -->
                <ul class="nav navbar-nav">
                    <li>
                        <?php echo anchor('/admin/index', 'Accueil', 'title="Accueil"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/createConcours', 'Créer un concours', 'title="Créer un concours"'); ?>
                    </li>

                    <li>
                        <?php echo anchor('admin/listConcours', 'Historique des concours', 'title="Historique des concours"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/imgReport', 'Modération des photos', 'title="Modération des images"'); ?>
                    </li>

                    <li>
                        <?php echo anchor('admin/listUsers', 'Modération des utilisateurs', 'title="Modération des utilisateurs"'); ?>
                    </li>
                    <li>
                        <?php echo anchor('admin/#', 'Styles', 'title="style des concours"'); ?>
                    </li>

                </ul>

    </nav>
</header>