<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShopModel;

class Cart extends BaseController
{
    public function index()
    {
        $data['items'] = array_values(session('cart'));
        $data['total'] = $this->total();

        echo view('templates/header');
        echo view('cart/index', $data);
        echo view('templates/footer');
    }

    public function buy($id) {
        $shopModel = new ShopModel();
        $product = $shopModel->find($id);
        $item = array(
            'id' => $product['id'],
            'title' => $product['title'],
            'img' => $product['img'],
            'description' => $product['description'],
            'price' => $product['price'],
            'color' => $product['color'],
            'size' => $product['size'],
            'quantity' => 1,
        );

        $session = session();

        if ($session->has('cart')) {
            $index = $this->exists($id);
            $cart = array_values(session('cart'));
            if ($index == -1) {
               array_push($cart, $item);
            } else {
                $cart[$index]['quantity']++;
            }

            $session->set('cart', $cart);
        } else {
            $cart = array($item);
            $session->set('cart', $cart);
        }


        return $this->response->redirect(site_url('cart/index'));
    }

    private function exists($id) {
        $items = array_values(session('cart'));
        for($i = 0; $i < count($items); $i++) {
            if($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total() {
        $s = 0;
        $items = array_values(session('cart'));
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
    }
}
