{{--
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PRINT</title>
    <style>
        /* Gaya untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            color: #333;
            margin: 0;
        }
        h1 {
            font-size: 24px;
            margin: 0 0 20px;
        }
        p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
            text-align: center;
            text:bold;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            text-align: left;
        }
    </style>
</head>
<body>
    <p>CATATAN PERJALANAN {{ Auth::user()->name }}</p>
    <p>TAHUN {{ now()->format('Y') }}</p>
    <table>
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">SUHU</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">WAKTU</th>
                <th scope="col">LOKASI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_perjalanan as $dataperjalanan => $perjalanan)
                        <tr>
                            <td scope="row">{{ $dataperjalanan + $data_perjalanan->firstItem() }}</td>
                            <td>{{ number_format($perjalanan->suhu, 2) }} °C</td>
                            <td>{{ $perjalanan->tanggal }}</td>
                            <td>{{ $perjalanan->waktu }}</td>
                            <td>{{ $perjalanan->lokasi }}</td>
                        </tr>
                    @endforeach
        </tbody>
    </table>
    <footer style="position: relative; top:650px;">
        <p class="footer">&copy;{{ now()->format('Y') }} SMKN 3 Banjar</p>
    </footer>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT DISPENSASI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kop">
        <table align="center">
            <td><img src="smk.jpg" class="imgkiri"></td>
            <td>
                <center>
                    <font><b>PEMERINTAH DAERAH PROVINSI JAWA BARAT<br>
                        DINAS PENDIDIKAN<br>
                        SMK NEGERI 3 BANJAR
                        </b></font><br>
                    <font class="font2">Jl. Julaeni Telpn. (0265) 2734141, Kec. Langensari Kota Banjar<br> Tahun 2023</font>
                </center>
            </td>
            <td><img src="jb2.png" class="imgkanan" ></td>
        </table>
    </div>
    <hr class="pertama">
    <hr class="kedua">
    <div class="isi1">
        <center>
            <font><U><b>SURAT KETERANGAN IZIN BEPERGIAN</b></U></font>
        </center>
    </div>
    <div class="isi2">
        <font class="salam">
            <b><i>Assalamualaikum Wr.Wb</i></b><br>
            Dengan rasa hormat, Saya {{ auth()->user()->nama }} memberitahu bahwa saya tidak dapat masuk sekolah pada tanggal {{ $perjalanan->tanggal }}. Hal tersebut dikarenakan saya akan pergi ke kota {{ $perjalanan->lokasi }} dengan tujuan "tujuan". Saya sangat berat hati untuk meninggalkan sekolah, oleh karena itu saya akan berusaha mengejar mata pelajaran yang tertinggal dan siap untuk menerima tugas tambahan. <br>
            Oleh sebab itu, Saya memohon dengan sangat kepada bapak/ibu guru sekalian untuk memberikan izin. Di bawah ini keterangan lengkap nya. <br>
            Tanggal Pergi : {{ $perjalanan->tanggal }} <br>
            Kota : {{ $perjalanan->lokasi }} <br>
            Tujuan : "" <br>
            Jam Berangkat : {{ $perjalanan->waktu }} <br>
            Suhu Tubuh : {{ number_format($perjalanan->suhu, 2) }} °C <br>
            Demikian surat izin saya buat, atas pemberian izin dan kebijaksanaan Bapak/Ibu Guru saya ucapkan banyak terima kasih. <br>
        </font>
        <font class="ttd">
            Hormat saya <br><br><br><br>
            {{ auth()->user()->nama }}
        </font>
    </div>

</body>
</html>
