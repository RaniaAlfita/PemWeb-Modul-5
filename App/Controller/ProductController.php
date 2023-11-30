<?php
namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class productController
{
    use ApiResponseFormatter;

    public function index()
    {
        $productModel = new Product();
        $response = $productModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $jsonInput = json_decode($jsonInput, true);
        if(json_last_error()){
            return $this->apiResponse(400, "error invalid input", null);
        }
        $productModel = new Product();
        $response = $productModel->create([
            "product_name"=> $jsonInput["product_name"],
        ]);
        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        // LANJUT INPUT JSON
        $jsonInput = file_get_contents('php://input');
        $jsonInput = json_decode($jsonInput, true);
        // VALIDASI APAKAH INPUT VALID
        if (json_last_error()){
            return $this->apiResponse(400, "error invalid input", null);
        }

        //LANJUT JIKA TIDAK ERROR
        $productModel = new Product();
        $response = $productModel-> update([
            "product_name" => $jsonInput['product_name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);

        return $this->apiResponse(200, "success", $response);
    }
}