@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Risiko</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('risks.update', $risk->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menambahkan method PUT untuk update -->
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Risiko</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description', $risk->description) }}" required>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Severity</label>
                            <input type="number" name="severity" class="form-control" value="{{ old('severity', $risk->severity) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Occurrence</label>
                            <input type="number" name="occurrence" class="form-control" value="{{ old('occurrence', $risk->occurrence) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Detection</label>
                            <input type="number" name="detection" class="form-control" value="{{ old('detection', $risk->detection) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('risks.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
