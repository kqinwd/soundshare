<?php

namespace Controller;

use Entity\User;

use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class AuthController extends AbstractController
{
    // LOGIN
    public function login(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);

        if ($request->request->has('username') && $request->request->has('password')) {
            $usersWithThisLogin = $userRepo->findBy(array("username" => $request->request->get('username')));
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($request->request->get('password'))) {
                    $errorMsg = "Wrong password.";
                    $this->render("loginform.php");
                } else {
                    $request->getSession()->set('user', $usersWithThisLogin[0]);
                    // $_SESSION['user'] = $usersWithThisLogin[0];
                    return $this->redirectToRoute('display');
                }
            } else {
                $errorMsg = "Username doesn't exist.";
                $data = array("errorMsg" => $errorMsg);
                $this->render("loginform.php", $data);
            }
        } else {
            // include "../templates/loginform.php";

            return $this->render("loginform.php");
        }
    }

    // LOGOUT
    public function logout(Request $request): Response
    {
        if ($request->getSession()->has('user')) {
            $request->getSession()->remove('user');
        }
        return $this->redirectToRoute('display');
    }

    // REGISTER
    public function register(Request $request): Response
    {
        $userRepo = $this->getOrm()->getRepository(User::class);
        $manager = $this->getOrm()->getManager();

        if ($request->request->has('username') && $request->request->has('password') && $request->request->has('passwordRetype')) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("username" => $request->request->get('username')));
            if (count($users) > 0) {
                $errorMsg = "Username already used.";
            } else if ($request->request->get('password') != $request->request->get('passwordRetype')) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($request->request->get('password'))) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($request->request->get('username'))) < 4) {
                $errorMsg = "Your username should have at least 4 characters.";
            }
            if ($errorMsg) {
                $data = array(
                    "errorMsg" => $errorMsg
                );
                $this->render("register.php", $data);
            } else {
                $user = new User();
                $user->username = $request->request->get('username');
                $user->password = md5($request->request->get('password'));
                // $_SESSION['user'] = $user;
                $manager->persist($user);
                $manager->flush();
                $request->getSession()->set('user', $user);
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render("register.php");
        }
    }
}
