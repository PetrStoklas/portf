<?php
    include_once 'mail/mail.php';  //mail includes the db itself
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-GB"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Petr Stoklas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro:500|Aleo:300" rel="stylesheet">   
    </head>
    <body>
        <div class="container">
            <div class="navintro">
                <!-- nav with shark -->
                <?php require_once 'body/nav.php'; ?>   
                <!-- intro texts -->
                <?php require_once 'body/intro.php'; ?>
            </div>

            <div class="portfolio" id="portfolio"> 
                <!-- portfolio three projects -->
                <?php require_once 'body/portfolio.php'; ?>
            </div>  
        
            <div class="reasons" id="reasons">
                <!-- additional text - reasons to have good website -->
                <?php require_once 'body/reasons.php'; ?>
            </div>
        </div>
        <div id="contact">
                <!-- contact form -->
            <?php require_once 'body/contact.php'; ?>
        </div>

        <script src="script.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
            crossorigin="anonymous">
        </script>
    </body>
</html>