@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Risiko Baru</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('risks.store') }}" method="POST">
                @csrf

                <!-- Deskripsi Risiko -->
                <div class="form-group mb-4">
                    <label for="description">Nama Risiko</label>
                    <input type="text" name="description" class="form-control" id="description" required value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Severity -->
                <div class="form-group mb-4">
                    <label for="severity">Severity (Skala 1-10)</label>
                    <input type="number" name="severity" class="form-control" id="severity" min="1" max="10" required value="{{ old('severity') }}">
                    @error('severity')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Occurrence -->
                <div class="form-group mb-4">
                    <label for="occurrence">Occurrence (Skala 1-10)</label>
                    <input type="number" name="occurrence" class="form-control" id="occurrence" min="1" max="10" required value="{{ old('occurrence') }}">
                    @error('occurrence')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Detection -->
                <div class="form-group mb-4">
                    <label for="detection">Detection (Skala 1-10)</label>
                    <input type="number" name="detection" class="form-control" id="detection" min="1" max="10" required value="{{ old('detection') }}">
                    @error('detection')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Simpan dan Kembali -->
                <div class="form-group d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('risks.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection