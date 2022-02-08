<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProducts extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'img' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => 10,2,
                'null' => true
            ],
            'color' => [
                'type' => 'ENUM',
                'constraint' => ['Red','Green','Blue'],
                'null' => true
            ],
            'size' => [
                'type' => 'ENUM',
                'constraint' => ['S','M','L','XL','XXL','3XL','4XL'],
                'null' => true
            ],
            'createdAt datetime default current_timestamp',
            'updatedAt datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
