<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name', 'category', 'stock', 'price'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'     => 'required|min_length[2]|max_length[150]',
        'category' => 'required|max_length[100]',
        'stock'    => 'required|integer|greater_than_equal_to[0]',
        'price'    => 'required|decimal|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
        'stock' => [
            'greater_than_equal_to' => 'Stok barang tidak boleh bernilai negatif.',
        ],
        'price' => [
            'greater_than_equal_to' => 'Harga barang tidak boleh bernilai negatif.',
        ],
    ];

    protected $skipValidation = false;
}