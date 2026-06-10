<?php

namespace app\views\front;

class Viewer
{
    public function render($template, $data = [])
    {
        extract($data, EXTR_SKIP);

        require BASE_DIR . "app/views/front/layout/header.php";
        require BASE_DIR . "app/views/front/layout/sidebar.php";
        require BASE_DIR . "app/views/front/$template";
        require BASE_DIR . "app/views/front/layout/footer.php";
    }
    public function render404($template)
    {
        require BASE_DIR . "app/views/front/$template";
    }
    public function renderreglog($template)
    {
        require BASE_DIR . "app/views/front/$template";
    }
}
