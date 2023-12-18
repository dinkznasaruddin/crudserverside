<!-- Aplikasi CRUD dengan PHP 7, MySQLi, Ajax, DataTables ServerSide, Bootstrap 4, dan SweetAlert 
*************************************************************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : Oktober 2018
* Update       : -
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone / WA   : +62-813-7778-3334
-->

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi CRUD dengan PHP 7, MySQLi, Ajax, DataTables ServerSide, Bootstrap 4, dan SweetAlert">
        <meta name="keywords" content="Aplikasi CRUD dengan PHP 7, MySQLi, Ajax, DataTables ServerSide, Bootstrap 4, dan SweetAlert">
        <meta name="author" content="Indra Styawantoro">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
        <!-- datepicker CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
        <!-- Sweetalert CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- Fungsi untuk membatasi karakter yang diinputkan -->
        <script type="text/javascript" src="assets/js/fungsi_validasi_karakter.js"></script>
        <!-- SweetAlert2 Plugin JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <title>Ecopa - Word List</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <h5 class="my-0 mr-md-auto font-weight-normal">ECOPA Wordlist</h5>
                <a class="btn btn-info" id="btnTambah" href="#" data-toggle="modal" data-target="#modalTambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <!-- Tabel transaksi penjualan untuk menampilkan data transaksi penjualan dari database -->
                    <table id="tabel-transaksi" class="table table-striped">
                        <thead>
                            <tr>
                            <th>No</th>    
                            <th>id</th>
                                <th>word</th>
                                <th>speech</th>
                                <th>Meaning</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal tambah data transaksi penjualan -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Input Word</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formTambah">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Word</label>
                                <input type="text" class="form-control" id="word" name="word" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>speech</label>
                                <input type="text" class="form-control" id="speech" name="speech" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <input type="text" class="form-control" id="level" name="level" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Meaning</label>
                                <input type="text" class="form-control" id="meaning" name="meaning" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>word Detail</label>
                                <input type="text" class="form-control" id="word_detail" name="word_detail" autocomplete="off">
                            </div>


                          

                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-submit" id="btnSimpan">Simpan</button>
                            <button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal ubah data transaksi penjualan -->
        <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbah" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Data Word</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formUbah">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Id Word</label>
                                <input type="text" class="form-control" id="id" name="id" autocomplete="off" readonly>
                            </div>

                            <div class="form-group">
                                <label>word</label>
                                <input type="text" class="form-control" id="word_ubah" name="word_ubah" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>speech</label>
                                <input type="text" class="form-control" id="speech_ubah" name="speech_ubah" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <input type="text" class="form-control" id="level_ubah" name="level_ubah" autocomplete="off">
                                
                            </div>

                            <div class="form-group">
                                <label>Meaning</label>
                                <input type="text" class="form-control" id="meaning_ubah" name="meaning_ubah" autocomplete="off">
                               
                            </div>
                            <div class="form-group">
                                <label>Word Detail</label>
                                <input type="text" class="form-control" id="word_detail_ubah" name="word_detail_ubah" autocomplete="off">
                                
                               
                            </div>

                       
                       
                       
                        

                            
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info btn-submit" id="btnUbah">Ubah</button>
                            <button type="button" class="btn btn-secondary btn-reset" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
           
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="assets/js/popper.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- fontawesome Plugin JS -->
        <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
        <!-- DataTables Plugin JS -->
        <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
        <!-- datepicker Plugin JS -->
        <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>

        <script type="text/javascript">
      

      

        $(document).ready(function(){
            // initiate plugin ====================================================================================
            // ----------------------------------------------------------------------------------------------------
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            // dataTables plugin
            $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
            // ====================================================================================================

            // Tampil Data ========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // datatables serverside processing
            var table = $('#tabel-transaksi').DataTable( {
                "bAutoWidth": false,
                "scrollY": '58vh',
                "scrollCollapse": true,
                "processing": true,
                "serverSide": true,
                "ajax": 'data_transaksi.php',     // panggil file data_transaksi.php untuk menampilkan data transaksi dari database
                "columnDefs": [ 
                    { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '80px', "className": 'center' },
                    { "targets": 1, "width": '80px', "className": 'center' },
                    { "targets": 2, "width": '80px', "className": 'center' },
                    { "targets": 3, "width": '80px', "className": 'center' },
                    { "targets": 5, "width": '80px', "className": 'center' },
                    { "targets": 3, "width": '80px', "className": 'center' },
                   
                                        {
                      "targets": 5, "data": null, "orderable": false, "searchable": false, "width": '70px', "className": 'center',
                      "render": function(data, type, row) {
                          var btn = "<a title=\"Hapus\" class=\"btn btn-danger btn-sm btnHapus\" href=\"#\"><i class=\"fas fa-eye\"></i></a>";
                          return btn;
                      } 
                    } 
                ],
                "order": [[ 1, "desc" ]],           // urutkan data berdasarkan id_transaksi secara descending
                "iDisplayLength": 10,               // tampilkan 10 data
                "rowCallback": function (row, data, iDisplayIndex) {
                    var info   = this.fnPagingInfo();
                    var page   = info.iPage;
                    var length = info.iLength;
                    var index  = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            } );
            // ====================================================================================================

            // Simpan Data ========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // Tampikan Form Tambah Data
            $('#btnTambah').click(function(reload){
                // reset form
                $('#formTambah')[0].reset();
            });

            // Proses Simpan Data
            $('#btnSimpan').click(function(){
                // Validasi form input
                // jika word kosong
                if ($('#word').val()==""){
                    // focus ke input tanggal
                    $( "#word" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Word tidak boleh kosong.", "warning");
                }
                // jika speech kosong
                else if ($('#speech').val()==""){
                    // focus ke input nama_barang
                    $( "#speech" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Speech tidak boleh kosong.", "warning");
                }
                // jika level Kosong
                else if ($('#level').val()=="" || $('#level').val()==0){
                    // focus ke input harga_barang
                    $( "#level" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "level tidak boleh kosong.", "warning");
                }
                // jika Meaning kosong atau 0 (nol)
                else if ($('#meaning').val()=="" || $('#meaning').val()==0){
                    // focus ke input jumlah_beli
                    $( "#meaning" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Meaning tidak boleh kosong .", "warning");
                }
                // jika semua data sudah terisi, jalankan perintah simpan data
                else{

                    var data = $('#formTambah').serialize();
                    $.ajax({
                        type : "POST",
                        url  : "proses_simpan.php",
                        data : data,
                        success: function(result){                          // ketika sukses menyimpan data
                            if (result==="sukses") {
                            
                                // tampilkan pesan sukses simpan data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil disimpan.", "success");
                                // tampilkan data transaksi
                                var table = $('#tabel-transaksi').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal simpan data
                                swal("Gagal!", "Data word tidak bisa disimpan.", "error");
                            }
                        }
                    });
                    return false;
                }
            });
            // ====================================================================================================

            // Ubah Data ==========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // Tampilkan Form Ubah Data
            $('#tabel-transaksi tbody').on( 'click', '.getUbah', function (){
                var data = table.row( $(this).parents('tr') ).data();
                var id_transaksi = data[ 1 ];
                
                $.ajax({
                    type : "GET",
                    url  : "get_transaksi.php",
                    data : {id:id_transaksi},
                    dataType : "JSON",
                    success: function(result){
                        
                        // tampilkan modal ubah data transaksi
                        $('#modalUbah').modal('show');
                        // tampilkan data transaksi
                        $('#id').val(result.id);
                        $('#word_ubah').val(result.word);
                        $('#speech_ubah').val(result.speech);
                        $('#level_ubah').val(result.level);
                        $('#meaning_ubah').val(result.meaning);
                        $('#word_detail_ubah').val(result.word_detail);
                    }
                });
            });

            // Proses Ubah Data
            $('#btnUbah').click(function(){
                // Validasi form input
                // jika word kosong
                if ($('#word_ubah').val()==""){
                    // focus ke input id
                    $( "#word_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Id tidak boleh kosong.", "warning");
                }
                
                // jika speech kosong atau 0 (nol)
                else if ($('#speech_ubah').val()==""){
                    // focus ke input meaning
                    $( "#speech_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Speech tidak boleh kosong.", "warning");
                }
                // jika Level kosong atau 0 (nol)
                else if ($('#level_ubah').val()==""){
                    // focus ke input meaning
                    $( "#level_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Level tidak boleh kosong.", "warning");
                }

                else if ($('#meaning_ubah').val()==""){
                    // focus ke input meaning
                    $( "#meaning_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "meaning tidak boleh kosong.", "warning");
                }

                else if ($('#word_detail_ubah').val()==""){
                    // focus ke input meaning
                    $( "#word_detail_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "word_detail tidak boleh kosong.", "warning");
                }
                // jika semua data sudah terisi, jalankan perintah ubah data
                else{
                    var data = $('#formUbah').serialize();
                    $.ajax({
                        type : "POST",
                        url  : "proses_ubah.php",
                        data : data,
                        success: function(result){                          // ketika sukses mengubah data
                            if (result==="sukses") {
                                // tutup modal ubah data transaksi
                                $('#modalUbah').modal('hide');
                                // tampilkan pesan sukses ubah data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil diubah.", "success");
                                // tampilkan data transaksi
                                var table = $('#tabel-transaksi').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal ubah data
                                swal("Gagal!", "Data Transaksi Penjualan tidak bisa diubah.", "error");
                            }
                        }
                    });
                    return false;
                }
            });
            // ====================================================================================================
            
            // Proses Hapus Data ==================================================================================
            // ----------------------------------------------------------------------------------------------------
            $('#tabel-transaksi tbody').on( 'click', '.btnHapus', function (){
                var data = table.row( $(this).parents('tr') ).data();
                // tampilkan notifikasi saat akan menghapus data
                
                Swal.fire({
                    title: "Detail Wordlist",
                    html: "<div>"+ data[ 6 ] +"</div>",
                    width: '1400px',
                    showConfirmButton:false,
                    type: "warning",
                    showCancelButton: true,

    
                    closeOnConfirm: false
                }, 
                // jika dipilih ya, maka jalankan perintah hapus data
                function () {
                    var id_transaksi = data[ 1 ];
                    $.ajax({
                        type : "POST",
                        url  : "proses_hapus.php",
                        data : {id:id_transaksi},
                        success: function(result){                          // ketika sukses menghapus data
                            if (result==="sukses") {
                                // tampilkan pesan sukses hapus data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil dihapus.", "success");
                                // tampilkan data transaksi
                                var table = $('#tabel-transaksi').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal hapus hapus data
                                swal("Gagal!", "Data Transaksi Penjualan tidak bisa dihapus.", "error");
                            }
                        }
                    });
                    
                });
            });
            // ====================================================================================================
        });
        </script>
    </body>
</html>




                                            <label>Word Detail</label>
                                            <textarea type="text" class="form-control" id="word_detail" name="word_detail" autocomplete="off"> 
                                            
                                            </textarea>

											<script>
                                             // Replace the <textarea id="editor1"> with a CKEditor 4
                                             // instance, using default configuration.
                                             CKEDITOR.replace( 'editor1');
                                             </script>
											
                                            </div>

