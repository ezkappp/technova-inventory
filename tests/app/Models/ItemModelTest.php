<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class ItemModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = true;
    protected $namespace = null;

    public function testInsertAndFindAllItems()
    {
        $model = new ItemModel();
        $model->insertBatch([
            ['name' => 'Kabel HDMI', 'category' => 'Aksesoris', 'stock' => 20, 'price' => 45000],
            ['name' => 'Mouse Wireless', 'category' => 'Aksesoris', 'stock' => 15, 'price' => 120000],
        ]);

        $items = $model->findAll();

        $this->assertCount(2, $items);
        $this->assertEquals('Kabel HDMI', $items[0]['name']);
    }

    public function testStockCannotBeNegative()
    {
        $model = new ItemModel();

        $result = $model->insert([
            'name'     => 'Barang Tidak Valid',
            'category' => 'Elektronik',
            'stock'    => -5,
            'price'    => 10000,
        ]);

        $this->assertFalse($result);
        $this->assertArrayHasKey('stock', $model->errors());
    }
}