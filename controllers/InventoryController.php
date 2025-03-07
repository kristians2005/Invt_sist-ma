<?php

require "models/Inventory.php";

class InventoryController
{
    public function index()
    {
        $inventory = Inventory::all();
        require "views/inventory/index.view.php";
    }

    public function show($id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            die("Inventory item not found.");
        }

        $product = Product::find($inventory['product_id']);
        $inventory['product_name'] = $product ? $product['name'] : 'Unknown Product';

        require "views/inventory/show.view.php";
    }


    public function create()
    {
        $products = Product::all();
        require "views/inventory/create.view.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "product_id" => $_POST["product_id"],
                "quantity" => $_POST["quantity"],
                "location" => $_POST["location"]
            ];

            if (Inventory::create($data)) {
                header("Location: /inventory");
            } else {
                die("Error saving inventory.");
            }
        }
    }


    public function edit($id)
    {
        $products = Product::all();

        $item = Inventory::find($id);
        if (!$item) {
            die("Inventory item not found.");
        }
        require "views/inventory/edit.view.php";
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "quantity" => $_POST["quantity"],
                "location" => $_POST["location"]
            ];

            if (Inventory::update($id, $data)) {
                header("Location: /inventory");
            } else {
                die("Error updating inventory.");
            }
        }
    }

    public function destroy($id)
    {
        Inventory::delete($id);
        header("Location: /inventory");
    }
}
