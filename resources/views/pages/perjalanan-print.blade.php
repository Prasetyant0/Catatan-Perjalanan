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
            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logosmk.png'))) }}"
                    class="imgkiri" style="position: relative; width: 130px; height: 130px; bottom: 1px; right: 20px;">
            </td>
            <td>
                <center>
                    <font><b>PEMERINTAH DAERAH PROVINSI JAWA BARAT<br>
                            DINAS PENDIDIKAN<br>
                            SMK NEGERI 3 BANJAR
                        </b></font><br>
                    <font class="font2">Jl. Julaeni Telpn. (0265) 2734141, Kec. Langensari Kota Banjar<br> Tahun 2023
                    </font>
                </center>
            </td>
            <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/assets/img/logojawabarat.png'))) }}"
                    class="imgkanan" style="position: relative; width: 130px; height: 120px; left: 26px; top: 2px;">
            </td>
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
            Dengan rasa hormat, Saya {{ auth()->user()->nama }} memberitahu bahwa saya tidak dapat masuk sekolah pada
            tanggal {{ $perjalanan->tanggal }}. Hal tersebut dikarenakan saya akan pergi ke kota
            {{ $perjalanan->lokasi }} dengan tujuan <span
                style="text-transform:lowercase">{{ $perjalanan->tujuan }}</span>. Saya sangat berat hati untuk
            meninggalkan sekolah, oleh karena itu saya akan berusaha mengejar mata pelajaran yang tertinggal dan siap
            untuk menerima tugas tambahan. <br>
            Oleh sebab itu, Saya memohon dengan sangat kepada bapak/ibu guru sekalian untuk memberikan izin. Di bawah
            ini keterangan lengkap nya. <br>
            Tanggal Pergi : {{ $perjalanan->tanggal }} <br>
            Kota Tujuan : {{ $perjalanan->lokasi }} <br>
            Tujuan : {{ $perjalanan->tujuan }} <br>
            Jam Berangkat : {{ date('H:i', strtotime($perjalanan->waktu)) }}
            @if (date('H:i', strtotime($perjalanan->waktu)) >= '04:00' && date('H:i', strtotime($perjalanan->waktu)) < '10:00')
                Pagi
            @elseif (date('H:i', strtotime($perjalanan->waktu)) >= '10:00' && date('H:i', strtotime($perjalanan->waktu)) < '15:00')
                Siang
            @elseif (date('H:i', strtotime($perjalanan->waktu)) >= '15:00' && date('H:i', strtotime($perjalanan->waktu)) < '18:00')
                Sore
            @else
                Malam
            @endif
            <br>
            Suhu Tubuh : {{ number_format($perjalanan->suhu, 2) }} °C <br>
            Demikian surat izin saya buat, atas pemberian izin dan kebijaksanaan Bapak/Ibu Guru saya ucapkan banyak
            terima kasih. <br>
        </font><br>
        <font class="ttd">
            Hormat saya <br><br><br><br>
            {{ auth()->user()->nama }}
        </font>
    </div>
</body>

</html>
