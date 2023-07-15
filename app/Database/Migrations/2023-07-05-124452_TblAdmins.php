<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAdmins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'admin_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            // Add more fields as needed
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('tbl_admins');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_admins');
    }
}




