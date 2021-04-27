<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));

    /**
     * Check if information of login is correct and creat a session for the user
     * @param string $username
     * @param string $password
     */
    function checkPassword(string $username, string $password) {
        $user = new UserController();

        if($user->logUser($username)) {
            if(password_verify($password, $user->logUser($username)->getPassword())) {
                $_SESSION['id'] = $user->logUser($username)->getId();
                $_SESSION['role'] = $user->logUser($username)->getRole();
                $_SESSION['username'] = $user->logUser($username)->getUsername();
                header("location: ./View/index.php?post=on");
            }
            else {
                header('location: ./View/log.php?error=2');
            }
        }
        else {
            header('location: ./View/log.php?error=1');
        }
    }

    checkPassword($username, $password);
}