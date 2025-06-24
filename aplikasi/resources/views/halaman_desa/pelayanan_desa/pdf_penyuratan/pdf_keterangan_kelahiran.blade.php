<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Kelahiran</title>
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
            margin-bottom: 20px;
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
            margin: 10px 0;
        }

        td {
            padding: 4px 0;
            vertical-align: top;
        }

        .td-label {
            width: 150px;
        }

        .judul-surat {
            text-align: center;
            margin-top: 20px;
            text-decoration: underline;
            font-weight: bold;
            font-size: 16px;
        }

        .no-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        hr {
            border-top: 1px solid #000;
            margin: 10px 0;
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
                <h1>PEMERINTAH KABUPATEN {{ strtoupper($desa->kabupaten) }}</h1>
                <h2>KECAMATAN {{ strtoupper($desa->kecamatan) }}</h2>
                <h1>DESA {{ strtoupper($desa->nama_desa) }}</h1>
                <h3>Alamat : {{ $desa->alamat_desa }}</h3>
                <h3>Telp/HP. {{ $desa->no_hp }}</h3>
            </div>
            <hr>
        </div>

        <h1 class="judul-surat">SURAT KETERANGAN KELAHIRAN</h1>
        <p class="no-surat">Nomor: {{ $surat->id }}/SKK/{{ date('Y') }}</p>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini, Kepala Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->kecamatan }},
                Kabupaten {{ $desa->kabupaten }}, menerangkan bahwa:</p>

            <table>
                <tr>
                    <td class="td-label">Nama Bayi</td>
                    <td>: {{ $surat->nama_bayi }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{ $surat->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{ $surat->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{ date('d-m-Y', strtotime($surat->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td>Pukul Kelahiran</td>
                    <td>: {{ $surat->pukul_kelahiran }} WIB</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>: {{ $surat->anak_ke }}</td>
                </tr>
                <tr>
                    <td>Berat Badan</td>
                    <td>: {{ $surat->berat_bayi }} kg</td>
                </tr>
                <tr>
                    <td>Panjang Badan</td>
                    <td>: {{ $surat->panjang_bayi }} cm</td>
                </tr>
            </table>

            <p>Adalah anak dari pasangan:</p>

            <table>
                <tr>
                    <td class="td-label">Nama Ayah</td>
                    <td>: {{ $surat->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>NIK Ayah</td>
                    <td>: {{ $surat->nik_ayah }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: {{ $surat->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>NIK Ibu</td>
                    <td>: {{ $surat->nik_ibu }}</td>
                </tr>                
            </table>

            <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="footer">
            <div class="ttd-section">
                <p>{{ $desa->nama_desa }}, {{ date('d F Y', strtotime($surat->updated_at)) }}</p>
                <p><strong>KEPALA DESA {{ strtoupper($desa->nama_desa) }}</strong></p>
                <img class="ttd-image" src="{{ $ttdToUse }}"
                    alt="Tanda Tangan Kepala Desa {{ $desa->nama_desa }}">
                <div class="ttd-name">
                    <p><u>{{ $desa->nama_kepala_desa }}</u></p>
                    <p>NIP. {{ $desa->nip_kades ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
