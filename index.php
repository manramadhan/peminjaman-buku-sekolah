<?php
include '../peminjaman-buku-sekolah/db/db.php';

$db = new PDO('sqlite:db.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Ambil data buku dari database
$result = $db->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Buku</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Peminjaman Buku</h1>

        <!-- Form untuk upload buku -->
        <form action="add_book.php" method="post" enctype="multipart/form-data">
            <label for="title">Judul Buku:</label>
            <input type="text" name="title" id="title" required><br><br>

            <label for="author">Pengarang:</label>
            <input type="text" name="author" id="author" required><br><br>

            <label for="image">Upload Gambar Buku:</label>
            <input type="file" name="image" id="image" required><br><br>

            <label for="quantity">Jumlah Buku:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" required><br><br>

            <button type="submit">Tambahkan Buku</button>
        </form>

        <h2>Daftar Buku</h2>
        <table class="book-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Gambar Buku" width="100"></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['author']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td>
                            <form action="delete_book.php" method="post" style="display: inline;">
                                <input type="hidden" name="delete" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="action-btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                            <?php if ($row['quantity'] > 0): ?>
                                <form action="borrow_book.php" method="get" style="display: inline;">
                                    <button type="submit" name="borrow" value="<?php echo $row['id']; ?>" class="action-btn borrow" onclick="return confirm('Apakah Anda yakin ingin meminjam buku ini?');">
                                        <i class="fas fa-book-open"></i> Pinjam
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="action-btn" disabled>
                                    <i class="fas fa-book-open"></i> Tidak Tersedia
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
 