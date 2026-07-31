<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Manajemen Inventaris - TechNova</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; color: #222; }
        table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th { background: #f2f2f2; }
        .success { color: #1a7f37; font-weight: bold; }
        .btn { margin-right: 6px; text-decoration: none; color: #0b5cab; }
        .btn-add { display: inline-block; margin-top: 0.5rem; }
    </style>
</head>
<body>
    <h1>Manajemen Inventaris - TechNova</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <a class="btn-add" href="<?= site_url('items/create') ?>">+ Tambah Barang</a>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($items)): ?>
            <tr><td colspan="5">Belum ada data barang.</td></tr>
        <?php else: ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= esc($item['name']) ?></td>
                    <td><?= esc($item['category']) ?></td>
                    <td><?= esc($item['stock']) ?></td>
                    <td><?= number_format((float) $item['price'], 0, ',', '.') ?></td>
                    <td>
                        <a class="btn" href="<?= site_url('items/edit/' . $item['id']) ?>">Ubah</a>
                        <a class="btn" href="<?= site_url('items/delete/' . $item['id']) ?>"
                           onclick="return confirm('Yakin hapus barang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>