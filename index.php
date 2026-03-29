<?php
session_start();
$menu = $_GET['menu'] ?? 'utama';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
?>

<h2 class="title">Selamat Datang</h2>
<hr class="line">


<?php if ($menu == 'utama'): ?>
    
    
    <?php include __DIR__ . '/data/products.php'; ?>

    <h2>Senarai Biskut</h2>

    <div class="produk-row">
        <?php foreach ($data as $item): ?>
            <div class="produk">
                <img src="gambar/<?= $item['gambar'] ?>" width="150">
                <h3><?= $item['nama'] ?></h3>
                <p>RM <?= $item['harga']['kecil'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

<?php elseif ($menu == 'tempah'): ?>

    <?php include __DIR__ . '/data/products.php'; ?>

    <h2>Tempah Biskut</h2>

    <form method="POST">
        <select name="produk">
            <?php foreach ($data as $item): ?>
                <option value="<?= $item['nama'] ?>"><?= $item['nama'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="qty" placeholder="Kuantiti" required>

        <button type="submit">Tempah</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['produk'] = $_POST['produk'];
        $_SESSION['qty'] = $_POST['qty'];

        header("Location: index.php?menu=invois");
        exit();
    }
    ?>

<?php elseif ($menu == 'invois'): ?>

    <h2>Invois</h2>

    <?php if (isset($_SESSION['produk'])): ?>
        <p>Produk: <?= $_SESSION['produk'] ?></p>
        <p>Kuantiti: <?= $_SESSION['qty'] ?></p>
    <?php else: ?>
        <p>Tiada tempahan</p>
    <?php endif; ?>

<?php else: ?>
    <h2>Page Not Found</h2>
<?php endif; ?>

<div class="card">
    <h3>Cara Membuat Tempahan</h3>
    <p>
    Selamat datang ke Biskut Klasik! Untuk membuat tempahan, sila ikuti langkah-langkah mudah ini.
    Mula-mula, klik pada menu <b>Tempah</b> di bahagian atas. Isikan kuantiti biskut yang anda inginkan dan
    masukkan nama anda, kemudian klik butang <b>Teruskan</b>.
    Invois akan dipaparkan secara automatik. Sila klik butang <b>Cetak</b> untuk mencetak invois tersebut.
    Invois ini perlu diserahkan kepada kami semasa membuat tempahan.
    Bayaran boleh dibuat secara tunai atau imbasan Kod QR semasa hari pengambilan tempahan. Terima kasih!
    </p>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>