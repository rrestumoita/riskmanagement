@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Status Mitigasi</h2>
        <a href="{{ route('statuses.create') }}" class="btn btn-primary">Tambah Status</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Mitigasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                    <tr>
                        <td style="font-size: 14px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 14px;">{{ $status->status }}</td>
                        <td style="font-size: 14px;">{{ $status->mitigation->action ?? 'No Mitigation' }}</td> <!-- Menampilkan nama mitigasi yang terkait -->
                        <td class="d-flex justify-content-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('statuses.edit', $status->id) }}" class="btn btn-sm btn-warning me-2" title="Edit" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-pen"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('Hapus status ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection