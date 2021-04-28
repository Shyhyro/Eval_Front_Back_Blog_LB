<?php
    require_once "../require.php";

    include "../View/Elements/header.php";

    if (isset($_SESSION['id'], $_SESSION['username'])) {
        header("location:index.php");
    }

    if (isset($_GET['welcome'])) {
        if ($_GET['welcome'] === '1') {
            echo '<div id="error_problem" class="green">Account validate!</div>';
        }
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] === '1') {
            echo "<div id='error_problem' class='orange'>Username (et/ou) Password incorrect!</div>";
        } else if ($_GET['error'] === '2') {
            echo '<div id="error_problem" class="red">Un problème est survenu!</div>';
        }
    }

?>

        <form method="post" name="log_form" id="log_form" action="../login.php?error=0">
            <h2>Connexion</h2>
            <label id="log_form_user">
                Username:
                <input type="text" name="username" placeholder="username">
                Password:
                <input type="password" name="password" placeholder="password">
            </label>
            <button type="submit">Connexion</button>
            <button type="button" onclick="document.location.href='registration.php'">S'inscrire</button>
        </form>

<?php
    include "../View/Elements/footer.php";