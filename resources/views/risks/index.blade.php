@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <!-- Menambahkan Kelola Risiko dan Tambah Risiko di luar card -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Risiko</h2>
        <a href="{{ route('risks.create') }}" class="btn btn-primary">Tambah Risiko</a>
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
                        <th>Nama Risiko</th>
                        <th>Severity</th>
                        <th>Occurrence</th>
                        <th>Detection</th>
                        <th>RPN</th>
                        <th>Pareto Percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($risks as $risk)
                    <tr>
                        <td style="font-size: 14px;">{{ $loop->iteration }}</td>
                        <td style="font-size: 14px;">{{ $risk->description }}</td>
                        <td style="font-size: 14px;">{{ $risk->severity }}</td>
                        <td style="font-size: 14px;">{{ $risk->occurrence }}</td>
                        <td style="font-size: 14px;">{{ $risk->detection }}</td>
                        <td style="font-size: 14px;">{{ $risk->rpn }}</td>
                        <td style="font-size: 14px;">{{ number_format($risk->paretoPercentage, 2) }}%</td>
                        <td class="d-flex justify-content-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('risks.edit', $risk->id) }}" class="btn btn-sm btn-warning me-2" title="Edit" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-pen"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('risks.destroy', $risk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Hapus risiko ini?')" style="width: 30px; height: 30px; padding: 0; display: flex; align-items: center; justify-content: center;">
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
