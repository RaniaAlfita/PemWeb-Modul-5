<?php

namespace app\Routes;

include "app/Controller/ProductController.php";

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        // JIKA REQUEST METHOD GET DAN PATH SAMA DENGAN '/api/product'
        if($method == "GET"&& $path === '/api/product') {
            $controller = new ProductController();
            echo $controller->index();
        }

        if($method == "GET"&& strpos($path,"/api/product") == 0) {
            //ekstrak id path
          $pathParts = explode("/", $path);
          $id = $pathParts[count($pathParts) -1];

          $controller = new ProductController();
          echo $controller->getById($id);
        }

        if ($method == "POST"&& ($path === "/api/product/") == 0) {
            $controller = new ProductController();
            echo $controller->insert();
        }
        if ($method == "PUT"&& strpos($path, "/api/product") == 0) {
            //ekstrak id path
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) -1];

            $controller = new ProductController();
            echo $controller->update($id); //byid hapus
        }
        if ($method == "DELETE"&& strpos($path,"/api/product") == 0) {
            //ekstrak id 
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) -1];

            $controller = new ProductController();
            echo $controller->delete($id);
        }
    }
}
