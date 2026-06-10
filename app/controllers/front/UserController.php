<?php

namespace app\controllers\front;

use app\services\UserService;
use app\views\front\Viewer;

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function register()
    {
        $viewer = new Viewer();
        $viewer->renderreglog("users/register.php");
    }

    public function store($data)
    {
        $result = $this->userService->processRegistration($data);

        if ($result['status'] === 'validation_error') {
            redirect("users/register", ['form_errors' => $result['errors']]);
        } elseif ($result['status'] === 'duplicate_mobile') {
            redirect("users/register", ['error' => "این موبایل قبلا ثبت شده است."]);
        } elseif ($result['status'] === 'exception') {
            redirect("users/register");
        } elseif ($result['status'] === 'success') {
            redirect("users/login-form", ['success' => "ثبت نام شما با موفقیت ثبت شد"]);
        }
    }

    public function loginForm()
    {
        $viewer = new Viewer();
        $viewer->renderreglog("users/login.php");
    }

    public function login($data)
    {
        $result = $this->userService->processLogin($data);

        if ($result['status'] === 'validation_error') {
            redirect("users/login-form", ['form_errors' => $result['errors']]);
        } elseif ($result['status'] === 'invalid_credentials') {
            redirect("users/login-form", ['error' => "موبایل یا رمز عبور اشتباه است"]);
        } elseif ($result['status'] === 'success') {
            $_SESSION['user_id'] = $result['user']->id;
            $_SESSION['user_mobile'] = $result['user']->mobile;
            $_SESSION['user_role'] = $result['user']->role;

            redirect("", ['success' => "شما با موفقیت وارد شدید"]);
        }
    }

    public function logOut()
    {
        $this->userService->processLogOut();
        redirect("users/login-form", ['success' => "از حساب خود خارج شدید"]);
    }
}
