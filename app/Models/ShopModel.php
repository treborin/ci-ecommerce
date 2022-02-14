<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopModel extends Model
{
   protected $table = 'products';
   protected $primaryKey = 'id';
   protected $allowedFields = ['title', 'img', 'description', 'price', 'color', 'size'];
}
