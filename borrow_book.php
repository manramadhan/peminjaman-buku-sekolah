<?php
// Koneksi ke database SQLite
$db = new PDO('sqlite:db.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Proses meminjam buku
if (isset($_GET['borrow'])) {
    $id = $_GET['borrow'];
    try {
        $stmt = $db->prepare("UPDATE books SET quantity = quantity - 1 WHERE id = ? AND quantity > 0");
        $stmt->execute([$id]);

        // Cek jika peminjaman berhasil
        if ($stmt->rowCount() > 0) {
            // Pesan sukses peminjaman
            $message = "Anda berhasil meminjam buku.";
        } else {
            // Pesan jika buku tidak tersedia
            $message = "Buku tidak tersedia untuk dipinjam.";
        }
    } catch (PDOException $e) {
        echo "Kesalahan dalam persiapan query untuk meminjam: " . $e->getMessage();
    }
    header("Location: index.php"); // Redirect kembali ke index
}
