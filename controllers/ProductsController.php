<?php

require "models/Product.php";

class ProductsController
{
    public function index()
    {
        $products = Product::all();
        require "views/products/index.view.php";
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            die("Product not found.");
        }
        require "views/products/show.view.php";
    }

    public function create()
    {
        require "views/products/create.view.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "name" => $_POST["name"],
                "description" => $_POST["description"],
                "sku" => $_POST["sku"],
                "price" => $_POST["price"],
                "category" => $_POST["category"]
            ];

            if (Product::create($data)) {
                header("Location: /products");
            } else {
                die("Error saving product.");
            }
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            die("Product not found.");
        }
        require "views/products/edit.view.php";
    }


    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "name" => $_POST["name"],
                "description" => $_POST["description"],
                "sku" => $_POST["sku"],
                "price" => $_POST["price"],
                "category" => $_POST["category"]
            ];

            if (Product::update($id, $data)) {
                header("Location: /products");
            } else {
                die("Error updating product.");
            }
        }
    }

    public function destroy($id)
    {
        Product::delete($id);
        header("Location: /products");
    }
}
