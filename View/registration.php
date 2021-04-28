<?php
    require_once "../require.php";

    include "../View/Elements/header.php";

    if (isset($_SESSION['id'], $_SESSION['username'])) {
        header("location:index.php");
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] === '1') {
            echo "<div id='error_problem' class='orange'>Username (et/ou) Password (et/ou) Email incorrect!</div>";
        } else if ($_GET['error'] === '2') {
            echo '<div id="error_problem" class="red">Un problème est survenu!</div>';
        } else if ($_GET['error'] === '3') {
            echo '<div id="error_problem" class="orange">Password should be at least 8 characters in length and should include at least one upper case letter, 
                        one number, and one special character.</div>';
        }
    }

?>

    <form method="post" name="log_form" id="log_form" action="../register.php?error=0">
        <h2>Inscription</h2>
        <label id="log_form_user">
            Username:
            <input type="text" name="username" placeholder="username">
            E-mail:
            <input type="email" name="email" placeholder="email">
            Password:
            <input type="password" name="password" placeholder="password">
        </label>
        <button type="submit">S'inscrire</button>
        <button type="button" onclick="document.location.href='log.php'">Connexion</button>
    </form>

<?php
    include "../View/Elements/footer.php";