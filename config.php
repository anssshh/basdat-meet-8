<?php
$db=pg_connect('host=localhost dbname=sekolah user=postgres password=Basdat875');
if( !$db ){
    die("Gagal terhubung dengan database: " . pg_last_error());
}
?>