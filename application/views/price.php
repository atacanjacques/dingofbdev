<!doctype html>
<html>
<head>
    <!-- Page Title -->
    <title>Concours Photo Facebook Pardon-Maman</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Concours Facebook Pardon-Maman" />
    <meta name="description" content="Participe au concours photo Pardon-maman et tentez de remporter un tattouage gratuit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'header.php';?>
</head>

<body>
    <!-- HEADER -->
    <header>
        <?php require 'menu.php' ?>
    </header>

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>

    <!-- CONTENT -->
    <!-- BLOC 1 -->     
    <section id="section-accueil">
        <div class="container">
            <h1 style="font-size: 31px; text-align: center; font-weight: 700">PRIX DU CONCOURS !</h1>
            <div class="row">

                <div class="col-sm-12 col-xs-12 text-center" id="description" >
                    <?php
                    if(!$lots)
                    {
                        echo '<p>Aucun concours actuellement !</p>';
                    }
                    else{
                        echo $lots->description;
                        echo '<img class="tatoo_price_1" src="' . $lots->url . '">';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- END OF CONTENT -->

    <!-- FOOTER -->
    <footer class="footer">
        <?php require 'footer.php' ?>
    </footer>
    <!-- END OF FOOTER -->

</body>

</html>

