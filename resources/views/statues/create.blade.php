@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Status untuk Mitigasi</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('statuses.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="implemented">Implemented</option>
                                <option value="in progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="to do">To Do</option>
                            </select>
                        </div>
                    </div>

                    <!-- Form untuk memilih mitigasi -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mitigations_id">Mitigation</label>
                            <select name="mitigations_id" class="form-control" required>
                                <option value="">Pilih Mitigasi</option>
                                @foreach($mitigations as $mitigation)
                                <option value="{{ $mitigation->id }}">{{ $mitigation->action }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection