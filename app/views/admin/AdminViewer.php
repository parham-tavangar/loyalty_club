<?php

namespace app\views\admin;

class AdminViewer
{
    public function render($template, $data = [])
    {
        extract($data, EXTR_SKIP);

        require BASE_DIR . "app/views/admin/layout/header.php";
        require BASE_DIR . "app/views/admin/layout/sidebar.php";
        require BASE_DIR . "app/views/admin/$template";
        require BASE_DIR . "app/views/admin/layout/footer.php";
    }
    public function render404($template)
    {
        require BASE_DIR . "app/views/admin/$template";
    }
    public function renderreglog($template)
    {
        require BASE_DIR . "app/views/admin/$template";
    }
}
