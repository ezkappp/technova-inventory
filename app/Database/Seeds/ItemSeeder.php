<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
class ItemSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'CRSL Berlin Messenger', 'category' => 'Messenger Bag', 'stock' => 10, 'price' => 359000, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'CRSL Kyoto Tote Bag', 'category' => 'Tote Bag', 'stock' => 21, 'price' => 229000, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'CRSL Mini Backpack', 'category' => 'Backpack', 'stock' => 17, 'price' => 319000, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'CRSL Urban Wallet', 'category' => 'Wallet', 'stock' => 21, 'price' => 119000, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('items')->insertBatch($data);
    }
}
