<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Ubah Barang - TechNova</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; color: #222; }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input { padding: 6px; width: 300px; }
        .error { color: #b00020; }
        button { margin-top: 1.5rem; padding: 8px 16px; }
        a { color: #0b5cab; }
    </style>
</head>
<body>
    <h1>Ubah Barang</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul class="error">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('items/update/' . $item['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label for="name">Nama Barang</label>
        <input type="text" id="name" name="name" value="<?= old('name', $item['name']) ?>" required>

        <label for="category">Kategori</label>
        <input type="text" id="category" name="category" value="<?= old('category', $item['category']) ?>" required>

        <label for="stock">Stok</label>
        <input type="number" id="stock" name="stock" value="<?= old('stock', $item['stock']) ?>" min="0" required>

        <label for="price">Harga</label>
        <input type="number" id="price" name="price" value="<?= old('price', $item['price']) ?>" min="0" step="0.01" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="<?= site_url('items') ?>">&larr; Kembali ke daftar</a></p>
</body>
</html>