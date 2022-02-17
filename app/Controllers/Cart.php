<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ShopModel;

class Cart extends BaseController
{
    public function index()
    {
        // $data['items'] = array_values(session('cart'));
        $data['items'] = is_array(session('cart'))? array_values(session('cart')): array();
        $data['total'] = $this->total();
        $data['user_id'] = session('id');
        $data['user_firstname'] = session('firstname');
        $data['user_lastname'] = session('lastname');
        $data['user_email'] = session('email');


        echo view('templates/header', $data);
        echo view('cart/index', $data);
        echo view('templates/footer');
        // Get session data to fill the order table
        // echo json_encode($data);
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

    public function remove($id) {
        $index = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session->set('cart', $cart);

        return $this->response->redirect(site_url('cart/index'));

    }

    public function update() {
        $cart = array_values(session('cart'));
        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i]['quantity'] = $_POST['quantity'][$i];
        }
        $session = session();
        $session->set('cart', $cart);
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
