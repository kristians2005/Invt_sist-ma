<?php



class InventoryController
{


    //Dashboard
    public function index()
    {

        require "views/inventory/index.view.php";
    }

    public function show()
    {

        require "views/inventory/show.view.php";
    }

    public function create()
    {

        require "views/inventory/create.view.php";
    }

    public function edit()
    {

        require "views/inventory/edit.view.php";
    }


    public function store()
    {


    }

    public function update()
    {


    }

    public function destroy()
    {


    }



}