<?php 
    session_start();
    $koneksi = new mysqli("localhost","bemunjay_pemilu","pemilu_2023*","bemunjay_pemilu");
      
    if (isset($_SESSION['user']))   
        {
             $akun='user';      
        }
    else
        {
            echo "<script>alert('Anda Belum Login [Silahkan Login]')</script>";
            echo "<script>location='login.php'</script>";
        }  
        
        $pemilihan = "tutup";
        
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengambilan Suara</title>
    <!-- Favicons -->
    <link href="dist/img/logokpum.jpg" rel="icon" />
    <link href="dist/output.css?<?php echo time(); ?>" rel="stylesheet" />
    <script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    </script>
</head>

<body>

    <!-- Header Start -->
    <header
        class="item-center absolute top-0 left-0 z-10 flex w-full bg-transparent dark:bg-transparent dark:bg-dark dark:shadow-slate-100">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div class="mr-10 flex px-4 md:-mt-5 lg:-mt-0">
                    <a href="#home" class="block items-center py-6 text-3xl font-bold text-primary">UNJAYA</a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button"
                        class="absolute right-4 block md:hidden lg:hidden">
                        <span
                            class="hamburger-line origin-top-left bg-dark transition duration-300 ease-in-out dark:bg-white"></span>
                        <span class="hamburger-line bg-dark transition duration-300 ease-in-out dark:bg-white"></span>
                        <span
                            class="hamburger-line origin-bottom-left bg-dark transition duration-300 ease-in-out dark:bg-white"></span>
                    </button>
                    <nav id="nav-menu"
                        class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 md:static md:block md:max-w-full md:rounded-none md:bg-transparent md:shadow-none lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
                        <ul class="block md:flex lg:flex">
                            <li class="group">
                                <a href="index.php?#home"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-lime-500 dark:text-white">Home</a>
                            </li>
                            <li class="group">
                                <a href="index.php?#about"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-lime-500 dark:text-white">About</a>
                            </li>
                            <li class="group">
                                <a href="index.php?#calon"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-lime-500 dark:text-white">Kandidat</a>
                            </li>
                            <li class="group">
                                <a href="chose.php"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-lime-500 dark:text-white">Selection</a>
                            </li>
                            <li class="group">
                                <a href="akun.php"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-lime-500 dark:text-white">Akun</a>
                            </li>
                            <li class="group">
                                <a href="logout.php"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Logout</a>
                            </li>


                            <li class="flex items-center pl-8 mt-2">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">light</span>
                                    <input type="checkbox" class="hidden" id="dark-toggle" />
                                    <label for="dark-toggle">
                                        <div
                                            class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div
                                                class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                                            </div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-slate-500">dark</span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header end -->
</body>
<?php 
$nimsama=$_SESSION["user"]['nim'];
        $ambil = $koneksi->query("SELECT * FROM pemilihan WHERE nim_pemilih='$nimsama'");
        $yangcocok = $ambil->num_rows;
if ($yangcocok>=1) {
    echo "<script>alert('Anda Sudah Memilih')</script>";
    echo "<script>location='akun.php'</script>";
}?>


<!-- Calon Section Start -->
<section id="calon" class="bg-slate-100 pt-36 pb-32 dark:bg-slate-800">
    <div class="container">
        <?php 
            if ($pemilihan=="buka") 
            {  ?>
        
        <div class="w-full px-4">
            <div class="max-w xl mx-auto mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white">PILIH KANDIDAT</h2>
                <p class="text-md mb-5 font-medium text-slate-700 dark:text-slate-400">Jangan Salah pilih Karena pilihan
                    anda
                    tidak dapat di ganti setelah memilih</p>
                <form method="POST">
                    <div class="row row-space">
                        <div class="col-2">

                            <select name="kandidat" required
                                oninvalid="this.setCustomValidity('Pilihan Kandidat tidak boleh kosong')"
                                oninput="setCustomValidity('')"
                                class="bg-gray-500 text-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled="disabled" selected="selected" value="">PILIH KANDIDAT</option>
                                <?php $ambil=$koneksi->query("SELECT * FROM kandidat");?>
                                <?php while($pecah = $ambil->fetch_assoc()) {?>
                                <option value="<?php echo $pecah['presiden']; ?>"><?php echo $pecah['presiden'];?>
                                </option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button name="save"
                            class="focus:outline-none text-white bg-primary hover:bg-amber-600 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-primary dark:hover:bg-amber-600 dark:focus:ring-purple-900 "><b>Masukan
                                Suara</b></button>
                    </div>
                    <?php 
                        if (isset($_POST['save']))
                        {   
                            
                          
                            $nim=$_SESSION["user"]['nim'];
                            $fakultas=$_SESSION["user"]['fakultas'];
                            $prodi=$_SESSION["user"]['prodi'];
                            $koneksi->query("INSERT INTO pemilihan (nim_pemilih,fakultas_pemilih,prodi_pemilih,pilihan)VALUES('$nim','$fakultas','$prodi','$_POST[kandidat]')");
                            
                            echo "<div class='flex p-4 mb-4 bg-blue-100 border-t-4 border-blue-500 ' role='alert'>
                            <svg aria-hidden='true' class='flex-shrink-0 w-5 h-5 text-blue-700 ' fill='currentColor' viewBox='0 0 20 20' ><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path></svg>
                            <div class='ml-3 text-sm font-medium text-blue-600 '>
                              Suara Anda Sudah Tersimpan
                            </div>
                            </div>
                            ";
                            echo "<meta http-equiv='refresh' content='1;url=akun.php'>";

                             } ?>
                </form>
                
                <?php }
                else {?>
                
                
                <!-- tutup Section Start -->
                <section id="calon" class="bg-slate-100 -mt-8 lg:-mt-5 dark:bg-slate-800">
                    <div class="container">
                        <div class="flex flex-wrap ">
                            <div class="w-1/6 md:mx-auto mx-auto flex flex-wrap">
                                <div class="w-14 mx-auto lg:ml-20 lg:w-1/6 ">
                                    <img src="dist/img/kampus.PNG" alt="kampus" class="relative " />
                                </div>
                                <div class="w-14 mx-auto lg:w-1/6 ">
                                    <img src="dist/img/logobem.png" alt="kampus" class="relative " />
                                </div>
                                <div class="w-14 mx-auto mt-3 lg:w-1/6 mr-5 ">
                                    <img src="dist/img/kabinet.png" alt="kampus" class="relative " />
                                </div>
                                <div class="w-14 mx-auto lg:w-1/6">
                                    <img src="dist/img/kpumrmv.png" alt="kampus" class="relative " />
                                </div>
                                <div class="w-14 mx-auto mt-3 lg:w-1/6">
                                    <img src="dist/img/logodagri.png" alt="kampus" class="relative w-99" />
                                </div>


                            
                        </div>

                    </div>
                </section>

                <!-- Tutup Section End -->
                <div class="w-full px-4 pt-6 ">
                    <div class="max-w xl mx-auto mb-16  text-center">
                        <h2 class="mb-4 text-3xl lg:text-4xl font-bold text-lime-600 text-Uppercase">
                            PEMUNGUTAN SUARA SUDAH DITUTUP</h2>
                        <h2 class="mb-4 text-3xl lg:text-4xl font-bold text-primary ">TERIMAKASIH SUDAH MELAKUKAN PEMUNGUTAN SUARA</h2>
                    </div>
                </div>


                <?php }?>
            </div>

        </div>
    </div>
    
    <?php if ($pemilihan=="buka") 
            {  ?>

    <div class="flex flex-wrap justify-center">
        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-slate-900">
                <img src="dist/img/kd1.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
                <div class="py-8 px-6">
                    <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                        <a href="information.php?#about">Kabinet Gardha Eskalasi</a>
                    </h3>
                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">Roni
                        Axesan Saputra
                    </h3>
                    <p class="-mt-3 text-base font-medium text-slate-600">
                        Hukum (S1) 2021</p>
                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                        Restika Mithari
                    </h3>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600">
                        Farmasi (S1) 2020 </p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        VISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify">
                        Mewujudkan BEM UNJAYA sebagai fungsi eksekutif mahasiswa yang responsif dan inovatif
                        dalam membangun pergerakan kolaboratif yang peduli terhadap problematika mahasiswa demi
                        terciptanya kebermanfaatan, dan menjalankan nilai tridharma perguruan tinggi. </p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        MISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify">
                        1. Membangun Badan Eksekutif Mahasiswa yang lebih solid dan kontributif dalam
                        menampung seluruh aspirasi mahasiswa Unjaya.<br>
                        2. Mewujudkan korelasi yang baik antara internal dan eksternal Kampus Unjaya.<br>
                        3. Meningkatkan kepekaan dan partisipasi mahasiswa dalam mengikuti berbagai bidang
                        kegiatan guna mewujudkan mahasiswa yang berkarakter.<br>
                        4. Memaksimalkan aksi nyata bem unjaya dalam memberi dukungan kepada mahasiswa
                        terhadap minat, bakat dan potensi yang dimiliki setiap mahasiswa.<br>
                        5. Tercapainya ruang gerak mahasiswa yang peduli terhadap masyarakat sebagai bentuk
                        perwujudan nilai kejuangan jenderal Achmad Yani dan pemenuhan tridharma perguruan
                        tinggi.<br>
                    </p>
                    <a href="information.php?#about" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                </div>
            </div>
        </div>
        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark">
                <img src="dist/img/kd2.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
                <div class="py-8 px-6">

                    <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                        <a href="information.php?#about2">Kabinet Cakra Restorasi</a>
                    </h3>

                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">Alfin
                        Thunder Masobi
                    </h3>
                    <p class="-mt-3 text-base font-medium text-slate-600">
                        Teknologi Informasi (S1) 2020</p>
                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">Anisa
                        Fitriani
                    </h3>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600">
                        Manajemen (S1) 2020</p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        VISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify">
                        Revitalisasi BEM sebagai pionir dalam pergerakan, untuk mewujudkan mahasiswa yang
                        berkompeten dan memiliki integritas terhadap problematika yang terjadi di tengah masyarakat,
                        serta mewujudkan BEM yang independen, berkualitas, aspiratif, dan progresif.</p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        MISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify">
                        1. Mengimplementasikan nilai-nilai, prinsip, dan semangat kejuangan Jenderal Achmad Yani di
                        Universitas Jenderal Achmad Yani Yogyakarta.<br>
                        2. Menjadi wadah aspirasi, kordinasi dan komunikasi antar seluruh elemen di Universitas
                        Jenderal Achmad Yani Yogyakarta.<br>
                        3. Menjadi wadah untuk memperjuangkan kepentingan maupun hak-hak mahasiswa/i Universitas
                        Jenderal Achmad Yani Yogyakarta.<br>
                        4. Menjadi wadah pengembangan Minat dan bakat serta moral mahasiswa/i di Universitas
                        Jenderal Achmad Yani Yogyakarta.<br>

                    </p>
                    <a href="information.php?#about2" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                </div>
            </div>
        </div>
        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark">
                <img src="dist/img/kd3.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
                <div class="py-8 px-6">

                    <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                        <a href="information.php?#about3">Kabinet Gema Naraksi</a>
                    </h3>
                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">Joni
                        Indra Pratama
                    </h3>
                    <p class="-mt-3 text-base font-medium text-slate-600">
                        Informatika (S1) 2021</p>
                    <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                        Khusnul Fera Triyansyah
                    </h3>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600">
                        Keperawatan (S1) 2021</p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        VISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify">
                        Mewujudkan BEM UNJAYA sebagai organisasi yang kokoh di dalamnya dan sebagai fasilitator yang
                        peka terhadap suara mahasiswa serta meningkatkan citra BEM UNJAYA yang baik dilingkup
                        internal maupun eksternal kampus. </p>
                    <h2 class="mb-3 block text-large font-semibold text-dark hover:text-sky-500 dark:text-white">
                        <br>MISI :
                    </h2>
                    <p class="-mt-3 mb-6 text-base font-medium text-slate-600 text-justify ">
                        1. Menumbuhkan sikap profesionalitas atas dasar kekeluargaan<br>
                        2. Menghidupkan aspirasi mahasiswa atas hak bersuara serta berperan langsung dalam mengatasi
                        masalah dan isu-isu di internal maupun eksternal kampus.<br>
                        3. Memfasilitasi potensi dalam mengembangkan minat dan bakat mahasiswa Unjaya.<br>
                        4. Mewadahi mahasiswa untuk berpartisipasi dalam pengabdian di lingkungan masyarakat.<br>
                        5. Mempererat relasi antar organisasi di internal maupun eksternal kampus.<br>

                    </p>
                    <a href="information.php?#about3" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <br><br><br><br>
    </div>
</section>
<!-- Calon Section end -->

<!-- Footer Start -->
<footer class="bg-dark pt-10 pb-10">
    <div class="container">
        <p class="text-center text-sm font-medium text-slate-500">
            Designed by
            <a href="https://wa.me/qr/UQGA2UZVEVUQJ1"> <span class="font-bold text-lime-700">DAAW</span></a>, with
            use
            <span class="font-bold text-primary">Tailwind CSS</span>
        </p>
    </div>
</footer>
<!-- Footer End -->

<!-- Back to top Start-->
<a href="#calon"
    class="fixed bottom-4 right-4 z-[9999] hidden h-11 w-11 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
    id="to-top">
    <span class="mt-1 block h-3 w-3 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End-->

<script src="dist/js/script.js"></script>
</body>

</html>