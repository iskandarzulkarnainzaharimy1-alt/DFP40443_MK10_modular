<?php

if(!isset($_SESSION['invois_data'])){
header("Location:index.php?menu=tempah");
exit();
}

$inv=$_SESSION['invois_data'];
?>

<h1 class="title-center">Invois</h1>

<div class="invoice-box">

<p><strong>Nama:</strong> <?= $inv['nama'] ?></p>
<p><strong>No:</strong> <?= $inv['no'] ?></p>
<p><strong>Tarikh:</strong> <?= $inv['tarikh'] ?></p>

<table class="table">

<tr>
<th>Produk</th>
<th>Saiz</th>
<th>Harga</th>
<th>Qty</th>
<th>Jumlah</th>
</tr>

<?php foreach($inv['items'] as $i): ?>

<tr>
<td><?= $i['nama_produk'] ?></td>
<td><?= $i['saiz'] ?></td>
<td class="text-right">RM <?= number_format($i['harga'],2) ?></td>
<td class="text-center"><?= $i['qty'] ?></td>
<td class="text-right">RM <?= number_format($i['jumlah'],2) ?></td>
</tr>

<?php endforeach; ?>

<tr>
<td colspan="4" class="text-right"><strong>Total</strong></td>
<td class="text-right total">RM <?= number_format($inv['total'],2) ?></td>
</tr>

</table>

</div>