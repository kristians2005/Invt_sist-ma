<?php

require_once __DIR__ . '/../dataBase.php'; // Points to root from models/

class Order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLowStock()
    {
        $statement = $this->db->query("
            SELECT p.name, p.sku, i.quantity, i.location 
            FROM products p 
            JOIN inventory i ON p.id = i.product_id 
            WHERE i.quantity < 10
        ");
        return $statement->fetchAll();
    }

    public function getAllProducts()
    {
        $statement = $this->db->query("
            SELECT p.name, p.sku, i.quantity, i.location, i.updated_at 
            FROM products p 
            JOIN inventory i ON p.id = i.product_id
        ");
        return $statement->fetchAll();
    }

    public function getSoldUtilized()
    {
        $statement = $this->db->query("
            SELECT p.name, p.sku, i.quantity, i.updated_at 
            FROM products p 
            JOIN inventory i ON p.id = i.product_id 
            WHERE i.quantity < 10 
            AND i.updated_at > NOW() - INTERVAL 7 DAY
            ORDER BY i.updated_at DESC
        ");
        return $statement->fetchAll();
    }

    public function getProductById($productId)
    {
        $statement = $this->db->query("
            SELECT p.name, p.sku, p.description, p.price, p.category, 
                   i.quantity, i.location, i.updated_at 
            FROM products p 
            JOIN inventory i ON p.id = i.product_id 
            WHERE p.id = ?", [$productId]
        );
        $result = $statement->fetchAll();
        return $result[0] ?? null;
    }

    public function updateInventory($productId, $quantityChange)
    {
        $statement = $this->db->query("
            UPDATE inventory 
            SET quantity = GREATEST(quantity + ?, 0), 
                updated_at = NOW() 
            WHERE product_id = ?", 
            [$quantityChange, $productId]
        );
        return $statement->rowCount() > 0;
    }
}