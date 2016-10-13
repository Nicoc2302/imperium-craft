<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Editor</title>
        <style type="text/css" media="screen">
            #editor {
                margin: 0;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }
        </style>
    </head>
    <body>
         <div class="container-fluid">
            <div class="masthead">
                <h1>Administration</h1>
                <nav>
                  <ul class="nav nav-justified">
                    <li class="active"><a href="?page=files">Fichiers</a></li>
                  </ul>
                </nav>
            </div>
             <div class="row-fuild">
                <?php
                $page = (isset($_GET['page'])) ? $_GET['page'] : 'home';
                $page = 'inc/' . $page . '.php';
                if (!file_exists($page)) $page='../error/404.php';
                include_once $page;
                ?>
             </div>

    </body>
</html>
