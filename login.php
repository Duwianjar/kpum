<?php 
    session_start();
    $koneksi = new mysqli("localhost","bemunjay_pemilu","pemilu_2023*","bemunjay_pemilu");
      
    if (isset($_SESSION['user']))   
        {
            echo "<script>location='logout.php'</script>";     
        }
    else if (isset($_SESSION['admin']))   
        {
            echo "<script>location='logout.php'</script>";     
        }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login Mahasiswa </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="dist/img/logokpum.jpg" rel="icon" />
    <link href="main.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="dist/output.css?<?php echo time(); ?>" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading lg:chd sm:chd"></div>
                <div class="card-body">
                    <h2 class="title text-2xl"><b>Masuk</b></h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="fakultas" required>
                                            <option disabled="disabled" selected="selected" value="">fakultas</option>
                                            <option value="FTTI">FTTI</option>
                                            <option value="FKES">FKES</option>
                                            <option value="FES">FES</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="prodi" required>
                                            <option disabled="disabled" selected="selected" value="">Prodi</option>
                                            <option value="Informatika (S-1)">Informatika (S-1)</option>
                                            <option value="Sistem Informasi (S-1)">Sistem Informasi (S-1)</option>
                                            <option value="Teknologi Informasi (S-1)">Teknologi Informasi (S-1)</option>
                                            <option value="Teknik Industri (S-1)">Teknik Industri (S-1)</option>
                                            <option value="Keperawatan (S-1)">Keperawatan (S-1)</option>
                                            <option value="Kebidanan (D-3)">Kebidanan (D-3)</option>
                                            <option value="Pendidikan Profesi Ners">Pendidikan Profesi Ners</option>
                                            <option value="Rekam Medis dan Informasi Kesehatan (D-3)">Rekam Medis dan
                                                Informasi Kesehatan (D-3)</option>
                                            <option value="Farmasi (S-1)">Farmasi (S-1)</option>
                                            <option value="Teknologi Bank Darah (D-3)">Teknologi Bank Darah (D-3)
                                            </option>
                                            <option value="Kebidanan (S-1)">Kebidanan (S-1)</option>
                                            <option value="Pendidikan Profesi Bidan">Pendidikan Profesi Bidan</option>
                                            <option value="Akuntansi (S-1)">Akuntansi (S-1)</option>
                                            <option value="Hukum (S-1)">Hukum (S-1)</option>
                                            <option value="Psikologi (S-1)">Psikologi (S-1)</option>
                                            <option value="Manajemen (S-1)">Manajemen (S-1)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Full Name" name="nama" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NIM/NPM" name="nim" required>
                        </div>
                        <div class="p-t-20">
                            <button name="login" class="btn btn--radius btn--green">Masuk</button>
                        </div>
                        <?php 
                        
                        if (isset($_POST['login']))
                        {
                            $nama= mysqli_real_escape_string($koneksi, $_POST['nama']);
                            $nim= mysqli_real_escape_string($koneksi, $_POST['nim']);
                            $ambil = $koneksi->query("SELECT * FROM user WHERE prodi='$_POST[prodi]'AND fakultas='$_POST[fakultas]'AND nama='$nama'AND nim ='$nim'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1)
                            {
                                $_SESSION['user']=$ambil->fetch_assoc();
                                echo "<div class='flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 ' role='alert'>
                                        <svg aria-hidden='true' class='flex-shrink-0 w-5 h-5 text-green-700 ' fill='currentColor' viewBox='0 0 20 20' ><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path>
                                        </svg>
                                        <div class='ml-3 text-sm font-medium text-green-600 '>
                                        Login berhasil [ Selamat Datang ]
                                        </div>
                                      </div>
                                    ";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            }
                            else 
                            {
                                echo "<br><div class='flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 ' role='alert'>
                                        <svg aria-hidden='true' class='flex-shrink-0 w-5 h-5 text-red-700 ' fill='currentColor' viewBox='0 0 20 20' ><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path>
                                        </svg>
                                        <div class='ml-3 text-sm font-medium text-red-600 '>
                                        Login Gagal [ Cek Kembali Data yang Anda Masukkan ]
                                        </div>
                                      </div>
                                    ";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->