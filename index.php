<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Snake</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="libs/pixi.min.js"></script>
</head>


<!-- Include the header -->
<?php include("./components/header.php"); ?>

<body class="bg-main">
    <h1 class="text-3xl font-bold underline">
        Sneaky Snake 
    </h1>

    <!-- Game Content -->
    <?php include("./components/game.php"); ?>
</body>

<!-- Include the footer -->
<?php include("./components/footer.php"); ?>

<style>
    @import "styles/main.css";
</style>

</html>