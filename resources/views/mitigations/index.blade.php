@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Header dan tombol aksi -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Mitigasi Risiko</h2>
        <a href="{{ route('mitigations.create') }}" class="btn btn-primary">Tambah Mitigasi</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Risk Name</th>
                        <th>Action</th>
                        <th>Priority</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mitigations as $mitigation)
                    <tr>
                        <td style="font-size: 14px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 14px;">{{ $mitigation->risks->description }}</td>
                        <td style="font-size: 14px;">{{ $mitigation->action }}</td>
                        <td style="font-size: 14px;">{{ $mitigation->priority }}</td>
                        <td style="font-size: 14px;">{{ $mitigation->description }}</td>
                        <td class="d-flex justify-content-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('mitigations.edit', $mitigation->id) }}" class="btn btn-sm btn-warning me-2" title="Edit" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-pen"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('mitigations.destroy', $mitigation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Hapus mitigasi ini?')" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data mitigasi risiko.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
