<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Imperium-Craft</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="img/logo.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="masthead">
                <img src="img/logo.png">
                <h3 class="text-muted">Imperium-Craft</h3>
                <nav>
                  <ul class="nav nav-justified">
                    <li class="active"><a href="?page=home">Home</a></li>
                    <li><a href="?page=server">Présentation</a></li>
                    <!--<li><a href="?page=community">Communauté</a></li>
                    <li><a href="/forum" target="_blank">Forum</a></li>
                    <li class="disabled"><a href="?page=buy">Don et boutique</a></li>-->
                    <li><a href="?page=faq">FAQ</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Le serveur <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href='?page=map'>Carte</a></li>
                            <li><a href='?page=city'>La cité d'Adelon</a></li>
                            <li><a href='?page=senat'>Le sénat</a></li>
                            <li><a href='?page=gameplay'>Gameplay</a></li>
                        </ul>
                    </li>
                    <li><a href="?page=gallery">Galerie</a></li>
                  </ul>
                </nav>
            </header>
            <section class="row background">
                <article class="col-md-12">
                    <?php
                        $page = (isset($_GET['page'])) ? $_GET['page'] : 'home';
                        $page = 'inc/' . $page . '.php';
                        if (!file_exists($page)) $page='error/404.php';
                        include_once $page;
                    ?>
                </article>
            </section>
            <footer class="footer">
                <hr>
                <p>© 2016 Imperium-Craft</p>
            </footer>
        </div>
             
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
