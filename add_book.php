<?php
// Koneksi ke database SQLite
$db = new PDO('sqlite:db.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Jika form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'], $_POST['author'], $_POST['quantity'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $quantity = $_POST['quantity'];

        // Upload gambar
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);

        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                try {
                    $stmt = $db->prepare("INSERT INTO books (title, author, image, quantity) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$title, $author, $image, $quantity]);
                    header("Location: index.php"); // Redirect kembali ke index
                } catch (PDOException $e) {
                    echo "Kesalahan dalam persiapan query: " . $e->getMessage();
                }
            } else {
                echo "Gagal mengupload gambar! Cek izin folder uploads.";
            }
        } else {
            echo "Kesalahan saat mengupload file: " . $_FILES['image']['error'];
        }
    }
}
