<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShopModel;

class Shop extends BaseController
{
    public function index()
    {
        $shopModel = new ShopModel();
        $data['products'] = $shopModel->findAll();

        echo view('templates/header', $data);
        echo view('shop/index', $data);
        echo view('templates/footer');
    }
}
