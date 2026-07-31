<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Items extends BaseController
{
    protected ItemModel $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    public function index()
    {
        $data['items'] = $this->itemModel->orderBy('name', 'ASC')->findAll();

        return view('items/index', $data);
    }

    public function create()
    {
        return view('items/create');
    }

    public function store()
    {
        $input = $this->request->getPost(['name', 'category', 'stock', 'price']);

        if (! $this->itemModel->save($input)) {
            return redirect()->back()->withInput()->with('errors', $this->itemModel->errors());
        }

        return redirect()->to('/items')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = $this->itemModel->find($id);

        if (! $item) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('items/edit', ['item' => $item]);
    }

    public function update($id)
    {
        $input = $this->request->getPost(['name', 'category', 'stock', 'price']);

        if (! $this->itemModel->update($id, $input)) {
            return redirect()->back()->withInput()->with('errors', $this->itemModel->errors());
        }

        return redirect()->to('/items')->with('success', 'Barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        $item = $this->itemModel->find($id);

        if (! $item) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->itemModel->delete($id);

        return redirect()->to('/items')->with('success', 'Barang berhasil dihapus.');
    }
}