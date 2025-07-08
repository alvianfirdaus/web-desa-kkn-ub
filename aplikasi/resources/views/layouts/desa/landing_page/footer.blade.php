<!-- Footer -->
<footer id="footer" class="footer dark-background py-4">
    <div class="container-fluid px-5">
        <div class="row g-5"> <!-- Gunakan g-5 untuk memberi jarak antar kolom -->

            <!-- Logo Desa -->
            <div class="col-md-2 text-start">
                {{-- <img src="{{ Auth::user()->desa->logo_desa ? asset('storage/' . Auth::user()->desa->logo_desa) : asset('storage/default_image/default.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;"> --}}
                <img src="{{ asset('asset_halaman_desa/img/malangkab.png') }}" alt="Logo Desa" class="img-fluid" style="max-height: 80px;">
            </div>

            <!-- Nama Desa & Moto -->
            <div class="col-md-3 text-start">
                <h5 class="text-white mb-1">Dusun Bumirejo</h5>
                <p class="text-white-50 mb-0">Desa Kebobang | Kec Wonosari | Kab Malang</p>
            </div>

            <div class="col-md-3 text-start">
                <h5 class="text-white">PKM FH UB 2025</h5>
                <p class="text-white-50">Pengembangan web E-gov Dusun Bumirejo ini merupakan Program Pengabdian Kepada Masyarakat Fakultas Hukum Universitas Brawijaya 2025</p>
            </div>

            <!-- Kontak Desa -->
            <div class="col-md-2 text-start">
                <h5 class="text-white">Kontak</h5>
                <ul class="list-unstyled text-white-50">
                    <li>📧 Bantuan Hukum</li>
                    <li>📞 +62 333 333 333</li>
                    <br>
                    <li>📧 Pengaduan Masyarakat</li>
                    <li>📞 +62 333 333 333</li>
                </ul>
            </div>

            <!-- Layanan -->
            <div class="col-md-2 text-start">
                <h5 class="text-white">Layanan</h5>
                <ul class="list-unstyled text-white-50">
                    <li>✔ Bantuan Hukum</li>
                    <li>✔ E-Book Hukum</li>
                    <li>✔ Pengaduan Masyarakat</li>
                    <li>✔ Persuratan</li>
                </ul>
            </div>

            

            <!-- Layanan -->
            

        </div>

        <!-- Bagian Bawah Footer -->
        <div class="text-center text-white-50 mt-4">
            <p>Copyright &copy; <strong>Kelompok 20 PKM FH UB 2025</strong> All Rights Reserved</p>
            
        </div>
    </div>
</footer>
<!-- End Footer -->
