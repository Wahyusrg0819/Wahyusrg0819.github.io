<?php
// Meminta jembatan koneksi ke database
include "koneksi.php";

// Mendapatkan nilai $id dari parameter URL
$id = $_GET['id'];

// Menerima inputan
$angkatan = $_POST['angkatan'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];

// Pemeriksaan jika ada data inputan kosong
if ($angkatan == "" || $nama == "" || $nim == "" || $jurusan == "") {
    ?>
    <script language="javascript">
        alert('Masih ada data yang kosong');
        // Mengarahkan kembali ke halaman data_edit.php dengan menyertakan parameter id
        document.location.href="data_edit.php?id=<?php echo $id; ?>";
    </script>
    <?php
} else {
    // Query untuk melakukan update ke database
    $sql = "UPDATE m_siswa SET angkatan='$angkatan', nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id='$id'";
    
    // Menjalankan query
    if ($koneksi->query($sql) === false) {
        // Jika gagal, tampilkan pesan kesalahan
        trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->error, E_USER_ERROR);
    } else {
        // Jika berhasil, alihkan ke halaman index.php
        ?>
        <script language="javascript">
            alert('Berhasil Disimpan');
            document.location.href="index.php";
        </script>
        <?php
    }
}
?> <!-- Tutup PHP -->
