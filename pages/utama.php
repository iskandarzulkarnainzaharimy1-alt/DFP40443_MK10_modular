<?php include "config/produk.php"; ?>

<h1 class="title-center">Selamat Datang</h1>

<div class="form-grid">

<?php foreach($data as $produk): ?>

<div class="card-box">
<img src="gambar/<?= $produk['gambar'] ?>" class="produk-img">
<h3><?= $produk['nama'] ?></h3>
</div>

<?php endforeach; ?>

</div>