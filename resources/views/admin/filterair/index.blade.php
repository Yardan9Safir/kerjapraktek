@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Data Filter Air</h2>
            <a href="{{ route('filterair.create') }}" class="btn btn-primary">+ Add Data</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table id="santriTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Deskripsi Alat</th>
                        <th>Stok Alat</th>
                        <th>Harga Alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filterairs as $filterair)
                        <tr>
                            <td>{{ $filterair->id }}</td>
                            <td>{{ $filterair->nama_alat }}</td>
                            <td>{{ $filterair->deskripsi_alat }}</td>
                            <td>{{ $filterair->stok_alat }}</td>
                            <td>Rp {{ number_format($filterair->harga_alat, 0, ',', '.') }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    {{-- <button class="btn btn-outline-info me-2" title="Lihat">
                                        <a href="{{ route('filterair.show', ['filterair' => $filterair->id]) }}" style="text-decoration: none; color: inherit;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </button> --}}
                                    <button class="btn btn-outline-primary me-2" title="Edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $filterair->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal{{ $filterair->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $filterair->id }}" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel{{ $filterair->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $filterair->id }}">Konfirmasi
                                            Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('filterair.destroy', $filterair->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $filterair->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $filterair->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $filterair->id }}">Edit Alat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('filterair.update', ['filterair' => $filterair->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Nama Alat</label>
                                                <input type="text" class="form-control" name="nama_alat"
                                                    value="{{ $filterair->nama_alat }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi Alat</label>
                                                <input type="text" class="form-control" name="deskripsi_alat"
                                                    value="{{ $filterair->deskripsi_alat }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stok Alat</label>
                                                <input type="number" class="form-control" name="stok_alat"
                                                    value="{{ $filterair->stok_alat }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga Alat</label>
                                                <input type="number" class="form-control" name="harga_alat"
                                                    value="{{ $filterair->harga_alat }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filtersTable').DataTable();
        });
    </script>
@endsection
