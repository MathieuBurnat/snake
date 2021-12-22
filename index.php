<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Snake</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
</head>

<!-- Include the header -->
<?php include("./components/header.php"); ?>

<body class="bg-body">
    <!-- Game Content -->
</body>

<?php
    switch(htmlspecialchars($_GET["page"])){
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

<!-- Include the footer -->
<?php include("./components/footer.php"); ?>

<style>
    @import "styles/main.css";
</style>
</html>