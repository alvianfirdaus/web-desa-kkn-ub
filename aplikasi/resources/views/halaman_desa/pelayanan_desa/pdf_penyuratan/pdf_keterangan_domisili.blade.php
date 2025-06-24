<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 0;
            left: 20px;
            width: 80px;
        }

        .header-content {
            margin-left: 100px;
        }

        .desa-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .desa-header h1 {
            font-size: 16px;
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .desa-header h2 {
            font-size: 14px;
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .desa-header h3 {
            font-size: 12px;
            margin: 5px 0 0 0;
            padding: 0;
            font-weight: normal;
        }

        .content {
            margin-top: 30px;
            text-align: justify;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            position: relative;
        }

        .ttd-section {
            margin-top: 30px;
        }

        .ttd-image {
            width: 120px;
            position: absolute;
            right: 0;
        }

        .ttd-name {
            margin-top: 100px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 4px 0;
        }
    </style>
</head>

<body>
    @php
        $logoPath = public_path('storage/' . $desa->logo_desa);
        $defaultLogo = public_path('storage/default_image/default.png');
        $logoToUse = file_exists($logoPath) ? $logoPath : $defaultLogo;

        $logoTtd = public_path('storage/' . $desa->ttd_kades);        
        $ttdToUse = file_exists($logoTtd) ? $logoTtd : $defaultLogo;
    @endphp

    <div class="container">
        <div class="header">
            <img class="logo" src="{{ $logoToUse }}" alt="Logo Desa {{ $desa->nama_desa }}">
            <div class="desa-header">
                <h1>PEMERINTAH KABUPATEN {{ $desa->kabupaten }}</h1>
                <h2>KECAMATAN {{ $desa->kecamatan }}</h2>
                <h1>DESA {{ $desa->nama_desa }}</h1>
                <h3>Alamat : {{ $desa->alamat_desa }}</h3>
                <h3>Telp/HP. {{ $desa->no_hp }}</h3>
            </div>
            <hr style="margin-top: 20px;">
            <h2 style="text-align: center; margin-top: 20px;">SURAT KETERANGAN DOMISILI</h2>
            <p style="text-align: center;">Nomor: {{ $surat->id }}/SKD/{{ date('Y') }}</p>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini, Kepala Desa {{ $desa->nama_desa }} menerangkan bahwa:</p>

            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $user->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: {{ $user->nik }}</td>
                </tr>
                <tr>
                    <td>Nomor KK</td>
                    <td>: {{ $surat->no_kk }}</td>
                </tr>
                <tr>
                    <td>Alamat Lama</td>
                    <td>: {{ $surat->alamat_lama }}</td>
                </tr>
                <tr>
                    <td>Alamat Baru</td>
                    <td>: {{ $surat->alamat_baru }}</td>
                </tr>
                <tr>
                    <td>Alasan Pindah</td>
                    <td>: {{ $surat->alasan_permohonan }}</td>
                </tr>
            </table>

            <p>Orang tersebut benar-benar berdomisili di wilayah Desa {{ $desa->nama_desa }}.</p>
            <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <div class="ttd-section">
                <p>{{ $desa->nama_desa }}, {{ date('d-m-Y') }}</p>
                <p><strong>Kepala Desa {{ $desa->nama_desa }}</strong></p>
                <img class="ttd-image" src="{{ $ttdToUse }}" alt="Tanda Tangan Lurah {{ $desa->nama_desa }}">
                <div class="ttd-name">
                    <p>_______________________</p>
                    <p><strong>{{ $desa->nama_kades }}</strong></p>
                    <p>NIP. {{ $desa->nip_kades ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>