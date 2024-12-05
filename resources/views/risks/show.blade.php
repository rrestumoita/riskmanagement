@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Detail Risiko</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama Risiko:</strong> {{ $risk->risk_name }}</p>
                    <p><strong>Deskripsi Risiko:</strong> {{ $risk->risk_description }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Severity:</strong> {{ $risk->severity }}</p>
                    <p><strong>Occurrence:</strong> {{ $risk->occurrence }}</p>
                    <p><strong>Detection:</strong> {{ $risk->detection }}</p>
                    <p><strong>RPN:</strong> {{ $risk->risk_priority_number }}</p>
                </div>
            </div>

            <div class="form-group">
                <a href="{{ route('risks.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('risks.edit', $risk->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
