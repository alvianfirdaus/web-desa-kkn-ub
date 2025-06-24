<!-- Footer -->
<footer id="footer" class="footer dark-background py-4">
    <div class="container-fluid px-5">
        <div class="row g-5"> <!-- Gunakan g-5 untuk memberi jarak antar kolom -->

            <!-- Logo Desa -->
            <div class="col-md-2 text-start">
                {{-- <img src="{{ Auth::user()->desa->logo_desa ? asset('storage/' . Auth::user()->desa->logo_desa) : asset('storage/default_image/default.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;"> --}}
                <img src="{{ asset('asset_halaman_desa/img/image 1.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;">
            </div>

            <!-- Nama Desa & Moto -->
            <div class="col-md-3 text-start">
                {{-- <h5 class="text-white mb-1">Pemerintahan Desa {{ Auth::user()->desa->nama_desa ?? '' }}</h5> --}}
                <h5 class="text-white mb-1">Pemerintahan Desa Contoh</h5>
                <p class="text-white-50 mb-0">Membangun desa yang maju dan transparan.</p>
            </div>

            <!-- Alamat Desa -->
            <div class="col-md-3 text-start">
                <h5 class="text-white">Alamat</h5>
                <p class="text-white-50">Jl. Raya Desa No. 123, Kecamatan Contoh, Kabupaten Banyuwangi, Jawa Timur</p>
                {{-- <p class="text-white-50">{{ Auth::user()->desa->alamat_desa ?? '' }}</p> --}}
            </div>

            <!-- Kontak Desa -->
            <div class="col-md-2 text-start">
                <h5 class="text-white">Kontak</h5>
                {{-- <ul class="list-unstyled text-white-50">                    
                    <li>📞 {{ Auth::user()->desa->no_hp ?? '' }}</li>                    
                </ul> --}}
                <ul class="list-unstyled text-white-50">
                    <li>📧 Pelayanan Surat</li>
                    <li>📞 +62 333 333 333</li>
                </ul>
            </div>

            <!-- Layanan -->
            <div class="col-md-2 text-start">
                <h5 class="text-white">Layanan</h5>
                <ul class="list-unstyled text-white-50">
                    <li>✔ Pelayanan Surat</li>
                    <li>✔ Informasi APB Desa</li>
                    <li>✔ Pengaduan Masyarakat</li>
                    <li>✔ Program Bantuan</li>
                </ul>
            </div>

        </div>

        <!-- Bagian Bawah Footer -->
        <div class="text-center text-white-50 mt-4">
            <p>Copyright &copy; <strong>CV Eksa Reka Cipta.</strong> All Rights Reserved</p>
            <p>Designed by <a href="https://bootstrapmade.com/" class="text-white">CV Eksa Reka Cipta.</a></p>
        </div>
    </div>
</footer>
<!-- End Footer -->
