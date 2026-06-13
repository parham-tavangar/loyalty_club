<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\User;
use PDOException;

class UserService
{
    private $model;
    private $LoyalModel;

    public function __construct()
    {
        $this->model = new User();
        $this->LoyalModel = new LoyalPoints();
    }

    public function processRegistration($data)
    {
        $name = trim($data['name']);
        $mobile = trim($data['mobile']);
        $password = trim($data['password']);
        $password_confirmation = trim($data['password_confirmation']);
        $birthday = trim($data['birthday']);
        $birthday = str_replace('/', '-', $birthday);
        $role = "user";


        $errors = [];
        if (empty($name)) {
            $errors += ['name' => 'فیلد اسم و فامیل اجباری است'];
        }
        if (empty($mobile)) {
            $errors += ['mobile' => 'شماره موبایل اجباری است'];
        } elseif (strlen($mobile) < 11) {
            $errors += ['mobile' => 'شماره موبایل صحیح نیست'];
        }
        if (empty($password)) {
            $errors += ['password' => 'رمز عبور اجباری است'];
        } elseif (strlen($password) < 6) {
            $errors += ['password' => 'رمز عبور باید بیشتر از 6 کاراکتر باشد'];
        }
        if (empty($password_confirmation)) {
            $errors += ['password_confirmation' => 'تکرار رمز عبور اجباری است'];
        } elseif ($password != $password_confirmation) {
            $errors += ['password_confirmation' => 'تکرار رمز عبور با رمز عبور برابر نیست'];
        }
        if (empty($birthday)) {
            $errors += ['birthday' => 'فیلد تاریخ تولد اجباری است'];
        } elseif (!preg_match('#^(13|14)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$#', $birthday)) {
            $errors += ['birthday' => 'فرمت تاریخ تولد نامعتبر است (مثال صحیح: 1385/06/27)'];
        }

        if (!empty($errors)) {
            return ['status' => 'validation_error', 'errors' => $errors];
        }

        // بررسی شماره تکراری
        if ($this->model->getUserByMobile($mobile)) {
            return ['status' => 'duplicate_mobile'];
        }

        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->model->createUser($name, $mobile, $hashedPassword, $birthday, $role);

            $user = $this->model->getUserByMobile($mobile);
            $user_id = $user->id;
            $this->LoyalModel->createLoyalPoint($user_id);

            return ['status' => 'success'];
        } catch (PDOException $ex) {
            return ['status' => 'exception'];
        }
    }

    public function processLogin($data)
    {
        $mobile = trim($data['mobile']);
        $password = trim($data['password']);

        $errors = [];
        if (empty($mobile)) {
            $errors += ['mobile' => 'شماره موبایل اجباری است'];
        } elseif (strlen($mobile) < 11) {
            $errors += ['mobile' => 'شماره موبایل صحیح نیست'];
        }
        if (empty($password)) {
            $errors += ['password' => 'رمز عبور اجباری است'];
        } elseif (strlen($password) < 6) {
            $errors += ['password' => 'رمز عبور باید بیشتر از 6 کاراکتر باشد'];
        }

        // اگر خطای اعتبارسنجی داشتیم
        if (!empty($errors)) {
            return ['status' => 'validation_error', 'errors' => $errors];
        }

        $user = $this->model->getUserByMobile($mobile);

        if ($user and password_verify($password, $user->password)) {
            return ['status' => 'success', 'user' => $user];
        } else {
            return ['status' => 'invalid_credentials'];
        }
    }


    public function processAdminLogin($data)
    {
        $mobile = trim($data['mobile']);
        $password = trim($data['password']);

        $errors = [];
        if (empty($mobile)) {
            $errors += ['mobile' => 'شماره موبایل اجباری است'];
        } elseif (strlen($mobile) < 11) {
            $errors += ['mobile' => 'شماره موبایل صحیح نیست'];
        }
        if (empty($password)) {
            $errors += ['password' => 'رمز عبور اجباری است'];
        } elseif (strlen($password) < 6) {
            $errors += ['password' => 'رمز عبور باید بیشتر از 6 کاراکتر باشد'];
        }

        // اگر خطای اعتبارسنجی داشتیم
        if (!empty($errors)) {
            return ['status' => 'validation_error', 'errors' => $errors];
        }

        $user = $this->model->getUserByMobile($mobile);

        if ($user and password_verify($password, $user->password) and $user->role == 'admin') {
            return ['status' => 'success', 'user' => $user];
        } else {
            return ['status' => 'invalid_credentials'];
        }
    }

    public function processLogOut()
    {
        $_SESSION = [];
        session_destroy();
    }
}
