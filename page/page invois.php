<?php
if (!isset($_SESSION['invois_data'])) {
    echo "<script>alert('Tiada invois'); window.location='index.php?menu=tempah';</script>";
    exit();
}
$invois = $_SESSION['invois_data'];
?>