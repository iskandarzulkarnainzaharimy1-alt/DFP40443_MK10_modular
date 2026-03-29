<?php include "config/produk.php"; ?>

<h1 class="title-center">Borang Tempahan</h1>

<form method="POST" action="process/tempah_process.php">

<div class="form-grid">

<?php foreach($data as $produk): ?>

<div class="card-box">

<img src="gambar/<?= $produk['gambar'] ?>" class="produk-img">

<h3><?= $produk['nama'] ?></h3>

<?php foreach($produk['harga'] as $saiz=>$harga): ?>

<div class="row-between">

<div>
<?= ucwords(str_replace('_',' ',$saiz)) ?><br>
<span class="price">RM <?= number_format($harga,2) ?></span>
</div>

<input type="number"
name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]"
value="0"
min="0"
data-price="<?= $harga ?>"
class="qty-input">

</div>

<?php endforeach; ?>

</div>

<?php endforeach; ?>

</div>

<div class="summary-box">

<div class="row-between">
<span>Jumlah Harga:</span>
<strong id="total-price">RM 0.00</strong>
</div>

<label>Nama Penuh:</label>

<input type="text" name="nama_pelanggan" required class="full-input">

<button type="submit" class="full-btn">Teruskan</button>

</div>

</form>