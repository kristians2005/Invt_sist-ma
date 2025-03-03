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
        $item = Inventory::find($id);
        if (!$item) {
            die("Inventory item not found.");
        }
        require "views/inventory/show.view.php";
    }

    public function create()
    {
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

            Inventory::create($data);
            header("Location: /inventory");
        }
    }

    public function edit($id)
    {
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

            Inventory::update($id, $data);
            header("Location: /inventory");
        }
    }

    public function destroy($id)
    {
        Inventory::delete($id);
        header("Location: /inventory");
    }
}
