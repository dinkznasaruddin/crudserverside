<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'tb_wordlist';
    // Table's primary key
    $primaryKey = 'id';

    $columns = array(
        array( 'db' => 'id', 'dt' => 1 ),
        array( 'db' => 'word', 'dt' => 2 ),
        array( 'db' => 'speech', 'dt' => 3 ),
        array( 'db' => 'level', 'dt' => 4 ),
        array( 'db' => 'meaning', 'dt' => 5 ),
        array( 'db' => 'word_detail', 'dt' => 6 )
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="index.php"</script>';
}
?>