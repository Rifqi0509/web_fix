<!-- resources/views/rekap/pilih-tanggal.blade.php -->

@extends('app')

@section('content')

<h4 class="font-weight-bold mb-3">Pilih Rentang Tanggal untuk Ekspor Excel</h4>

<form action="{{ route('export.by.date') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="tanggal_awal">Tanggal Awal:</label>
        <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_akhir">Tanggal Akhir:</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Cetak Excel</button>
</form>

@endsection
