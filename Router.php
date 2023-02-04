<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
        debugear($this->rutasGET);
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
        } else {
            echo "PAGINA NO ENCOTRADA";
        }
    }
}
