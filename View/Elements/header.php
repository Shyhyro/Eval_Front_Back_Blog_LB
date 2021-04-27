<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon petit Blog simple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/Styles/communs.css">
</head>

<body>

<header>
    <div>
        <h1>Mon petit Blog simple</h1>
    </div>
    <div id="header_navigation_bar">
        <nav>
            <ul>
                <li onclick="document.location.href='index.php'">Blog</li>
                <li>A propos</li>
                <li>Contact</li>
            </ul>
        </nav>
    </div>
    <?php
        if (isset($_SESSION['id'], $_SESSION['username'])){
            echo "<button id='new_article_button'>Nouvel article</button>";
            echo "<button id='login_logout_button' onclick='document.location.href=". '"../logout.php"' . "'>Déconnexion</button>";

        } else {
            echo "<button id='login_logout_button' onclick='document.location.href=". '"log.php"' . "'>Connexion</button>";
        }


    ?>
</header>

<div id="div_body">
    <div id="div_container">