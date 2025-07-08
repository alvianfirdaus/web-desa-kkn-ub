@extends('layouts.desa.landing_page.app')

@section('title', 'Web Resmi Dusun Bumirejo | Desa Kebobang | Kab Malang')

@section('content')

    <main class="main">

        <!-- Hero Section -->

        <!-- Features Section -->
        <section id="about" class="features section">
            <div class="container">
                <ul class="nav nav-tabs row d-flex justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item col-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-journal-text"></i>
                            <h4 class="d-none d-lg-block">Sejarah Dusun Bumirejo Desa Kebobang </h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-bag"></i>
                            <h4 class="d-none d-lg-block">UMKM & Program Kerja</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi-person-fill"></i>
                            <h4 class="d-none d-lg-block">Visi Dan Misi Kepala Dusun Bumirejo</h4>
                        </a>
                    </li>
                </ul>
                <!-- End Tab Nav -->

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Sejarah dusun Bumirejo Desa Kebobang</h3>
                                <p class="fst-italic"></p>
                                <p>Desa Kebobang terdiri dari empat dusun, yakni Dusun Kebobang, Dusun Tumpangrejo, Dusun Lopawon, dan Dusun Bumirejo. Masing-masing dusun tersebut ada seseorang yang melakukan babat alas. Di Dusun Kebobang ada Mbah Singo Suto dan Mbah Iro Ndaru, di Dusun Tumpangrejo ada Mbah Karsinah dan Eyang Singo Drono, di Dusun Lopawon ada Mbah Sentonorejo, dan di Dusun Bumirejo ada Mbah Tugudrono. Mereka semua adalah prajurit-prajurit Pangeran Diponegoro yang hijrah dari tanah Jogjakarta.</p>
                                <p>Singkat cerita, setelah peperangan besar antara Pangeran Diponegoro melawan penjajah Belanda, terjadi migrasi besar-besaran yang dilakukan para pengikutnya. Salah satu kelompok yang dipimpin Kyai Zakaria bersama beberapa pengikutnya berjumlah kurang lebih 40 orang melakukan perjalanan ke timur. Mereka melewati jalur pantai selatan, dan singgah pertama kalinya di Kecamatan Kesamben, Kabupaten Blitar.</p>
                                <p>Dalam perjalanan ke arah timur inilah mereka akhirnya sampai di wilayah Wonosari sekarang yang dulunya masih berupa hutam belantara. Kelompok pengikut Pangeran Diponegoro itu pun lantas melakukan penebangan pohon. Ada beberapa yang menetap dengan mendirikan pemukiman, termasuk di wilayah Desa Kebobang.</p>
                                <p>Ketika melakukan penebangan hutan inilah, tiba-tiba muncul hewan kerbau (dalam Bahasa Jawa disebut Kebo). Uniknya, kerbau itu berwarna merah (dalam Bahasa Jawa disebut Abang). Kemudian, kelompok pembabat alas wilayah itu pun memberikan nama Desa Kebobang (yang berasal dari sebutan Kebo Abang atau Kerbau Merah).</p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('asset_halaman_desa/img/aset1.webp') }}" alt=""
                                    class="img-fluid" />

                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content Item -->
                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            
                            <!-- UMKM Section -->
                            <div class="col-lg-6">
                            <h3 class="mb-4">UMKM</h3>
                            <div class="row gy-4">
                                <div class="col-md-12">
                                <div class="card shadow-sm h-100">
                                    <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('asset_halaman_desa/img/aset4.webp') }}" class="img-fluid rounded-start" alt="UMKM 1">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Kopi</h5>
                                        <p class="card-text">UMKM ini mengelola hasil panen kopi dari kebun warga di wilayah Dusun Bumirejo. Proses pengolahan mencakup penjemuran biji, roasting (sangrai), hingga pengemasan. Produk unggulan meliputi kopi bubuk arabika medium roast dan green bean kopi robusta.</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12">
                                <div class="card shadow-sm h-100">
                                    <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('asset_halaman_desa/img/umkm2.jpg') }}" class="img-fluid rounded-start" alt="UMKM 2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Hasil pengelolaan sampah </h5>
                                        <p class="card-text">Mengelola sampah rumah tangga melalui sistem tabungan sampah. Hasil olahan berupa pupuk kompos, pot tanaman dari plastik daur ulang, dan tas anyaman dari plastik kresek.</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12">
                                <div class="card shadow-sm h-100">
                                    <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('asset_halaman_desa/img/umkm3.jpg') }}" class="img-fluid rounded-start" alt="UMKM 2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Kuliner </h5>
                                        <p class="card-text">Menjual jenang gendul, klepon, dan tiwul instan. Produk berbahan dasar alami dari singkong dan kelapa lokal. Tiwul instan kini telah dikemas dalam bentuk siap seduh, cocok untuk oleh-oleh.</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12">
                                <div class="card shadow-sm h-100">
                                    <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('asset_halaman_desa/img/umkm4.jpg') }}" class="img-fluid rounded-start" alt="UMKM 2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Ternak Kambing dan Sapi </h5>
                                        <p class="card-text">Bumirejo merupakan pusat pengelolaan kambing & Sapi yang diternak dan menghasilkan hewan ternak yang sehat dan super</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>

                        <!-- Program Kerja Section -->
                        <div class="col-lg-6">
                        <h3 class="mb-4">Program Kerja</h3>
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="card shadow-sm h-100">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('asset_halaman_desa/img/proker1.png') }}" class="img-fluid rounded-start" alt="Program 1">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Bank Sampah</h5>
                                                    <p class="card-text">Program bank sampah adalah sistem pengelolaan sampah kering yang bernilai ekonomis, seperti plastik, kertas, dan logam, dengan prinsip 3R (Reduce, Reuse, Recycle). Masyarakat dapat menabung sampah mereka di bank sampah dan mendapatkan imbalan, yang kemudian sampah tersebut didaur ulang. Ini adalah upaya untuk mengurangi volume sampah dari sumbernya dan meningkatkan kesadaran masyarakat tentang pengelolaan sampah.</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="card shadow-sm h-100">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('asset_halaman_desa/img/pkk.png') }}" class="img-fluid rounded-start" alt="Program 2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title">PKK</h5>
                                    <p class="card-text">PKK adalah singkatan dari Pemberdayaan dan Kesejahteraan Keluarga. Ini adalah gerakan masyarakat yang bertujuan untuk memberdayakan keluarga dan meningkatkan kesejahteraan mereka</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="card shadow-sm h-100">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('asset_halaman_desa/img/kartar.png') }}" class="img-fluid rounded-start" alt="Program 2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title">Karang Taruna</h5>
                                    <p class="card-text">Karang Taruna adalah organisasi sosial kemasyarakatan yang bertujuan untuk mengembangkan potensi generasi muda dan meningkatkan kesejahteraan sosial masyarakat, terutama di tingkat desa/kelurahan</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="card shadow-sm h-100">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('asset_halaman_desa/img/bersih.png') }}" class="img-fluid rounded-start" alt="Program 2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title">Bersih Dusun</h5>
                                    <p class="card-text">Bersih Desa di Bumirejo, yang juga dikenal sebagai tradisi sedekah bumi atau merdi desa, adalah upacara adat Jawa yang dilaksanakan setiap tahun untuk mengungkapkan rasa syukur atas hasil panen dan memohon keselamatan serta keberkahan bagi desa dan warganya</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="card shadow-sm h-100">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('asset_halaman_desa/img/dasa.png') }}" class="img-fluid rounded-start" alt="Program 2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title">Dasa Wisma (ibu-ibu arisan)</h5>
                                    <p class="card-text">Dasa wisma adalah kelompok ibu-ibu dari 10 kepala keluarga (KK) yang bertetangga, yang dibentuk untuk mempermudah pelaksanaan program-program PKK dan pemerintah di tingkat kelurahan atau desa.</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                        </div>
                        </div>

                    </div>
                    </div>

                    <!-- visi misi Section -->
                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3 class="mb-3">Visi dan Misi Kepala Dusun Bumirejo</h3>
                                <p class="fst-italic">Motto: <strong>"Maju Bersama dalam Gotong Royong, Sejahtera Bersama melalui UMKM Lokal"</strong></p>

                                <h5 class="mt-4">VISI</h5>
                                <p>
                                    Terwujudnya Dusun Bumirejo yang guyub, rukun, mandiri secara ekonomi, dan berdaya saing,
                                    dengan berlandaskan pada semangat gotong royong yang kokoh serta kesadaran kolektif akan pentingnya
                                    peran Usaha Mikro, Kecil, dan Menengah (UMKM) sebagai pilar kesejahteraan bersama.
                                </p>

                                <h5 class="mt-4">MISI</h5>
                                <ol class="ps-3">
                                    <li>
                                        <strong>Memperkuat Kebersamaan dan Gotong Royong:</strong>
                                        Menghidupkan kembali dan memperkuat semangat kebersamaan, kepedulian sosial, dan gotong royong dalam setiap kegiatan kemasyarakatan serta pembangunan fisik di lingkungan dusun.
                                    </li>
                                    <li class="mt-2">
                                        <strong>Mengembangkan Ekonomi Kreatif Berbasis UMKM:</strong>
                                        Mendorong, memfasilitasi, dan menciptakan ekosistem yang mendukung pertumbuhan Usaha Mikro, Kecil, dan Menengah (UMKM) agar menjadi sumber pendapatan utama dan kebanggaan dusun.
                                    </li>
                                    <li class="mt-2">
                                        <strong>Mewujudkan Tata Kelola yang Melayani dan Transparan:</strong>
                                        Menyelenggarakan pemerintahan dusun yang terbuka, jujur, adil, dan cepat tanggap terhadap aspirasi serta kebutuhan seluruh warga tanpa terkecuali.
                                    </li>
                                    <li class="mt-2">
                                        <strong>Meningkatkan Kualitas Lingkungan dan Infrastruktur:</strong>
                                        Memperbaiki dan merawat fasilitas umum serta menjaga kebersihan, keindahan, dan kelestarian lingkungan dusun secara partisipatif.
                                    </li>
                                </ol>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('asset_halaman_desa/img/kasun1.png') }}" alt="Kepala Dusun"
                                    class="img-fluid rounded" />
                            </div>
                        </div>
                    </div>
                    
                    

                    
                    
                </div>
            </div>
        </section>
        <!-- /Features Section -->

        <!-- Services Section -->

        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pamong Dusun</h2>
                <p style="font-size: 20px;">Data Pamon Dusun Bumirejo Desa Kebobang</p>
            </div>
            <!-- End Section Title -->
            <section id="recent-posts" class="recent-posts section">
                <div class="container">
                    <div class="scrolling-wrapper d-flex overflow-auto py-3" style="gap: 20px;">
                        @foreach($users as $user)
                        <div class="card" style="min-width: 250px; flex: 0 0 auto;" data-aos="fade-up">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->nama }}" class="img-fluid rounded" />
                                </div>
                                <p class="post-category">{{ $user->nama_lengkap }}</p>
                                <h2 class="title">
                                    <a href="#">{{ $user->pekerjaan ?? 'Jabatan Belum Diisi' }}</a>
                                </h2>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="container">
                <!-- Section Title -->
                <div class="container section-title" id="administrasi" data-aos="fade-up">
                    <h2>Administrasi Penduduk</h2>
                    <p style="font-size: 20px;">Data Penduduk Dusun Bumirejo, Desa Kebobang, Kab Malang </p>
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
                            <h3 class="count-number" data-target="{{ $adminduk->penduduk }}">0 Jiwa</h3>
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
                            <h3 class="count-number" data-target="{{ $adminduk->laki_laki }}">0 Jiwa</h3>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-text" style="color: #20c997"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Wanita</h3>
                            </a>
                            <h3 class="count-number" data-target="{{ $adminduk->laki_laki }}">0 Jiwa</h3>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
                <!-- <a href="#" class="btn-sotk">Lihat Lebih Detail</a> -->
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="apb-desa" class="features section" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('asset_halaman_desa/img/apbn.png') }}" alt="APB Desa"
                            class="img-fluid" />
                    </div>

                    <div class="col-lg-6">
                        <h3 class="fw-bold text-dark">APB DESA 2024</h3>
                        <p class="text-muted">Akses cepat dan transparan terhadap APB Desa serta proyek pembangunan</p>

                        <div class="bg-light p-3 rounded shadow-sm mb-3">
                            <p class="mb-1 text-secondary">Pendapatan Desa</p>
                           <h4 class="fw-bold text-dark" id="pendapatan">Rp{{ number_format($apbd->pendes ?? 0, 0, ',', '.') }}</h4>
                        </div>

                        <div class="bg-light p-3 rounded shadow-sm">
                            <p class="mb-1 text-secondary">Belanja Desa</p>
                            <h4 class="fw-bold text-dark" id="belanja">Rp{{ number_format($apbd->beldes ?? 0, 0, ',', '.') }}</h4>
                        </div>

                        <!-- <a href="#" class="btn-sotk">Lihat Lebih Detail</a> -->
                    </div>
                </div>
            </div>
        </section>


        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Galeri</h2>
    <p>Menyajikan Galeri Desa Bumirejo<br /></p>
  </div>

  <!-- Scroll Horizontal Container -->
  <div class="container px-0">
    <div class="horizontal-scroll-container">
      @foreach($blogs as $blog)
        <div class="scroll-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
          <article>
            <div class="post-img">
              <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog" class="img-fluid" />
            </div>
            <p class="post-category">Galeri</p>
            <h2 class="title">
              <a href="#">{{ $blog->judul ?? 'Judul tidak tersedia' }}</a>
            </h2>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

        <!-- /Recent Posts Section -->

        <!-- Contact Section -->
        
        <!-- /Contact Section -->
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('landing') }}";
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            @endif

            @if ($errors->any())
                let errorMessages = "";
                @foreach ($errors->all() as $error)
                    errorMessages += "{{ $error }}\n";
                @endforeach

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessages,
                    confirmButtonColor: '#d33'
                });
            @endif
        });
    </script>
    <style>
.horizontal-scroll-container {
  display: flex;
  overflow-x: auto;
  gap: 20px;
  scroll-snap-type: x mandatory;
  padding: 10px 0;
}

.scroll-card {
  scroll-snap-align: start;
  background: white;
  border-radius: 10px;
  min-width: 300px;
  max-width: 300px;
  flex-shrink: 0;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  padding: 15px;
}

.scrolling-wrapper {
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

.scrolling-wrapper .card {
    scroll-snap-align: start;
}
</style>

@endsection
