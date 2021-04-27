<?php
require_once "require.php";

if(isset($_GET['error'], $_POST['username'], $_POST['password'], $_POST['email']) && $_GET['error'] === "0") {
    $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));
    $email = strip_tags(trim($_POST['email']));

    $user = new UserController();
    $user = $user->logUser($username);

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    // If: password no have uppercase, lowercase, number, special chars and 8, no register this
    // Else : registration
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("location: ./View/registration.php?error=3");
    } else{
        if($user->getId() == null) {
            $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $addUser = new UserController();
            $addUser = $addUser->addUser($username, $new_password, $email);
            if ($addUser) {
                header("location: ./View/log.php?welcome=1");
            } else {
                header("location: ./View/registration.php?error=2");
            }
        } else {
            header("location: ./View/registration.php?error=1");
        }
    }

} else {
    header("location: ./View/registration.php?error=2");
}
