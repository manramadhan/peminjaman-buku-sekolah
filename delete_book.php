<?php
// Koneksi ke database SQLite
$db = new PDO('sqlite:db.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Proses menghapus buku
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    try {
        $stmt = $db->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: index.php"); // Redirect kembali ke index
    } catch (PDOException $e) {
        echo "Kesalahan dalam persiapan query untuk menghapus: " . $e->getMessage();
    }
}
