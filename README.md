## Sistem Peminjaman Buku Sekolah
Sistem Peminjaman Buku Sekolah adalah sebuah aplikasi web sederhana yang memungkinkan pengelolaan data buku di perpustakaan sekolah, serta memudahkan proses peminjaman buku oleh siswa dan pengelolaan buku oleh admin. Aplikasi ini dibangun menggunakan HTML, CSS, dan PHP untuk antarmuka dan backend, serta SQLite sebagai database untuk menyimpan data buku dan transaksi.
![gambar](/screenshot/peminjaman-buku.png)

### Fungsi : 
1. #### Tambah Buku:

- Admin dapat menambahkan buku baru ke dalam database dengan mengisi judul buku, nama pengarang, jumlah buku, dan mengunggah gambar sampul buku.
Data yang diinput akan disimpan di database SQLite dan secara otomatis ditampilkan dalam tabel "Daftar Buku" di halaman utama.

2. #### Daftar Buku:

- Menampilkan semua buku yang tersedia di perpustakaan dalam bentuk tabel.
Setiap baris tabel menampilkan informasi seperti gambar sampul buku, judul, pengarang, jumlah buku yang tersedia, dan tombol aksi (Hapus dan Pinjam).

3. #### Hapus Buku:

- Admin dapat menghapus buku dari database dengan menekan tombol "Hapus".
Data buku yang dihapus akan dihapus dari database SQLite dan tabel daftar buku akan diperbarui.

4. #### Pinjam Buku:

- Siswa dapat meminjam buku dengan menekan tombol "Pinjam".
Jumlah stok buku yang dipinjam akan otomatis berkurang di database SQLite sesuai dengan jumlah yang tersedia.
Proses peminjaman ini juga dapat mencatat data transaksi untuk memantau buku yang dipinjam.

### Cara Menggunakan :
1. Clone repository ini ke dalam folder server lokal Anda.
``` git clone https://github.com/username/sistem-peminjaman-buku.git```

2. Letakkan file database.sqlite di direktori proyek.

3. Sesuaikan konfigurasi koneksi database pada file process.php agar sesuai dengan path file database.sqlite.

4. Jalankan aplikasi di server lokal Anda (misalnya menggunakan XAMPP atau Laragon).

5. Akses melalui browser dengan URL **contoh**  : ```http://localhost/sistem-peminjaman-buku.```


## Ucapan Terima Kasih

Terima kasih telah mengunjungi dan menggunakan **Sistem Peminjaman Buku Sekolah** ini! Semoga proyek ini dapat membantu Anda dalam mengelola buku di perpustakaan sekolah dengan lebih mudah. Jika Anda memiliki saran, masukan, atau ingin berkontribusi untuk pengembangan lebih lanjut, jangan ragu untuk membuat pull request atau membuka issue di repository ini.

Kami sangat menghargai setiap feedback dari Anda!

Salam hangat,  
[BY FIRMAN]
