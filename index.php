<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Snake</title>
    <script src="libs/tailwind.js"></script>
    <script src="libs/jquery.min.js"></script>
    <script src="libs/anime.min.js"></script>
    <script src="libs/pixi.min.js"></script>
    <link rel="stylesheet" href="libs/animate.min.css" />
    <script src="libs/wow.js"></script>

    <link rel="manifest" href="/manifest.json">

    <script>
        new WOW().init();
    </script>
</head>
<link href="styles/main.css" rel="stylesheet" type="text/css" />

<body class="bg-body">
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

<script>
if('serviceWorker' in navigator) {
  navigator.serviceWorker.register('service-worker.js', {scope: '.'});
}

window.addEventListener('resize', function(event) {
    if (window.matchMedia('(display-mode: standalone)').matches) {
        window.location.href = 'pwa.html';
    }
}, true);



</script>
</html>