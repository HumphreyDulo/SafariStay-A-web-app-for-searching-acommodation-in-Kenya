<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'product_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'product_images' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'bedrooms' => [
                'type' => 'INT',
                'constraint' => 2,
                
            ],
            'bathrooms' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
               
            ],
            'price' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'available_date' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'additional_info' => [
                'type' => 'TEXT',
               
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_products');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_products');
    }
}
