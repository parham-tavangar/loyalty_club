<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\User;
use Exception;
use PDOException;

class UsersCreateService
{
    private $userModel;
    private $loyalModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->loyalModel = new LoyalPoints();
    }

    public function creatUser($userId, $data)
    {

        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }

        $name = trim($data['name']);
        $mobile = trim($data['mobile']);
        $password = trim($data['password']);
        $password_confirmation = trim($data['password_confirmation']);
        $birthday = trim($data['birthday']);
        $birthday = str_replace('/', '-', $birthday);
        $role = isset($data['role']) ? trim($data['role']) : 'user';


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
        if ($this->userModel->getUserByMobile($mobile)) {
            return ['status' => 'duplicate_mobile'];
        }


        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->userModel->createUser($name, $mobile, $hashedPassword, $birthday, $role);

            $user = $this->userModel->getUserByMobile($mobile);
            $user_id = $user->id;
            $this->loyalModel->createLoyalPoint($user_id);

            return ['status' => 'success'];
        } catch (PDOException $ex) {
            return ['status' => 'exception'];
        }
    }
}
