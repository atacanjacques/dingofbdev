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
