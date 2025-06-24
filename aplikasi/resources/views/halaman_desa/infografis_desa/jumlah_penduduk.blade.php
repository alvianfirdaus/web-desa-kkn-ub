@extends('layouts.desa.landing_page.app')

@section('title', 'Jumlah Penduduk')

@section('content')
<br>

<div class="container">
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" id="administrasi" data-aos="fade-up">
            <p style="font-size: 20px;">Jumlah penduduk berdasarkan gender</p>
        </div>
        <!-- End Section Title -->
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="bi bi-person-fill" style="color: #0dcaf0"></i>
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Penduduk</h3>
                    </a>
                    <h3>
                        @php
                        $total_warga = App\Models\User::where('level', 'warga')->count();
                        $total_petugas = App\Models\User::where('level', 'petugas')->count();
                        @endphp

                        {{ $total_warga + $total_petugas }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="bi bi-gender-male" style="color: #fd7e14"></i>
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Laki-Laki</h3>
                    </a>
                    <h3>
                        @php
                        $total_laki = App\Models\User::where('jenis_kelamin', 'laki-laki')->count();
                        @endphp
                        {{ $total_laki }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon">
                        <i class="bi bi-gender-female" style="color: #dc3545"></i>
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Wanita</h3>
                    </a>
                    <h3>
                        @php
                        $total_wanita = App\Models\User::where('jenis_kelamin', 'perempuan')->count();
                        @endphp
                        {{ $total_wanita }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

        </div>
    </section>
</div>

<div class="container section-title" data-aos="fade-up">
    <p style="font-size: 20px;">Distribusi Penduduk Berdasarkan Usia dan Jenis Kelamin</p>
</div>

<div class="container" data-aos="fade-up" data-aos-delay="200">
    <canvas id="piramidaPenduduk"></canvas>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('/data-piramida')
            .then(response => response.json())
            .then(data => {
                const labels = [
                    "0-4", "5-9", "10-14", "15-19", "20-24", "25-29", "30-34", "35-39",
                    "40-44", "45-49", "50-54", "55-59", "60-64", "65-69", "70-74", "75-79", "80-84", "85+"
                ];

                const dataLakiLaki = new Array(labels.length).fill(0);
                const dataPerempuan = new Array(labels.length).fill(0);

                data.forEach(item => {
                    const index = labels.indexOf(item.kelompok_usia);
                    if (index !== -1) {
                        if (item.jenis_kelamin === 'laki-laki') {
                            dataLakiLaki[index] = -item.total; // nilai negatif untuk kiri
                        } else {
                            dataPerempuan[index] = item.total;
                        }
                    }
                });

                const ctx = document.getElementById('piramidaPenduduk').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "Laki-Laki",
                            data: dataLakiLaki,
                            backgroundColor: "rgba(54, 162, 235, 0.5)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 1
                        }, {
                            label: "Perempuan",
                            data: dataPerempuan,
                            backgroundColor: "rgba(255, 99, 132, 0.5)",
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        maintainAspectRatio: false,
                        responsive: true,
                        scales: {
                            x: {
                                stacked: true,
                                ticks: {
                                    callback: function (value) {
                                        return Math.abs(value);
                                    }
                                }
                            },
                            y: {
                                stacked: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        }
                    }
                });
            });
    });
</script>

<div class="container" data-aos="fade-up">
    <div class="row">
        <div class="col-lg-12">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">

                        <div class="content">
                            <p>
                                Deskripsi Penjelasan
                            </p>

                            <p>
                                Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in
                                accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate
                                cupiditate.
                            </p>

                        </div><!-- End post content -->
                    </article>
                </div>
            </section><!-- /Blog Details Section -->
        </div>
    </div>
</div>

<div class="container section-title" data-aos="fade-up">
    <p style="font-size: 20px;">Distribusi Penduduk Berdasarkan Pendidikan</p>
</div>

<div class="container mt-5" data-aos="fade-up">
    <div class="row">
        <div class="col-md-12">
            <canvas id="chartStatistik" height="400"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get education data directly from database
        @php
            $educations = [
                'belum_sekolah' => 'Tidak/Belum Sekolah',
                'sd' => 'SD Sederajat',
                'sltp' => 'SLTP Sederajat',
                'slta' => 'SLTA Sederajat',
                'diploma' => 'Diploma',
                'sarjana' => 'Sarjana'
            ];
            
            $labels = [];
            $data = [];
            
            foreach ($educations as $key => $label) {
                $labels[] = $label;
                $data[] = \App\Models\User::where('pendidikan', $key)->count();
            }
        @endphp

        var ctx = document.getElementById('chartStatistik').getContext('2d');
        var chartStatistik = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: @json($data),
                    backgroundColor: [
                        '#168d06',
                        '#1aa30e',
                        '#1db912',
                        '#20cf16',
                        '#23e51a',
                        '#26fb1e'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            callback: function(value) {
                                return value;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw + ' orang';
                            }
                        }
                    }
                }
            }
        });
    });
</script>

<div class="container">
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" id="administrasi" data-aos="fade-up">
            <p style="font-size: 20px;">Jumlah penduduk berdasarkan pekerjaan</p>
        </div>
        <!-- End Section Title -->
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/petani.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Petani</h3>
                    </a>
                    <h3>
                        @php
                        $petani = App\Models\User::where('pekerjaan', 'petani')->count();
                        @endphp
                        {{ $petani }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/pedagang.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Pedagang</h3>
                    </a>
                    <h3>
                        @php
                        $pedagang = App\Models\User::where('pekerjaan', 'pedagang')->count();
                        @endphp
                        {{ $pedagang }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/guru.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Guru</h3>
                    </a>
                    <h3>
                        @php
                        $guru = App\Models\User::where('pekerjaan', 'guru')->count();
                        @endphp
                        {{ $guru }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/pns.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>PNS</h3>
                    </a>
                    <h3>
                        @php
                        $pns = App\Models\User::where('pekerjaan', 'pns')->count();
                        @endphp
                        {{ $pns }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/doctor.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Bidan/Dokter</h3>
                    </a>
                    <h3>
                        @php
                        $bidandokter = App\Models\User::where('pekerjaan', 'bidan/dokter')->count();
                        @endphp
                        {{ $bidandokter }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/angkutan umum.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Angkutan Umum</h3>
                    </a>
                    <h3>
                        @php
                        $angkutan_umum = App\Models\User::where('pekerjaan', 'angkutan_umum')->count();
                        @endphp
                        {{ $angkutan_umum }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/peternak.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Peternak</h3>
                    </a>
                    <h3>
                        @php
                        $peternak = App\Models\User::where('pekerjaan', 'peternak')->count();
                        @endphp
                        {{ $peternak }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/tukang bangunan.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Tukang Bangunan</h3>
                    </a>
                    <h3>
                        @php
                        $tukang_bangunan = App\Models\User::where('pekerjaan', 'tukang_bangunan')->count();
                        @endphp
                        {{ $tukang_bangunan }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/wiraswasta.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Wiraswasta</h3>
                    </a>
                    <h3>
                        @php
                        $wiraswasta = App\Models\User::where('pekerjaan', 'wiraswasta')->count();
                        @endphp
                        {{ $wiraswasta }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/buruh.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Buruh</h3>
                    </a>
                    <h3>
                        @php
                        $buruh = App\Models\User::where('pekerjaan', 'buruh')->count();
                        @endphp
                        {{ $buruh }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/pelajar.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Pelajar</h3>
                    </a>
                    <h3>
                        @php
                        $pelajar = App\Models\User::where('pekerjaan', 'pelajar')->count();
                        @endphp
                        {{ $pelajar }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/pekerjaan lainnya.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Lainnya</h3>
                    </a>
                    <h3>
                        @php
                        $lainnya = App\Models\User::where('pekerjaan', 'lainnya')->count();
                        @endphp
                        {{ $lainnya }} Jiwa
                    </h3>
                </div>
            </div>

        </div>
    </section>
</div>

<div class="container">
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" id="administrasi" data-aos="fade-up">
            <p style="font-size: 20px;">Jumlah penduduk berdasarkan perkawinan</p>
        </div>
        <!-- End Section Title -->
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/belum menikah.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Belum Menikah</h3>
                    </a>
                    <h3>
                        @php
                        $belum_menikah = App\Models\User::where('status_perkawinan', 'belum_menikah')->count();
                        @endphp
                        {{ $belum_menikah }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/wedding.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Menikah</h3>
                    </a>
                    <h3>
                        @php
                        $menikah = App\Models\User::where('status_perkawinan', 'menikah')->count();
                        @endphp
                        {{ $menikah }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/cerai hidup.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Cerai Hidup</h3>
                    </a>
                    <h3>
                        @php
                        $cerai_hidup = App\Models\User::where('status_perkawinan', 'cerai_hidup')->count();
                        @endphp
                        {{ $cerai_hidup }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/cerai mati.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Cerai Mati</h3>
                    </a>
                    <h3>
                        @php
                        $cerai_mati = App\Models\User::where('status_perkawinan', 'cerai_mati')->count();
                        @endphp
                        {{ $cerai_mati }} Jiwa
                    </h3>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="container">
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" id="administrasi" data-aos="fade-up">
            <p style="font-size: 20px;">Jumlah penduduk berdasarkan Agama</p>
        </div>
        <!-- End Section Title -->
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/islam.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Islam</h3>
                    </a>
                    <h3>
                        @php
                        $islam = App\Models\User::where('agama', 'islam')->count();
                        @endphp
                        {{ $islam }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/islam.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Kristen</h3>
                    </a>
                    <h3>
                        @php
                        $kristen = App\Models\User::where('agama', 'kristen')->count();
                        @endphp
                        {{ $kristen }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/hindu.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>hindu</h3>
                    </a>
                    <h3>
                        @php
                        $hindu = App\Models\User::where('agama', 'hindu')->count();
                        @endphp
                        {{ $hindu }} Jiwa
                    </h3>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/budha.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Budha</h3>
                    </a>
                    <h3>
                        @php
                        $budha = App\Models\User::where('agama', 'budha')->count();
                        @endphp
                        {{ $budha }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/konghuchu.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Konghuchu</h3>
                    </a>
                    <h3>
                        @php
                        $konghuchu = App\Models\User::where('agama', 'konghuchu')->count();
                        @endphp
                        {{ $konghuchu }} Jiwa
                    </h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="{{ asset('asset_halaman_desa/img/icon/agama lainnya.png') }}" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <a href="#" class="stretched-link">
                        <h3>Lainnya</h3>
                    </a>
                    <h3>
                        @php
                        $lainnya = App\Models\User::where('agama', 'lainnya')->count();
                        @endphp
                        {{ $lainnya }} Jiwa
                    </h3>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection