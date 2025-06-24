<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #57709ce6;
            color: #ffffff;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);
            background-color: #283a5ae6;
        }
        .status {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .pending {
            color: orange;
        }
        .disetujui {
            color: green;
        }
        .ditolak {
            color: red;
        }
        .button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Status Pendaftaran</h2>
        
        <p>Halo, <strong>{{ $pendaftaran->nama_lengkap }}</strong></p>
        <p>Anda mendftar dengan nomor telepon: <strong>{{ $pendaftaran->nomor_hp }}</strong></p>
        <p>Dan nik: <strong>{{ $pendaftaran->nik }}</strong></p>
        <p>Pendaftaran Anda saat ini memiliki status:</p>

        <p class="status {{ strtolower($pendaftaran->status) }}">
            {{ ucfirst($pendaftaran->status) }}
        </p>

        @if($pendaftaran->status == 'pending')
            <p>Mohon tunggu, pendaftaran Anda sedang dalam proses seleksi.</p>
        @elseif($pendaftaran->status == 'disetujui')
            <p>Selamat! Pendaftaran Anda telah disetujui. Silakan lanjutkan ke halaman login.</p>
            <a href="{{ url('/desa/login') }}" class="button">Login</a>
        @elseif($pendaftaran->status == 'ditolak')
            <p>Maaf, pendaftaran Anda ditolak. Silakan hubungi pihak perusahaan untuk informasi lebih lanjut.</p>
        @endif
    </div>

</body>
</html>
