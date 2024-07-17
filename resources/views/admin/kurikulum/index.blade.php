@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>Classrooms</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">+ Add Classroom</a>
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
                <th>Kelas</th>
                <th>Tahun Ajaran Masehi</th>
                <th>Tahun Ajaran Hijriyah</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $kelas)
            <tr>
                <td>{{ $kelas->id }}</td>
                <td>{{ $kelas->nama }}</td>
                <td>{{ $kelas->tahun_ajaran_masehi }}</td>
                <td>{{ $kelas->tahun_ajaran_hijriah }}</td>
                <td>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-outline-info me-2" onclick="window.location.href='{{ route('kelas.show', $kelas->id) }}'">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $kelas->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $kelas->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $kelas->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $kelas->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $kelas->id }}">Konfirmasi Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="deleteForm" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $kelas->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kelas->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $kelas->id }}">Edit Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('kelas.update', ['kelas' => $kelas->id]) }}" id="editForm{{ $kelas->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="editkelas{{ $kelas->id }}" class="form-label">Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="editkelas{{ $kelas->id }}" name="nama" value="{{ $kelas->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="editTahunMasehi{{ $kelas->id }}" class="form-label">Tahun Ajaran Masehi</label>
                                    <input type="text" class="form-control" id="editTahunMasehi{{ $kelas->id }}" name="tahunmasehi" value="{{ $kelas->tahunmasehi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="editTahunHijriah{{ $kelas->id }}" class="form-label">Tahun Ajaran Hijriyah</label>
                                    <input type="text" class="form-control" id="editTahunHijriah{{ $kelas->id }}" name="tahunhijriah" value="{{ $kelas->tahunhijriah }}">
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
        $('#kelasTable').DataTable();
    });
</script>
@endsection
