<?php session_start(); ?>
<!DOCTYPE>

<?php require 'db.php'; ?>

<html lang="pl-PL">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>panda wykres</title>
    <META NAME="robots" CONTENT="noindex,nofollow">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            Panda Wykres
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 py-5">
            <h1>Wykres</h1>
            <p><?php if(isset($_SESSION['alert'])) echo $_SESSION['alert']; unset($_SESSION['alert']); ?></p>
            <form method="POST" action="chart.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-2"><label for="upload">dodaj plik</label></div>
                    <div class="col-md-4"><input name="file" type="file" class="form-control-file" id="upload"></div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="save">Importuj</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col" id="chart-container">
            <canvas id="graphCanvas"></canvas>
        </div>
    </div>
    <div class="col-12">
        <h2>lista krajów</h2>
        <?php 
        $index = $_SESSION['county'];
        echo '<ol>';
        foreach( $index as $value){
            echo '<li><strong>Kraj: </strong>'.$value['country'].' <strong>liczba osób:</strong> '.$value['amount'].'</li>';
        }
        echo '</ol>';

        unset($_SESSION['county']);
        
        ?>
    </div>
</div>
<script>
        (function() {
            var css = document.createElement('link');
            css.href = 'https://fonts.googleapis.com/css?family=Raleway:300,400,700&amp;subset=latin-ext';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
</script>
</body>
</html>
<?php session_destroy(); ?>