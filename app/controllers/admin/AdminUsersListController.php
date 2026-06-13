<?php

namespace app\controllers\admin;

use app\services\UsersListService;
use app\views\admin\AdminViewer;
use Exception;

class AdminUsersListController
{
    private $userListService;

    public function __construct()
    {
        $this->userListService = new UsersListService();
    }
    public function index()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
        $userId = $_SESSION['user_id'];

        try {
            $UsersListService = new UsersListService();
            $data = $UsersListService->getUsersListData($userId);
            $viewer = new AdminViewer();
            $viewer->render("user_management/users_list/index.php", $data);
        } catch (Exception $ex) {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
    }
}
