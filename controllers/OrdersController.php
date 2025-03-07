<?php

require_once __DIR__ . '/../models/Orders.php';

class OrdersController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        $data = [
            'low_stock' => $this->orderModel->getLowStock(),
            'all_products' => $this->orderModel->getAllProducts(),
            'sold_utilized' => $this->orderModel->getSoldUtilized()
        ];

        require "views/orders/index.view.php";
    }

    public function show($productId)
    {
        $data = [
            'product' => $this->orderModel->getProductById($productId)
        ];

        require "views/orders/show.view.php";
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $quantityChange = (int)($_POST['quantity_change'] ?? 0);
            $userId = $_SESSION['user_id'] ?? 1;

            if ($productId && $quantityChange !== 0) {
                $success = $this->orderModel->updateInventory($productId, $quantityChange);
                if ($success) {
                    header("Location: /orders");
                    exit;
                } else {
                    $data['error'] = "Neizdevās atjaunināt inventāru.";
                }
            }
        }
        require "views/orders/create.view.php";
    }
}