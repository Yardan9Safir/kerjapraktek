@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Santri</h2>
            <a href="{{ route('santri.create') }}" class="btn btn-primary">+ Add Santri</a>
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Nama Wali</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($santris as $santri)
                        <tr>
                            <td>{{ $santri->id }}</td>
                            <td>{{ $santri->nomor_induk }}</td>
                            <td>{{ $santri->nama }}</td>
                            <td>{{ $santri->nama_wali }}</td>
                            <td>{{ $santri->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d/m/Y') }}</td>
                            <td>{{ $santri->alamat }}</td>
                            <td>{{ $santri->tahun_masuk }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-info me-2" title="Lihat">
                                        <a href="{{ route('santri.show', ['santri' => $santri->id]) }}" style="text-decoration: none; color: inherit;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </button>
                                    <button class="btn btn-outline-primary me-2" title="Edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $santri->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal{{ $santri->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $santri->id }}" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel{{ $santri->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $santri->id }}">Konfirmasi
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
                                        <form action="{{ route('santri.destroy', $santri->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $santri->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $santri->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $santri->id }}">Edit Santri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('santri.update', ['santri' => $santri->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">NIS</label>
                                                <input type="text" class="form-control" name="nomor_induk"
                                                    value="{{ $santri->nomor_induk }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $santri->nama }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Wali</label>
                                                <input type="text" class="form-control" name="nama_wali"
                                                    value="{{ $santri->nama_wali }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir"
                                                    value="{{ $santri->tempat_lahir }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    value="{{ $santri->tanggal_lahir }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat"
                                                    value="{{ $santri->alamat }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tahun Masuk</label>
                                                <input type="number" class="form-control" name="tahun_masuk"
                                                    value="{{ $santri->tahun_masuk }}" required>
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
            $('#santriTable').DataTable();
        });
    </script>
@endsection
