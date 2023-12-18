<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
	// panggil file config.php untuk koneksi ke database
	require_once "config/config.php";

	// fungsi untuk membuat id transaksi
	$result = $mysqli->query("SELECT RIGHT(id,4) as kode FROM tb_wordlist ORDER BY id DESC LIMIT 1")
	                          or die('Ada kesalahan pada query tampil data id: '.$mysqli->error);
	$rows = $result->num_rows;
	// cek id
	if ($rows <> 0) {
	    // mengambil data id_transaksi
	    $data = $result->fetch_assoc();
	    $kode = $data['kode']+1; 			// jika sudah ada id_transaksi maka nomor urut + 1
	} else {
	    $kode = 1;							// jika belum ada id_transaksi maka nomor urut = 1
	}
	// buat id_transaksi
	$tanggal      = date("Ymd");                             // Tahun-Bulan-Hari
	$buat_id      = str_pad($kode, 4, "0", STR_PAD_LEFT);    // Nomor Urut
	$id           = "T-$tanggal-$buat_id";
	// ambil data hasil post dari ajax
	$word      = $mysqli->real_escape_string(trim($_POST['word']));
	$speech    = $mysqli->real_escape_string(trim($_POST['speech']));
	$level     = $mysqli->real_escape_string(trim($_POST['level']));
	$meaning   = $mysqli->real_escape_string(trim($_POST['meaning']));
	$word_detail = $mysqli->real_escape_string(trim($_POST['word_detail']));
	

	// perintah query untuk menyimpan data ke tabel transaksi
	$insert = $mysqli->query("INSERT INTO tb_wordlist (id,word,speech,`level`,meaning,word_detail)
	                          VALUES('$id','$word','$speech','$level','$meaning','$word_detail')")
	                          or die('Ada kesalahan pada query insert : '.$mysqli->error); 
	// cek query
	if ($insert) {
	    // jika berhasil tampilkan pesan berhasil simpan data
	    echo "sukses";
	} else {
		// jika gagal tampilkan pesan gagal simpan data
	    echo "gagal";
	}
	// tutup koneksi
	$mysqli->close();   
} else {
    echo '<script>window.location="index.php"</script>';
}
?>