<?php

namespace Controller;

use Entity\User;

class AuthController
{
    // LOGIN
    public function login()
    {
        global $userRepo;

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/loginform.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0];
                    header('Location:/?action=display');
                }
            } else {
                $errorMsg = "Username doesn't exist.";
                include "../templates/loginform.php";
            }
        } else {
            include "../templates/loginform.php";
        }
    }

    // LOGOUT
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
    }

    // REGISTER
    public function register()
    {
        global $userRepo;
        global $manager;
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("username" => $_POST['username']));
            if (count($users) > 0) {
                $errorMsg = "Username already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your username should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/register.php";
            } else {
                $user = new User();
                $user->username = $_POST["username"];
                $user->password = md5($_POST['password']);
                $_SESSION['user'] = $user;
                $manager->persist($user);
                $manager->flush();
                header('Location: ?action=display');
            }
        } else {
            include "../templates/register.php";
        }
    }
}
