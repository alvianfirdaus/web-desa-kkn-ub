@extends('layouts.desa.landing_page.app')

@section('title', 'Penyuratan')

@section('content')
<!-- Hero Section -->

<section id="fitur" class="py-5">
    <div class="container">
        <div class="bg-box-owl">
            <h4 class="text-center mb-5">
                Layanan Surat Keterangan Desa
            </h4>
            <button class="owl-prev-custom"><</button>
                    <button class="owl-next-custom">></button>
                    <div class="owl-carousel owl-theme">
                        {{-- Konten --}}
                        <div class="item">
                            <a href="{{ route('keterangan_domisili.form') }}" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/house.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Domisili</p>
                            </a>
                        </div>
                        
                        <div class="item">
                            <a href="{{ route('keterangan_kelahiran.form') }}" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/baby.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Kelahiran</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/kelahiran" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/coffin.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Kematian</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/pengantar_ktp_kk" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/ktp.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar KTP & KK</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/tidak_mampu" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/money-bag.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Tidak Mampu</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/usaha" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/office-building.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Usaha</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/ahli_waris" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/scale.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Ahli Waris</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/tanah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/wheat.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Tanah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/belum_menikah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/ring-cross.webp') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Belum Menikah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/skck" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/police.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar SKCK</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/keramaian" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/party-popper.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Izin Keramaian</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/akta_kelahiran" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/document-1.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Rekomendasi Pembuatan Akta Kelahiran</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/akta_kematian" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/document-2.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Rekomendasi Pembuatan Akta Kematian</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/bpjs" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/hospital.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar BPJS Kesehatan/Ketenagakerjaan</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/bansos" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/love.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Bantuan Sosial</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/disabilitas" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/disabled-person.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Disabilitas</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/tidak_mampu_beasiswa" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/toga.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Tidak Mampu Beasiswa</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/pindah_sekolah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/school.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Keterangan Pindah Sekolah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/pendaftaran_sekolah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/contract.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Rekomendasi Pendaftaran Sekolah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/nikah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/couple.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar Nikah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/status_pernikahan" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/home.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Status Pernikahan</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/perceraian" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/broken.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Perceraian</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/bekerja" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/working.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Bekerja</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/tidak_bekerja" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/unemployed.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Tidak Bekerja</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/rekomendasi_pekerjaan" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/verification.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Rekomendasi Pekerjaan</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/tanah_warisan" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/rice-field.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Tanah Warisan</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/riwayat_tanah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/letter-of-marque_svgrepo.com.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Riwayat Tanah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/pembuatan_sertifikat_tanah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/certificate.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar Pembuatan Sertifikat Tanah</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/sehat" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/healthcare.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Sehat Dari Desa</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/kehilangan_barang" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/lost-and-found.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Kehilangan Barang</p>
                            </a>
                        </div>

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/donor_darah" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/blood-donation.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Pengantar Donor Darah</p>
                            </a>
                        </div>
                        
                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/kur" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/mobile-banking.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Rekomendasi Kredit Usaha Rakyat</p>
                            </a>
                        </div>
                        

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/umkm" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/shopping-bag.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan UMKM</p>
                            </a>
                        </div>
                        

                        <div class="item">
                            <a href="http://127.0.0.1:8000/desa/surat/izin_usaha_mikro" class="feature-box">
                                <div class="icon-fitur">
                                    <img src="{{ asset('asset_halaman_desa/img/logosurat/stamp.png') }}"
                                        alt="" />
                                </div>
                                <p>Surat Keterangan Izin Usaha Mikro</p>
                            </a>
                        </div>
                        

                    </div>
        </div>        
    </div>
</section>
@endsection