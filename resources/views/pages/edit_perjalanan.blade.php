@extends('layouts.master')

@section('title', 'Ubah Data')
@section('judul', 'Ubah Data')

@section('content')

    <div class="card" style="position: relative; top:40%; left:20%; transform:translate(-50%, -50%); width:500px;">
        <form action="/perjalanan/{{ $perjalanan->id }}/update" method="POST" novalidate="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (session('message'))
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session('message') }}
                </div>
            @endif
            <div class="form" id="form-unhide" style="display: none">
                <div class="alert-2" id="error" style="display: none"></div>
            </div>
            <div class="form">
                <input type="date" id="tanggal" name="tanggal" autocomplete="off" class="form-input"
                    value="{{ $perjalanan->tanggal }}" placeholder=" ">
                <label for="tanggal" class="form-label">Tanggal</label>
            </div>
            <div class="form">
                <input type="time" id="waktu" name="waktu" autocomplete="off" class="form-input"
                    value="{{ $perjalanan->waktu }}" placeholder=" ">
                <label for="waktu" class="form-label">Waktu</label>
            </div>
            <div class="form">
                <input type="text" step="0.01" id="suhu" name="suhu" autocomplete="off" class="form-input"
                    value="{{ $perjalanan->suhu }}" placeholder=" ">
                <label for="suhu" class="form-label">Suhu (°C)</label><svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" fill="currentColor" class="bi bi-thermometer" viewBox="0 0 16 16">
                    <path d="M8 14a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    <path
                        d="M8 0a2.5 2.5 0 0 0-2.5 2.5v7.55a3.5 3.5 0 1 0 5 0V2.5A2.5 2.5 0 0 0 8 0zM6.5 2.5a1.5 1.5 0 1 1 3 0v7.987l.167.15a2.5 2.5 0 1 1-3.333 0l.166-.15V2.5z" />
                </svg>
            </div>
            <div class="form">
                <input type="text" id="lokasi" name="lokasi" autocomplete="off" class="form-input"
                    value="{{ $perjalanan->lokasi }}" placeholder=" ">
                <label for="lokasi" class="form-label">Lokasi Yang Dikunjungi</label><svg
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
            </div>
            <div class="form">
                <input type="text" id="tujuan" name="tujuan" autocomplete="off" class="form-input"
                    value="{{ $perjalanan->tujuan }}" placeholder=" ">
                <label for="tujuan" class="form-label">Tujuan</label><svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path
                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                </svg>
            </div>
            <div class="form">
                <button type="submit" class="button-1">
                    Update
                </button>
            </div>
        </form>
    </div>

    <script>
        const tanggal = document.getElementById('tanggal')
        const lokasi = document.getElementById('lokasi')
        const waktu = document.getElementById('waktu')
        const suhu = document.getElementById('suhu')
        const tujuan = document.getElementById('tujuan')

        const form = document.getElementById('form')

        const unhide = document.getElementById('form-unhide')
        const errorElement = document.getElementById('error')

        form.addEventListener('submit', (e) => {
            let messages = []
            if (tanggal.value.length < 1) {
                errorElement.style.display = "block";
                unhide.style.display = "block";
                messages.push('Tanggal harus diisi')
            }
            if (waktu.value.length < 1) {
                errorElement.style.display = "block";
                unhide.style.display = "block";
                messages.push('Waktu harus diisi')
            }
            if (suhu.value.length < 1) {
                errorElement.style.display = "block";
                unhide.style.display = "block";
                messages.push('Suhu harus diisi')
            }
            if (lokasi.value < 1) {
                errorElement.style.display = "block";
                unhide.style.display = "block";
                messages.push('Lokasi harus diisi')
            }
            if (tujuan.value < 1) {
                errorElement.style.display = "block";
                unhide.style.display = "block";
                messages.push('Tujuan harus diisi')
            }
            if (messages.length > 0) {
                e.preventDefault()
                errorElement.innerText = messages.join(', ')
            }
        })
    </script>

@endsection
