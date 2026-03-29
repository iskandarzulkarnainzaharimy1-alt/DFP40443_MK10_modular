<?php include 'data/products.php'; ?>

<h1 class="page-title">Selamat Datang</h1>

<div class="gallery-row">
<?php foreach ($data as $produk): ?>
    <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" 
         alt="<?= htmlspecialchars($produk['nama']) ?>" 
         class="gallery-thumb">
<?php endforeach; ?>
</div>

<div class="instructions-section">
    <h3>Cara Membuat Tempahan</h3>
    <p>... (copy paste je tanpa ubah)</p>
</div>