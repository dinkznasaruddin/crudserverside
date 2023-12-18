<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {
    // panggil file config.php untuk koneksi ke database
    require_once "config/config.php";

    if (isset($_POST['id'])) {
        // ambil data hasil post dari ajax
        $id_word = $mysqli->real_escape_string(trim($_POST['id']));
        $word  = $mysqli->real_escape_string(trim($_POST['word']));
        $speech = $mysqli->real_escape_string(trim($_POST['speech']));
        $level  = $mysqli->real_escape_string(trim($_POST['level']));
        $meaning  = $mysqli->real_escape_string(trim($_POST['meaning']));
        $word_detail = $mysqli->real_escape_string(trim($_POST['word_detail']));

        // perintah query untuk mengubah data pada tabel transaksi
        $update = $mysqli->query("UPDATE tb_wordlist SET 
                                          
                                          word  = '$word', 
                                          speech = '$speech',
                                          `level` = '$level',
                                          meaning = '$meaning',
                                          word_detail = '$word_detail'

                                          WHERE id ='$id_word'")
                                 
                                 or die('Ada kesalahan pada query update : '.$mysqli->error);
        // cek query
        if ($update) {
            // jika berhasil tampilkan pesan berhasil ubah data
            echo "sukses";
        } else {
            // jika gagal tampilkan pesan gagal ubah data
            echo "gagal";
        }
    }
    // tutup koneksi
    $mysqli->close();   
} else {
    echo '<script>window.location="index.php"</script>';
}
?>