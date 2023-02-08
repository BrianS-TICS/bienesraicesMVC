<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function render($view)
    {
        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";

    }

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas()
    {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            // Agrega una url a el arreglo de urls agrupadas por tipo
            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "PAGINA NO ENCOTRADA";
        }
    }
}
