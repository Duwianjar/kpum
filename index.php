<?php 
    session_start();
    $koneksi = new mysqli("localhost","bemunjay_pemilu","pemilu_2023*","bemunjay_pemilu");
      
    if (isset($_SESSION['user']))   
        {
             $akun='user';      
        }
    else
        {
            echo "<script>alert('Anda Belum Login [Silahakan Login Dulu ]')</script>";
            echo "<script>location='login.php'</script>";
        }
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemilu KBM</title>
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
            <div class="w-full self-center px-4 md:w-1/2 lg:w-1/3 lg:px-0">
                <h1 class="text-xl font-bold text-lime-600 md:text-xl lg:text-xl">
                    Pemilihan
                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-2xl"> PRESIDEN & WAKIL
                        PRESIDEN</span>
                    <span class="mt-1 block text-2xl font-bold text-primary lg:text-4xl"> BADAN EKSEKUTIF</span>
                    <span class="mt-1 block text-2xl font-bold text-primary lg:text-5xl"> MAHASISWA</span>
                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-2xl"> Universitas Jenderal
                        Achmad Yani Yogyakarta
                        <span class="text-dark dark:text-slate-200">2023</span></span>
                </h1>
                <p class="mb-10 font-medium leading-relaxed text-primary"></p>
                <a href="chose.php"
                    class="rounded-full bg-primary py-3 px-4 text-base font-semibold text-white transition duration-300 ease-in-out hover:bg-amber-600 hover:shadow-lg">
                    Langsung Memilih</a>
            </div>
            <div class="w-full self-end px-4 pt-40 md:w-1/2 md:pt-0 lg:w-1/3">
                <div class="relative -mt-10 lg:right-0 lg:-mt-20">
                    <marquee behavior="alternate" direction="up" height="290" scrollamount="2">
                        <img src="dist/img/logobem.png" alt="logo" width="270"
                            class="relative z-10 mx-auto max-w-full" />
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section Start -->
<section id="about" class="pt-36 pb-32 dark:bg-dark">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="lg:w-1/6"></div>
            <div class="mb-10 w-full lg:-ml-10 lg:w-1/3">
                <h4 class="mb-3 text-2xl font-bold uppercase text-primary">
                    <h3 class="mb-4 text-2xl font-semibold  text-dark dark:text-white lg:font-bold">
                        Selamat
                        datang mahasiswa Universitas Jenderal Achmad Yani Yogyakarta</h3>
                    <h3 class="mb-4 text-xl text-justify font-semibold text-slate-500 dark:text-slate-500 lg:font-bold">
                        Ayo gunakan hak suara kalian untuk menentukan masa depan UNJAYA. Golput bukan solusi dan
                        pilihan
                    </h3>
                    <hr style="height: 2px; border-width: 0; color: gray; background-color: gray" />
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Visi BEM UNJAYA :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        Mewujudkan BEM UNJAYA sebagai ruang bersama dalam wadah aspirasi mahasiswa untuk membangun
                        mahasiswa yang unggul, berkualitas, responsif, dan kompetitif dengan berdaya saing tinggi serta
                        bersinergi dan berlandaskan nilai-nilai kejuangan Jendral Achmad Yani.
                    </p>
                </h4>
            </div>
            <div class="w-full lg:w-1/3 lg:pl-20">

                <h3 class="mb-4 text-2xl font-semibold text-primary lg:font-bold">Misi BEM UNJAYA :</h3>
                <p class="mb-6 text-base text-justify font-medium text-slate-600">
                    1. Mewujudkan aspirasi mahasiswa sebagai mediator dalam penyelarasan arah gerak lembaga
                    mahasiswa internal kampus dan tercapainya fungsi pelayanan BEM secara optimal
                    <br>2. Memotivasi dan membanngun SDM mahasiswa agar tumbuhnya produktifitas yang berdaya saing
                    tinggi
                    <br>3. Memfasilitasi dan membangun minat dan bakat mahasiswa untuk terciptanya prestasi di
                    internal
                    dan eksternal kampus
                    <br>4. Membangun pergerakan mahasiswa unjaya dengan bersikap proaktif yang luas dan tangkap
                    dalam
                    pengembangan pergerakan digital
                    <br>5. Menciptakan aktivitas pengabdian masyarakat yang berdampak nyataterhadap pemberdayaan
                    masyarakat dan lingkungan hidup
                    <br>6. Mewujudkan BEM Unjaya yang bersinergi, berkualitas dengan menjunjung nilai kejujuran dan
                    komitmen dalam mengemban tugas
                </p>

                <hr style="height: 2px; border-width: 0; color: gray; background-color: gray" />
                <div class="flex items-center">
                    <!-- youtube -->
                    <a href="https://www.youtube.com/channel/UCHNMzwdo1gObmOQIF0h1VGA?app=desktop" target="_blank"
                        class="text-red-700 mr-3 flex h-9 w-9 items-center justify-center rounded-full hover:bg-primary hover:text-white">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>YouTube</title>
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>

                    <!-- instagram -->
                    <a href="https://www.instagram.com/bemunjaya/" target="_blank"
                        class="mr-3 flex h-9 w-9 items-center justify-center rounded-full text-pink-600 hover:bg-primary hover:text-white">
                        <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Calon Section Start -->
<section id="calon" class="bg-slate-100 pt-36 pb-32 dark:bg-slate-800">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w xl mx-auto mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white">Kandidat</h2>
                <p class="text-md font-medium text-slate-700 dark:text-slate-400">Berikut ini adalah kandidat Presiden
                    dan Wakil Presiden BEM UNJAYA 2023</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-slate-900">
                    <img src="dist/img/kd1.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
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
                        <a href="information.php" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark">
                    <img src="dist/img/kd2.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
                    <div class="py-8 px-6">

                        <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                            <a href="information.php">Kabinet Cakra Restorasi</a>
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
                        <a href="information.php" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-dark">
                    <img src="dist/img/kd3.jpeg?<?php echo time(); ?>" alt="Programing" class="w-full" />
                    <div class="py-8 px-6">

                        <h3 class="mb-3 block text-xl font-semibold  hover:text-sky-500 text-lime-500">
                            <a href="information.php">Kabinet Gema Naraksi</a>
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
                        <a href="information.php" class=" dont-medium hover:bg-amber-600 rounded-lg bg-primary py-2 px-4 text-sm text-white
                            hover:opacity-80">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Calon Section end -->
<!-- Footer Start -->
<footer class="bg-dark pt-10 pb-10">
    <div class="container">
        <p class="text-center text-sm font-medium text-slate-500">
            Designed by
            <a href="https://wa.me/qr/UQGA2UZVEVUQJ1"> <span class="font-bold text-lime-700">DAAW</span></a>, with
            use <span class="font-bold text-primary">Tailwind CSS</span>
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