<?php 
// Masukkan Database
include("config.php"); 

if(isset($_GET['id']) ){

	// ambil data dari formulir
	$id = $_GET['id'];

	// buat query
    $query = pg_query($db, "DELETE FROM calonsiswa WHERE id=$id");

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: daftarsiswa.php');
	} else {
		die("gagal menghapus...");
	}


} else {
	die("Akses dilarang...");
}
?>

