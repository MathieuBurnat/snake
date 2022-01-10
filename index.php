<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Snake</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="libs/pixi.min.js"></script>
</head>
<link href="styles/main.css" rel="stylesheet" type="text/css" />

<body class="overflow-hidden bg-body">
    <!-- Include the header -->
    <?php include("./components/header.php"); ?>

    <?php
    switch(htmlspecialchars($_GET["page"] ?? '')){
        case "learn":
            include("./screens/learn.php");
            break; 
        case "about":
            include("./screens/about.php");
            break; 
        case "help":
            include("./screens/help.php");
            break;
        default:
            include("./components/game.php");
            break; 
    }
?>
</body>


<!-- Include the footer -->
<?php include("./components/footer.php"); ?>

</html>