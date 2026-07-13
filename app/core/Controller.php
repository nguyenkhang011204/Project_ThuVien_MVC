<?php
class Controller
{
    public function model(string $model)
    {
        require_once __DIR__ . "/../models/$model.php";

        return new $model();
    }

    public function view(string $view, array $data = [], string $layout = 'reader_Layout')
    {
        extract($data);

        $content = __DIR__ . "/../views/$view.php";

        require_once __DIR__ . "/../views/Layouts/$layout.php";

    }

}
?>