<?php
// Koneksi ke database SQLite
try {
    $db = new PDO('sqlite:db.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buat tabel jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS books (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        author TEXT NOT NULL,
        image TEXT,
        quantity INTEGER NOT NULL
    )");

    // Ambil data buku dari database
    $result = $db->query("SELECT * FROM books");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
