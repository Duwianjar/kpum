<?php 
    session_start();
    $koneksi = new mysqli("localhost","bemunjay_pemilu","pemilu_2023*","bemunjay_pemilu");
      
    if (isset($_SESSION['admin']))   
        {
             $akun='admin';      
        }
    else
        {
            echo "<script>alert('Anda Belum Login [Silahakan Login Dulu ]')</script>";
            echo "<script>location='loginadmin.php'</script>";
        }
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Suara</title>
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
                                <a href="logoutadmin.php"
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
                    Hasil Pemilihan
                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-2xl"> PRESIDEN & WAKIL
                        PRESIDEN</span>
                    <span class="mt-1 block text-2xl font-bold text-primary lg:text-4xl"> BADAN EKSEKUTIF</span>
                    <span class="mt-1 block text-2xl font-bold text-primary lg:text-5xl"> MAHASISWA</span>
                    <span class="mt-1 block text-2xl font-bold text-lime-600 lg:text-2xl"> Universitas Jenderal
                        Achmad Yani Yogyakarta
                        <span class="text-dark dark:text-slate-200">2023</span></span>
                </h1>

            </div>
            <div class="w-full self-end px-4 pt-40 md:w-1/2 md:pt-0 lg:mt-10 lg:w-1/4">
                <div class="relative -mt-10 lg:right-0 ">
                    <div class="shadow-lg py-3 dark:shadow-slate-800 rounded-lg overflow-hidden">
                        <div class="py-3 px-5  bg-gray-50 text-xl dark:text-white dark:bg-dark font-bold ">Hasil Suara
                        </div>
                        <canvas class="p-0" id="chartPie"></canvas>
                    </div>

                    <!-- Required chart.js -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <?php 
                    $ambil1=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 1 Roni Axesan Saputra - Hukum (S1) 2021 dan Restika Mithari - Farmasi (S1) 2020'");
                    $ambil2=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 2 Alfin Thunder Masobi - Teknologi Informasi (S1) 2020 dan Anisa Fitriani - Manajemen (S1) 2020'");
                    $ambil3=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 3 Joni Indra Pratama - Informatika (S1) 2021 dan Khusnul Fera Triyansyah - Keperawatan (S1) 2021'");
                    $nomer1=0;
                    $nomer2=0;
                    $nomer3=0;
                    while($pecah1 = $ambil1->fetch_assoc()) {
                        $nomer1=$nomer1+1;
                    }
                    while($pecah2 = $ambil2->fetch_assoc()) {
                        $nomer2=$nomer2+1;
                    }
                    while($pecah3 = $ambil3->fetch_assoc()) {
                        $nomer3=$nomer3+1;
                    }
                    ?>

                    <!-- Chart pie -->
                    <script>
                    var satu = <?php echo $nomer1 ?>;
                    var dua = <?php echo $nomer2 ?>;
                    var tiga = <?php echo $nomer3 ?>;
                    const dataPie = {
                        labels: ["Kabinet Gardha Eskalasi", "Kabinet Cakra Restorasi", "Kabinet Gema Naraksi"],
                        datasets: [{
                            label: "My First Dataset",
                            data: [satu, dua, tiga],
                            backgroundColor: [

                                "rgb(255, 0, 0)",
                                "rgb(0, 350, 0)",
                                "rgb(0, 0, 341)",

                            ],
                            hoverOffset: 4,
                        }, ],
                    };

                    const configPie = {
                        type: "pie",
                        data: dataPie,
                        options: {},
                    };

                    var chartBar = new Chart(document.getElementById("chartPie"), configPie);
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section Start -->
<section id="about" class=" pb-32 dark:bg-dark">
    <div class="container">
        <div class="flex flex-wrap">

            <div class="shadow-lg mx-auto  lg:mx-5 lg:w-1/4 lg:ml-10 mt-10 lg:mt-20 rounded-lg overflow-hidden">
                <div class="py-3 px-5 bg-gray-50 text-abang dark:bg-dark font-bold">
                    Kabinet Gardha Eskalasi
                </div>
                <canvas class="p-0" id="chart"></canvas>
            </div>

            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <?php  
            $jupuk=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 1 Roni Axesan Saputra - Hukum (S1) 2021 dan Restika Mithari - Farmasi (S1) 2020' AND fakultas_pemilih='FTTI'");
            $satuftti=0;
            while($pecahsatuftti = $jupuk->fetch_assoc()) {
                $satuftti=$satuftti+1;
            }

            $jupukfkes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 1 Roni Axesan Saputra - Hukum (S1) 2021 dan Restika Mithari - Farmasi (S1) 2020' AND fakultas_pemilih='FKES'");
            $satufkes=0;
            while($pecahsatufkes = $jupukfkes->fetch_assoc()) {
                $satufkes=$satufkes+1;
            }

            $jupukfes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 1 Roni Axesan Saputra - Hukum (S1) 2021 dan Restika Mithari - Farmasi (S1) 2020' AND fakultas_pemilih='FES'");
            $satufes=0;
            while($pecahsatufes = $jupukfes->fetch_assoc()) {
                $satufes=$satufes+1;
            }
            
            ?>


            <!-- Chart bar -->
            <script>
            var satuftti = <?php echo $satuftti ?>;
            var satufkes = <?php echo $satufkes ?>;
            var satufes = <?php echo $satufes ?>;

            const labels = [
                "FTTI",
                "FKES",
                "FES",
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Show',
                    data: [satuftti, satufkes, satufes],
                    backgroundColor: [
                        'rgba(5, 5, 350, 0.2)',
                        'rgba(5, 450, 5, 0.2)',
                        'rgba(255, 5, 5, 0.2)',
                    ],
                    borderColor: [
                        'rgb(5, 5, 350)',
                        'rgb(5, 450, 5)',
                        'rgb(255, 5, 5)',
                    ],
                    borderWidth: 1
                }]
            };


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var chart = new Chart(
                document.getElementById("chart"),
                config
            );
            </script>
            <div class="shadow-lg  lg:mx-5 lg:w-1/4 mt-10 lg:mt-20 mx-auto  rounded-lg overflow-hidden">
                <div class="py-3  px-5  bg-gray-50 text-ijo dark:bg-dark font-bold ">Kabinet Cakra Restorasi</div>
                <canvas class="p-0" id="Bar"></canvas>
            </div>

            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <?php 
            
            $ambilftti=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 2 Alfin Thunder Masobi - Teknologi Informasi (S1) 2020 dan Anisa Fitriani - Manajemen (S1) 2020' AND fakultas_pemilih='FTTI'");
            $duaftti=0;
            while($pecahduaftti = $ambilftti->fetch_assoc()) {
            $duaftti=$duaftti+1;
            }

            $ambilfkes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 2 Alfin Thunder Masobi - Teknologi Informasi (S1) 2020 dan Anisa Fitriani - Manajemen (S1) 2020' AND fakultas_pemilih='FKES'");
            $duafkes=0;
            while($pecahduafkes = $ambilfkes->fetch_assoc()) {
            $duafkes=$duafkes+1;
            }

            $ambilfes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 2 Alfin Thunder Masobi - Teknologi Informasi (S1) 2020 dan Anisa Fitriani - Manajemen (S1) 2020' AND fakultas_pemilih='FES'");
            $duafes=0;
            while($pecahduafes = $ambilfes->fetch_assoc()) {
            $duafes=$duafes+1;
            }
            

            ?>

            <!-- Chart bar -->
            <script>
            var duaftti = <?php echo $duaftti ?>;
            var duafkes = <?php echo $duafkes ?>;
            var duafes = <?php echo $duafes ?>;
            const labelsChart = [
                "FTTI",
                "FKES",
                "FES",
            ];
            const dataChart = {
                labels: labelsChart,

                datasets: [{
                    label: 'Show',
                    data: [duaftti, duafkes, duafes],
                    backgroundColor: [
                        'rgba(5, 5, 350, 0.2)',
                        'rgba(5, 450, 5, 0.2)',
                        'rgba(255, 5, 5, 0.2)',
                    ],
                    borderColor: [
                        'rgb(5, 5, 350)',
                        'rgb(5, 450, 5)',
                        'rgb(255, 5, 5)',
                    ],
                    borderWidth: 1
                }]
            };

            const configChart = {
                type: "bar",
                data: dataChart,
                options: {},
            };

            var Bar = new Chart(
                document.getElementById("Bar"),
                configChart
            );
            </script>

            <div class="shadow-lg  lg:mx-5 lg:w-1/4 mt-10 lg:mt-20 mx-auto  rounded-lg overflow-hidden">
                <div class="py-3  px-5 bg-gray-50 text-biru font-bold dark:bg-dark">Kabinet Gema Naraksi</div>
                <canvas class="p-0" id="Barc"></canvas>
            </div>

            <!-- Required chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <?php 
            
            $pickftti=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 3 Joni Indra Pratama - Informatika (S1) 2021 dan Khusnul Fera Triyansyah - Keperawatan (S1) 2021' AND fakultas_pemilih='FTTI'");
            $tigaftti=0;
            while($pecahtigaftti = $pickftti->fetch_assoc()) {
            $tigaftti=$tigaftti+1;
            }
            
            $pickfkes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 3 Joni Indra Pratama - Informatika (S1) 2021 dan Khusnul Fera Triyansyah - Keperawatan (S1) 2021' AND fakultas_pemilih='FKES'");
            $tigafkes=0;
            while($pecahtigafkes = $pickfkes->fetch_assoc()) {
            $tigafkes=$tigafkes+1;
            }
            
            $pickfes=$koneksi->query("SELECT * FROM pemilihan WHERE pilihan='No. 3 Joni Indra Pratama - Informatika (S1) 2021 dan Khusnul Fera Triyansyah - Keperawatan (S1) 2021' AND fakultas_pemilih='FES'");
            $tigafes=0;
            while($pecahtigafes = $pickfes->fetch_assoc()) {
            $tigafes=$tigafes+1;
            }

            ?>

            <!-- Chart bar -->
            <script>
            var tigaftti = <?php echo $tigaftti ?>;
            var tigafkes = <?php echo $tigafkes ?>;
            var tigafes = <?php echo $tigafes ?>;
            const labelsChartc = [
                "FTTI",
                "FKES",
                "FES",
            ];
            const dataChartc = {
                labels: labelsChartc,

                datasets: [{
                    label: 'Show',
                    data: [tigaftti, tigafkes, tigafes],
                    backgroundColor: [
                        'rgba(5, 5, 350, 0.2)',
                        'rgba(5, 450, 5, 0.2)',
                        'rgba(255, 5, 5, 0.2)',
                    ],
                    borderColor: [
                        'rgb(5, 5, 350)',
                        'rgb(5, 450, 5)',
                        'rgb(255, 5, 5)',
                    ],
                    borderWidth: 1
                }]
            };

            const configChartc = {
                type: "bar",
                data: dataChartc,
                options: {},
            };

            var Barc = new Chart(
                document.getElementById("Barc"),
                configChartc
            );
            </script>





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