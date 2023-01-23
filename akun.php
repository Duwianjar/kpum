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
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akun Mahasiswa</title>
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


</html>

<!-- Hero Section Start -->
<section id="home" class="pt-40 pb-10 dark:bg-dark">
    <div class="coutainer">
        <div class="flex flex-wrap">
            <div class="lg:w-1/6"></div>
            <div class="w-full self-end px-4 pt-5 mb-10 lg:pt-40 md:w-1/2 md:pt-0 lg:w-1/3">
                <div class="relative lg:right-0 lg:-mt-20 z-[0]">
                    <img src="dist/img/kpum.png" alt="logo" width="260"
                        class="relative z-10 mx-auto max-w-full rounded-lg" />
                </div>
            </div>
            <div class="w-full self-center mt-5 px-4 md:w-1/2 mb-10 lg:w-1/3 lg:px-0">
                <h1 class="text-xl font-bold text-lime-600 md:text-xl lg:text-xl"> Hi,👋
                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-4xl">
                        <?php echo $_SESSION["user"]['nama'];?></span>
                    <span
                        class="mt-1 block text-2xl font-bold text-primary lg:text-4xl"><?php echo $_SESSION["user"]['nim'];?>
                    </span>
                    <span
                        class="mt-1 block text-2xl font-bold text-primary lg:text-4xl"><?php echo $_SESSION["user"]['prodi'];?>
                    </span>
                    <?php $nimsama=$_SESSION["user"]['nim'];
                        $ambil = $koneksi->query("SELECT * FROM pemilihan WHERE nim_pemilih='$nimsama'");
                        $yangcocok = $ambil->num_rows;
                        if ($yangcocok>=1){?>

                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-2xl">Suara anda sudah kami simpan
                        <br>' Terimakasih anda sudah
                        melakukan pemilihan suara '
                    </span>
                    <?php }?>
                </h1>
                <br>
                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray" />
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Calon Section Start -->
<section id="calon" class="bg-slate-100 pt-10 pb-32 dark:bg-slate-800">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w xl mx-auto mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white">Pilihanmu</h2>
            </div>
        </div>
        <?php  
            
            if ($yangcocok>=1) {
                $pecah=$ambil->fetch_assoc();?>
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-slate-900">
                    <?php
                        if ($pecah['pilihan']=='No. 1 Roni Axesan Saputra - Hukum (S1) 2021 dan Restika Mithari - Farmasi (S1) 2020') {
                    ?>
                    <img src="dist/img/kd1.jpeg" alt="kandidat2" class="w-full" />
                    <div class="py-8 px-6">
                        <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                            <a href="information.php">Kabinet Gardha Eskalasi</a>
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
                        <?php } elseif ($pecah['pilihan']=='No. 2 Alfin Thunder Masobi - Teknologi Informasi (S1) 2020 dan Anisa Fitriani - Manajemen (S1) 2020') {
                            ?>
                        <img src="dist/img/kd2.jpeg" alt="kandidat2" class="w-full" />
                        <div class="py-8 px-6">
                            <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                                <a href="information.php">Kabinet Cakra Restorasi</a>
                            </h3>
                            <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                                Alfin Thunder Masobi
                            </h3>
                            <p class="-mt-3 text-base font-medium text-slate-600">
                                Teknologi Informasi (S1) 2020</p>
                            <h3 class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                                Anisa
                        Fitriani
                            </h3>
                            <p class="-mt-3 mb-6 text-base font-medium text-slate-600">
                                Manajemen (S1) 2020</p>
                            <?php } elseif ($pecah['pilihan']=='No. 3 Joni Indra Pratama - Informatika (S1) 2021 dan Khusnul Fera Triyansyah - Keperawatan (S1) 2021') {
                                ?>
                            <img src="dist/img/kd3.jpeg" alt="kandidat3" class="w-full" />
                            <div class="py-8 px-6">
                                <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                                    <a href="information.php">Kabinet Gema Naraksi</a>
                                </h3>
                                <h3
                                    class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                                    Joni
                        Indra Pratama
                                </h3>
                                <p class="-mt-3 text-base font-medium text-slate-600">
                                    Informatika (S1) 2021</p>
                                <h3
                                    class="mb-3 block text-xl font-semibold text-dark hover:text-sky-500 dark:text-white">
                                    Khusnul Fera Triyansyah
                                </h3>
                                <p class="-mt-3 mb-6 text-base font-medium text-slate-600">
                                    Keperawatan (S1) 2021</p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
                                 else {?>
        <div class="w-full px-4">
            <div class="max-w xl mx-auto mb-16 text-center">
                <h1 class="text-xl font-bold text-lime-600 md:text-xl lg:text-xl ">
                    Kamu belum Memilih, silahkan <a href="chose.php" class="text-primary hover:text-sky-500">pilih</a>
                    terlebih dahulu
                </h1>
            </div>
        </div>
        <?php }?>
    </div>
</section>
<!-- Calon Section end -->

<!-- Footer Start -->
<footer class="bg-dark pt-10 pb-10">
    <div class="container">
        <p class="text-center text-sm font-medium text-slate-500">
            Designed by
            <a href="https://www.instagram.com/duwiaaw/"> <span class="font-bold text-lime-700">DAAW</span></a>, with
            use
            <span class="font-bold text-primary">Tailwind CSS</span>
        </p>
    </div>
</footer>
<!-- Footer End -->

<!-- Back to top Start-->
<a href="#home"
    class="fixed bottom-4 right-4 z-[9999] hidden h-11 w-11 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
    id="to-top">
    <span class="mt-1 block h-3 w-3 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End-->

<script src="dist/js/script.js"></script>
</body>

</html>