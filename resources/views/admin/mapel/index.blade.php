@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><strong>Mata Pelajaran</strong></h2>
            <a href="{{ route('mapel.create') }}" class="btn btn-primary">+ Add Mata Pelajaran</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Keterangan</th>
                    <th>Ekstrakulikuler</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapels as $mapel)
                    <tr>
                        <td>{{ $mapel->id }}</td>
                        <td>{{ $mapel->nama }}</td>
                        <td>{{ $mapel->keterangan }}</td>
                        <td>{{ $mapel->ekstrakulikuler ? 'Iya' : 'Tidak' }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-outline-info me-2"
                                    {{-- onclick="window.location.href='{{ route('mapel.show', $mapel->id) }}'"  --}}
                                    title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $mapel->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $mapel->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="confirmDeleteModal{{ $mapel->id }}" tabindex="-1"
                        aria-labelledby="confirmDeleteModalLabel{{ $mapel->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $mapel->id }}">Konfirmasi
                                        Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form id="deleteForm" action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $mapel->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel{{ $mapel->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $mapel->id }}">Edit Mata Pelajaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('mapel.update', ['mapel' => $mapel->id]) }}"
                                        id="editForm{{ $mapel->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="editmata_pelajaran{{ $mapel->id }}" class="form-label">Mata
                                                Pelajaran</label>
                                            <input type="text" class="form-control"
                                                id="editmata_pelajaran{{ $mapel->id }}" name="nama"
                                                value="{{ $mapel->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editKeterangan{{ $mapel->id }}"
                                                class="form-label">Keterangan</label>
                                            <input type="text" class="form-control"
                                                id="editKeterangan{{ $mapel->id }}" name="keterangan"
                                                value="{{ $mapel->keterangan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ekstrakulikuler</label>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input"
                                                    id="editEkstrakulikulerIya{{ $mapel->id }}" name="ekstrakulikuler"
                                                    value="1" {{ $mapel->ekstrakulikuler == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="editEkstrakulikulerIya{{ $mapel->id }}">Iya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input"
                                                    id="editEkstrakulikulerTidak{{ $mapel->id }}" name="ekstrakulikuler"
                                                    value="0" {{ $mapel->ekstrakulikuler == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="editEkstrakulikulerTidak{{ $mapel->id }}">Tidak</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
