@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Mitigasi Risiko</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('mitigations.update', $mitigation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Input untuk Risk ID -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Risk</label>
                            <select name="risks_id" class="form-control" required>
                                @foreach ($risks as $risk)
                                    <option value="{{ $risk->id }}" {{ $risk->id == $mitigation->risk_id ? 'selected' : '' }}>
                                        {{ $risk->description}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Input untuk Action -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Action</label>
                            <input type="text" name="action" class="form-control" value="{{ $mitigation->action }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Input untuk Priority -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Priority</label>
                            <select name="priority" class="form-control" required>
                                <option value="High" {{ $mitigation->priority == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Middle" {{ $mitigation->priority == 'Middle' ? 'selected' : '' }}>Middle</option>
                                <option value="Low" {{ $mitigation->priority == 'Low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input untuk Description -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required>{{ $mitigation->description }}</textarea>
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
