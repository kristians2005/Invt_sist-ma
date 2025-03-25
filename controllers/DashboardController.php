<?php

require_once "models/Dashboard.php";


class DashboardController
{


    public function index()
    {

        $productCount = Dashboard::productCount();
        $LowStockProduct = count(Dashboard::lowStockProducts()); 
        
        require "views/Dashboard.view.php";
    }



}