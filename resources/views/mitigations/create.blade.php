@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Mitigasi Risiko</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('mitigations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Input untuk Risk ID -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="risks_id">Risk</label>
                            <select name="risks_id" class="form-control" required>
                                <option value="">-- Pilih Risiko --</option>
                                @foreach ($risks as $risk)
                                <option value="{{ $risk->id }}">{{ $risk->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Input untuk Action -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Input untuk Priority -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Priority</label>
                            <select name="priority" class="form-control" required>
                                <option value="High">High</option>
                                <option value="Middle">Middle</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input untuk Description -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('mitigations.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection