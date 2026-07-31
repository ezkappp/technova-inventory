<?php

namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\ItemModel;

class ItemsControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait, DatabaseTestTrait;

    protected $migrate = true;

    public function testIndexShowsItems()
    {
        $model = new ItemModel();
        $model->insert(['name' => 'Keyboard Mekanik', 'category' => 'Aksesoris', 'stock' => 10, 'price' => 350000]);

        $result = $this->withURI('http://localhost:8080/items')
            ->controller(Items::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('Manajemen Inventaris'));
        $this->assertTrue($result->see('Keyboard Mekanik'));
    }
}