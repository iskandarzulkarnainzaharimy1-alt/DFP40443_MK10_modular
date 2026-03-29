<?php
session_start();
include "../config/produk.php";

$nama = htmlspecialchars(trim($_POST['nama_pelanggan']));
$tempahan = $_POST['tempahan'] ?? [];

$items = [];
$total = 0;

foreach($tempahan as $id=>$saiz_list){

foreach($data as $p){

if($p['id']==$id){

foreach($saiz_list as $saiz=>$qty){

$qty=(int)$qty;

if($qty>0){

$harga=$p['harga'][$saiz];
$jumlah=$qty*$harga;

$items[]=[
'nama_produk'=>$p['nama'],
'saiz'=>$saiz,
'harga'=>$harga,
'qty'=>$qty,
'jumlah'=>$jumlah
];

$total+=$jumlah;

}

}

}

}

}

if($total==0){
header("Location:../index.php?menu=tempah");
exit();
}

$_SESSION['invois_data']=[
'no'=>'INV-'.rand(10000,99999),
'nama'=>$nama,
'tarikh'=>date("d/m/Y"),
'items'=>$items,
'total'=>$total
];

header("Location:../index.php?menu=invois");
exit();