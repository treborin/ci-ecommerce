<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'cart_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => 10,2,
                'null' => true
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint'=> 100,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint'=> 100,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint'=> 50,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'In Process', 'Delivered'],
                'default' => 'Pending'
            ],
            'createdAt datetime default current_timestamp',
            'updatedAt datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
