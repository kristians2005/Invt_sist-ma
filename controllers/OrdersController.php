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
            'sold_utilized' => $this->orderModel->getSoldUtilized(),
            'orders' => $this->orderModel->getAllOrders()
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
            $quantity = (int)($_POST['quantity'] ?? 0);
            $userId = $_SESSION['user_id'] ?? 1;

            if ($productId && $quantity > 0) {
                $success = $this->orderModel->createOrder($userId, $productId, $quantity);
                if ($success) {
                    header("Location: /orders/order"); // Pāradresē uz order skatu
                    exit;
                } else {
                    $data['error'] = "Neizdevās veikt pirkumu. Pārbaudiet krājumus!";
                }
            } else {
                $data['error'] = "Nepareizi ievadīti dati.";
            }
        }
        require "views/orders/create.view.php";
    }

    public function order()
    {
        $data = [
            'products' => $this->orderModel->getAllProducts(), // Produktu saraksts pasūtīšanai
            'error' => null,
            'success' => null
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $quantity = (int)($_POST['quantity'] ?? 0);
            $userId = $_SESSION['user_id'] ?? 1;

            if ($productId && $quantity > 0) {
                $success = $this->orderModel->createOrder($userId, $productId, $quantity);
                if ($success) {
                    $data['success'] = "Pasūtījums veiksmīgi izveidots!";
                } else {
                    $data['error'] = "Neizdevās veikt pasūtījumu. Pārbaudiet krājumus!";
                }
            } else {
                $data['error'] = "Nepareizi ievadīti dati.";
            }
        }

        require "views/orders/order.view.php";
    }
}