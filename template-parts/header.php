<?php
$rootDir = dirname(__DIR__, 1);  // Move up one directory level
require_once($rootDir . '/includes/main.php');

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ags_afsprakenplanner</title>



    <script src="<?= CustomFunctions::getRootUrl(); ?>js/main.js" defer></script>
    <script src="<?= CustomFunctions::getRootUrl(); ?>js/fontawesome.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CustomFunctions::getRootUrl(); ?>css/style.css">
</head>

<body>
   