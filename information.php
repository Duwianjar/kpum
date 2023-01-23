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
    <title>Informasi Paslon</title>
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
<!-- About Section Start -->
<section id="about" class="pt-36 pb-32  dark:bg-dark">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="mb-10 w-full lg:pl-20 lg:pr-20">
                <h4 class="mb-3 text-2xl font-bold uppercase text-primary">
                    <h3 class="mb-4 text-2xl font-semibold  text-dark dark:text-white lg:font-bold">
                        PASLON 1
                    </h3>
                    <h3 class="mb-4 text-xl text-justify font-semibold text-dark dark:text-white lg:font-bold">
                        Nama Kabinet: Gardha Eskalasi
                    </h3>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Visi Gardha Eskalasi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        Mewujudkan BEM UNJAYA sebagai fungsi eksekutif mahasiswa yang responsif dan inovatif
                        dalam membangun pergerakan kolaboratif yang peduli terhadap problematika mahasiswa demi
                        terciptanya kebermanfaatan, dan menjalankan nilai tridharma perguruan tinggi.
                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Misi Gardha Eskalasi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        1.Membangun Badan Eksekutif Mahasiswa yang lebih solid dan kontributif dalam
                        menampung seluruh aspirasi mahasiswa Unjaya.<br>
                        2.Mewujudkan korelasi yang baik antara internal dan eksternal Kampus Unjaya.<br>
                        3.Meningkatkan kepekaan dan partisipasi mahasiswa dalam mengikuti berbagai bidang
                        kegiatan guna mewujudkan mahasiswa yang berkarakter.<br>
                        4.Memaksimalkan aksi nyata bem unjaya dalam memberi dukungan kepada mahasiswa
                        terhadap minat, bakat dan potensi yang dimiliki setiap mahasiswa.<br>
                        5.Tercapainya ruang gerak mahasiswa yang peduli terhadap masyarakat sebagai bentuk
                        perwujudan nilai kejuangan jenderal Achmad Yani dan pemenuhan tridharma perguruan
                        tinggi.<br>
                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Program Kerja Gardha Eskalasi
                        :</h3>

                    <ul class="mb-6 text-base ml-5 font-medium  text-slate-600">
                        1. Kemenkoan Lingkungan dan
                        Masyarakat.<br>
                        <li class="ml-7">
                            a. Lingkungan Hidup.
                            <ul class="ml-7">
                                1) BEM Earth Clean.
                            </ul>
                        </li>
                        <li class="ml-7">
                            b. Sosial Masyarakat.
                            <ul class="ml-7">
                                1) GEMUDI (Gerakan
                                Mahasiswa Unjaya Mengabdi).
                            </ul>
                        </li>
                        <br>
                        2. Kemenkoan Pemberdayaan Perempuan dan
                        Kesehatan Mental
                        <ul class="ml-7">
                            a. Pergerakan anti kekerasan seksual.
                            <li class="ml-7">
                                1) Beautyfull Care
                            </li>
                        </ul>
                        <ul class="ml-7">
                            b. Kesehatan mental
                            <li class="ml-7">
                                1) MHC (Mental Health Community)
                            </li>
                        </ul>
                        <br>
                        3. Kemenkoan Publik Relasi dan Komunikasi (Dalam
                        Negeri dan Luar Negeri)
                        <ul class="ml-7">
                            a. DAGRI
                            <li class="ml-7">
                                1) Unjaya Competition
                            </li>
                            <li class="ml-7">
                                2) Pemira
                            </li>
                        </ul>
                        <ul class="ml-7">
                            b. LUGRI
                            <li class="ml-7">
                                1) Kunjungan Kerja
                            </li>
                        </ul>
                        <ul class="ml-7">
                            c. KOMINFO
                            <li class="ml-7">
                                1) KOMANDO (Kompetisi Essay dan Video)
                            </li>
                        </ul><br>
                        4. Kemenkoan Advokasi Sosial dan Politik
                        <ul class="ml-7">
                            a. Kajian Strategi
                            <li class="ml-7">
                                1) Sekolah politik Unjaya
                            </li>
                        </ul>
                        <ul class="ml-7">
                            b. Aksi Propaganda
                            <li class="ml-7">
                                1) Safari Politik
                            </li>
                        </ul><br>
                        5. Kemenkoan Pengembangan Sumber Daya Manusia (PSDM) -> LKMM (
                        <ul class="ml-7">
                            a. Isu Pendidikan
                            <li class="ml-7">
                                1 ) Talk Show Pendidikan
                            </li>
                        </ul>
                        <ul class="ml-7">
                            b. Ekonomi Kreatif
                            <li class="ml-7">
                                1) Sponsorship Class
                            </li>
                        </ul>
                    </ul>
                    <hr style="height: 2px; border-width: 0; color: gray; background-color: gray" />
                    <h3 id="about2" class="mb-4 text-2xl font-semibold pt-5 text-dark dark:text-white lg:font-bold">
                        PASLON 2
                    </h3>
                    <h3 class="mb-4 text-xl text-justify font-semibold text-dark dark:text-white lg:font-bold">
                        Nama Kabinet: Cakra Restorasi
                    </h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        “Cakra Restorasi” yang berarti,Kata cakra sendiri berasal dari Bahasa Sansekerta yang berarti
                        roda yang berputar, sedangkan Restorasi berarti pengembalian atau pemulihan sesuatu kepada
                        bentuk dan kondisi yang seharusnya.<br><br>
                        Cakra Restorasi adalah poros pergerakan yang terus berputar bagaikan roda untuk memperjuangkan
                        perubahan kearah yang lebih baik. Cakra Restorasi mempunyai makna yaitu selama menjalani amanah
                        dalam organisasi yang akan selalu berputar secara dinamis seperti roda gerigi, agar nantinya
                        tidak merasa tinggi ketika mendapat pujian dan tidak merasa jatuh ketika mendapatkan caci makian
                        dalam membawa tujuan perubahan demi kebaikan dan kepentingan bersama.

                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Visi Cakra Restorasi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        Revitalisasi BEM sebagai pionir dalam pergerakan, untuk mewujudkan mahasiswa yang berkompeten
                        dan memiliki integritas terhadap problematika yang terjadi di tengah masyarakat, serta
                        mewujudkan BEM yang independen, berkualitas, aspiratif, dan progresif.
                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Misi Cakra Restorasi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        1. Mengimplementasikan nilai-nilai, prinsip, dan semangat kejuangan Jenderal Achmad Yani di
                        Universitas Jenderal Achmad Yani Yogyakarta.<br>
                        2. Menjadi wadah aspirasi, kordinasi dan komunikasi antar seluruh elemen di Universitas Jenderal
                        Achmad Yani Yogyakarta.<br>
                        3. Menjadi wadah untuk memperjuangkan kepentingan maupun hak-hak mahasiswa/i Universitas
                        Jenderal Achmad Yani Yogyakarta.<br>
                        4. Menjadi wadah pengembangan Minat dan bakat serta moral mahasiswa/i di Universitas Jenderal
                        Achmad Yani Yogyakarta.<br>
                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Program Kerja Cakra Restorasi
                        :</h3>

                    <ul class="mb-6 text-base  font-medium ml-5  text-slate-600">
                        1. Road to Ormawa Salah satu usaha untuk mengoptimalkan sinergitas antara BEM UNJAYA dengan
                        mahasiswa yang ada di Unjaya dengan diskusi, sharing, dan pelayanan guna mempererat hubungan
                        dengan ormawa.
                        <li class="ml-5">
                            • BEM SILATURAHMI
                        </li>
                        <li class="ml-5">
                            • INFAC (Intens With Faculty)
                        </li>
                        <li class="ml-5">
                            • KANAL (Kajian Internal)
                        </li>
                        <li class="ml-5">
                            • MACAN UNJAYA (Rumah Curhatan Mahasiswa UNJAYA)
                        </li>
                        <br>
                        2. REACT ( Reaction and Action )
                        <ul class="ml-5">
                            • Ngobral Ide Gerak ( Ngobrol perihal isu dan eskalasi gerakan) kajian isu
                            berbentuk diskusi maupun lainnya dengan topik pembahasan yg telah
                            ditentukan berdasarkan isu nasional dan kedaerahan, internal serta
                            eksternal Kampus.
                        </ul>
                        <ul class="ml-5">
                            • KANTIN KITA (Kajian Rutin Sekilas KITABerita) kajian ini
                            berbentuk diskusi baik lainnyasecara langsung maupun online yang disampaikan oleh
                            pimpinan, menteri maupun staff BEM.

                        </ul>
                        <br>
                        3. Sidha Karya UNJAYA Merupakan agenda yang bertujuan
                        untukmempererat hubungan BEM UNJAYA dengan ormawa dan
                        mahasiswa. Yang akan di isi oleh beberapa rangkain kegiatan baik
                        kesenian, olahraga, dll.
                        <ul class="ml-5">
                            • Liga Ormawa<br>
                            • Unjaya Award<br>
                            • Panggung Ormawa
                        </ul><br>
                        4. SMS (School Movement Skill)
                        <ul class="ml-5">
                            SMS dibentuk menjadi beberapa kelas yang bersi materi pelatihan skill
                            kemahasiswaan sekaligus menjadi wadah untuk pelatihan pembahasan
                            tentang politik, Pendidikan,isu internal
                            maupun eksternal kampus dll.
                        </ul>
                        <ul class="ml-5">
                            • Sekolah Kepemudaan.<br>
                            • Sekolah Kesekbenan.<br>
                            • Sekolah Media Kabinet.<br>
                            • Sekolah Advokasi.<br>
                        </ul><br>
                    </ul>
                    <hr style="height: 2px; border-width: 0; color: gray; background-color: gray" />
                    <h3 id="about3"class="mb-4 text-2xl font-semibold pt-5 text-dark dark:text-white lg:font-bold">
                        PASLON 3
                    </h3>
                    <h3 class="mb-4 text-xl text-justify font-semibold text-dark dark:text-white lg:font-bold">
                        Nama Kabinet: Gema Naraksi
                    </h3>

                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Visi Gema Naraksi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        Mewujudkan BEM UNJAYA sebagai organisasi yang kokoh di dalamnya dan sebagai fasilitator yang
                        peka terhadap suara mahasiswa serta meningkatkan citra BEM UNJAYA yang baik dilingkup internal
                        maupun eksternal kampus.
                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Misi Gema Naraksi :</h3>
                    <p class="mb-6 text-base font-medium text-justify text-slate-600">
                        1. Menumbuhkan sikap profesionalitas atas dasar kekeluargaan.<br>
                        2. Menghidupkan aspirasi mahasiswa atas hak bersuara serta berperan langsung dalam mengatasi
                        masalah dan isu-isu di internal maupun eksternal kampus.<br>
                        3. Memfasilitasi potensi dalam mengembangkan minat dan bakat mahasiswa Unjaya.<br>
                        4. Mewadahi mahasiswa untuk berpartisipasi dalam pengabdian di lingkungan masyarakat.<br>
                        5. Mempererat relasi antar organisasi di internal maupun eksternal kampus.<br>


                    </p>
                    <h3 class="mb-4 mt-4 text-2xl font-semibold text-primary lg:font-bold">Program Kerja Gema Naraksi
                        :</h3>

                    <ul class="mb-6 text-base font-medium  text-slate-600">
                        1. LDK (latihan dasar kepemimpinan).<br>
                        2. KOMANDO (kompetisi esai dan video).<br>
                        3. Anniversary BEM UNJAYA.<br>
                        4. Mubes (musyawarah besar).<br>
                        5. SETIA (Seminar Ekonomi & Teknologi Internasional).<br>
                        6. Mading Lomba & Beasiswa.<br>
                        7. Ekspedisi Sapa Jogja.<br>
                        8. FIESTA (Festival Esai dan Cipta Karya).<br>
                        9. Sajisu (Saatnya mengkaji isu).<br>
                        10. Bisik Gaya (Bincang Asik Keluarga Unjaya).<br>
                        11. Stuban (Study Banding).<br>
                        12. Official Merchandise.<br>
                        13. Yuk Sedekah.<br>
                        14. Road trip with BEM.<br>
                        15. Aktualisasi Peran Perempuan.<br>
                        16. Bukan Pak Ogah.<br>



                    </ul>
                </h4>
            </div>

        </div>
    </div>
    </div>
</section>
<!-- About Section End -->

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
<a href="#about"
    class="fixed bottom-4 right-4 z-[9999] hidden h-11 w-11 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
    id="to-top">
    <span class="mt-1 block h-3 w-3 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End-->

<script src="dist/js/script.js"></script>
</body>

</html>