<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBooking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'booking_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'checkin_date' => [
                'type' => 'DATE',
            ],
            'checkout_date' => [
                'type' => 'DATE',
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addPrimaryKey('booking_id');
        $this->forge->addForeignKey('user_id', 'tbl_users', 'id');
        $this->forge->addForeignKey('product_id', 'tbl_products', 'id');
        $this->forge->createTable('tbl_bookings', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_bookings');
    }
}
