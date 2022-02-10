<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    public function register() {
        $data = [];
        helper(['form']);



        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
}
