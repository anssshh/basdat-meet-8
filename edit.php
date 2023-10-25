<?php
//panggil database
include("config.php");

//periksa apakah form telah disubmit
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $sekolah = $_POST['sekolah_asal'];

    $query = pg_query($db, "UPDATE calonsiswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', sekolah_asal='$sekolah' WHERE id=$id");

    if( $query ) {
        // Fetch updated data
        $query = pg_query($db, "SELECT * FROM calonsiswa WHERE id=$id");
        $siswa = pg_fetch_array($query);
        
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: daftarsiswa.php');
    } else {
        die("gagal mengupdate...");
    }
} else {
    // jika tidak, ambil id dari query string dan tampilkan form edit
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // ambil data siswa dari database
        $query = pg_query($db, "SELECT * FROM calonsiswa WHERE id=$id");
        $siswa = pg_fetch_array($query);

        // tampilkan form edit dengan data siswa
        include("formedit.php");
    } else {
        die("akses dilarang...");
    }
}
?>
