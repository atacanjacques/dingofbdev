<!-- Navigation -->

<header>
    <div id="menu_white_background" class="navbar">
        <div class="structure_Admin">

            <nav>
                <div id="contener_type_Admin">
                    <ul class="nav_admin">
                        <li class="nav-item"><a class="button_type" href="<?php echo site_url('Admin/index/') ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="button_type" href="#">Concours</a>
                            <ul class="subnav1">
                                <li class="subnav-item">
                                    <a class="button_type" href="<?php echo site_url('Admin/createConcours/') ?>">Créer
                                        un concours</a>
                                </li>
                                <li class="subnav-item">
                                    <a class="button_type" href="<?php echo site_url('Admin/modifConcours/') ?>">Modifier
                                        un concours</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="button_type" href="#">Modération</a>
                            <ul class="subnav">
                                <li class="subnav-item">
                                    <a class="button_type" href="<?php echo site_url('Admin/createConcours/') ?>">Images</a>
                                </li>
                                <li class="subnav-item">
                                    <a class="button_type" href="<?php echo site_url('Admin/modifConcours/') ?>">Utilisateurs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="button_type" href="<?php echo site_url('Admin/listConcours/') ?>">Administration</a>
                        </li>
                        <li class="nav-item">
                            <a class="button_type" href="<?php echo site_url('Admin/Style/') ?>">Styles</a>
                        </li>
                    </ul>
            </nav>
        </div>
    </div>
</header>