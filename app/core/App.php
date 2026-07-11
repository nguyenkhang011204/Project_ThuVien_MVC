<?php
class App
{
    private string $controllerName = "HomeController";
    private string $method = "index";
    private array $params = [];
    private Controller $controller;

    public function __construct()
    {
        $url = $this->getURL();

        $this->resolveController($url);

        $this->resolveMethod($url);

        $this->resolveParams($url);

        $this->dispatch();
    }

    private function getURL(): array
    {
        $url = $_GET['url'] ?? '';

        $url = trim($url, '/');

        if ($url === '') {
            return [];
        }

        return explode('/', $url);
    }

    private function resolveController(array &$url): void
    {
        if (!empty($url)) {

            $controllerName = ucfirst($url[0]) . "Controller";

            $file = __DIR__ . "/../controllers/$controllerName.php";

            if (file_exists($file)) {
                $this->controllerName = $controllerName;

                unset($url[0]);
            }
        }

        require_once __DIR__ . "/../controllers/" . $this->controllerName . ".php";

        $this->controller = new $this->controllerName();
    }

    private function resolveMethod(array &$url): void
    {
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {

            $this->method = $url[1];

            unset($url[1]);
        }
    }


    private function resolveParams(array $url): void
    {
        $this->params = array_values($url);
    }

    /**
     * Gọi Controller -> Method
     */
    private function dispatch(): void
    {
        call_user_func_array(
            [$this->controller, $this->method],
            $this->params
        );
    }
}
?>