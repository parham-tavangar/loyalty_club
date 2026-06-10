<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\Tiers;
use app\models\User;
use Exception;
use PDOException;

class UserProfileService
{
    private $userModel;
    private $loyalModel;
    private $tierModel;
    public function __construct()
    {
        $this->userModel = new User();
        $this->tierModel = new Tiers();
        $this->loyalModel = new LoyalPoints();
    }
    public function getUserData($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }
        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);
        return [
            'user' => $user,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier
        ];
    }
    public function editUserData($userId, $data)
    {
        $name = trim($data['name']);
        $mobile = trim($data['mobile']);
        $password = trim($data['password']);
        $password_confirmation = trim($data['password_confirmation']);
        $birthday = trim($data['birthday']);
        $birthday = str_replace('/', '-', $birthday);

        $errors = [];
        if (empty($name)) {
            $errors += ['name' => 'فیلد اسم و فامیل اجباری است'];
        }
        if (empty($mobile)) {
            $errors += ['mobile' => 'شماره موبایل اجباری است'];
        } elseif (strlen($mobile) < 11) {
            $errors += ['mobile' => 'شماره موبایل صحیح نیست'];
        }
        if (empty($birthday)) {
            $errors += ['birthday' => 'فیلد تاریخ تولد اجباری است'];
        } elseif (!preg_match('#^(13|14)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$#', $birthday)) {
            $errors += ['birthday' => 'فرمت تاریخ تولد نامعتبر است (مثال صحیح: 1385/06/27)'];
        }
        if (!empty($password)) {
            if (strlen($password) < 6) {
                $errors += ['password' => 'رمز عبور باید بیشتر از 6 کاراکتر باشد'];
            }
            if (empty($password_confirmation)) {
                $errors += ['password_confirmation' => 'تکرار رمز عبور اجباری است'];
            }
            if ($password != $password_confirmation) {
                $errors += ['password_confirmation' => 'تکرار رمز عبور با رمز عبور برابر نیست'];
            }
        }

        if (!empty($errors)) {
            return ['status' => 'validation_error', 'errors' => $errors];
        }

        $existingUser = $this->userModel->getUserByMobile($mobile);
        if ($existingUser && $existingUser->id != $userId) {
            return ['status' => 'duplicate_mobile'];
        }

        try {
            if (empty($password)) {
                $currentUser = $this->userModel->getUserById($userId);
                $finalPassword = $currentUser->password;
            } else {
                $finalPassword = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->userModel->editUserById($userId, $name, $finalPassword, $birthday, $mobile);

            return ['status' => 'success'];
        } catch (PDOException $ex) {
            return ['status' => 'exception'];
        }
    }
}
