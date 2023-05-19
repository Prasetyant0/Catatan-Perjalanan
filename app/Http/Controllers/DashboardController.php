<?php

namespace App\Http\Controllers;

ini_set('max_execution_time',300);

use App\Models\Siswa;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{

    public function print($id)
    {
        // mengambil data perjalanan berdasarkan id
        $perjalanan = Perjalanan::findOrFail($id);

        // mendefinisikan variabel untuk Dompdf
        $data = array(
            'tanggal' => $perjalanan->tanggal,
            'lokasi' => $perjalanan->lokasi,
            'suhu' => $perjalanan->suhu,
            'waktu' => $perjalanan->waktu,
            'tujuan' => $perjalanan->tujuan,
        );

        // mengatur konfigurasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf->setOptions($options);

        // merender tampilan Blade ke dalam bentuk HTML
        $html = View::make('pages.perjalanan-print', compact('perjalanan'))->render();

        // memuat HTML ke dalam Dompdf dan menghasilkan file PDF
        $dompdf->loadHtml(ob_get_clean());
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfString = $dompdf->output();
        return view('pages.preview-pdf', ['pdfString' => $pdfString]);

    }

    public function print_all()
    {
        $data_perjalanan = DB::table('perjalanans')
                ->join('users', 'users.id', '=', 'perjalanans.user_id')
                ->select('users.nik', 'perjalanans.id', 'perjalanans.tanggal', 'perjalanans.lokasi', 'perjalanans.waktu', 'perjalanans.suhu')
                ->where('users.id', '=', auth()->user()->id)
                ->paginate(10);

        // mengatur konfigurasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');

        // merender tampilan Blade ke dalam bentuk HTML
        $html = View::make('pages.perjalanan-seluruh-data', compact('data_perjalanan'))->render();

        // memuat HTML ke dalam Dompdf dan menghasilkan file PDF
        $dompdf->loadHtml($html);
        $dompdf->render();

        // mengembalikan file PDF sebagai response
        return $dompdf->stream();

        return view('pages.perjalanan-seluruh-data', ['data_perjalanan' => $data_perjalanan]);
    }

    public function indexPerjalanan()
    {
        if (auth()->user()) {
            $data_perjalanan = DB::table('perjalanans')
                ->join('users', 'users.id', '=', 'perjalanans.user_id')
                ->select('users.nik', 'perjalanans.id', 'perjalanans.tanggal', 'perjalanans.lokasi', 'perjalanans.waktu', 'perjalanans.suhu', 'perjalanans.tujuan')
                ->where('users.id', '=', auth()->user()->id)
                ->paginate(10);

            return view('pages.perjalanan', ['data_perjalanan' => $data_perjalanan]);
        }

        return view('pages.perjalanan');
    }
}
