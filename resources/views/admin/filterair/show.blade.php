@extends('layouts.admin')

@section('content')
    <style>
        body {
            background-color: #F3F4F6;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .content {
            background-color: #FFFFFF;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #FFFFFF;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h4 {
            font-weight: bold;
        }

        .rounded-circle {
            background-color: #E0E7FF;
        }

        .btn-primary-custom {
            background-color: #6366F1;
            border: none;
            border-radius: 12px;
        }

        .btn-info-custom {
            background-color: #60A5FA;
            border: none;
            border-radius: 12px;
        }

        .btn-danger-custom {
            background-color: #EF4444;
            border: none;
            border-radius: 12px;
        }

        .btn-primary-custom,
        .btn-info-custom,
        .btn-danger-custom {
            padding: 8px 16px;
        }

        .pagination .page-item .page-link {
            color: #6366F1;
            border: none;
            background-color: transparent;
        }

        .pagination .page-item.active .page-link {
            background-color: #6366F1;
            color: #FFF;
            border-radius: 50%;
        }

        .table thead {
            background-color: #E5E7EB;
        }

        .table th,
        .table td {
            padding: 12px;
            vertical-align: middle;
        }

        .table th {
            border-top: none;
        }

        .table td button {
            margin-right: 5px;
        }

        .detail-santri-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .detail-santri-header h2 {
            margin: 0;
        }

        .detail-santri {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .detail-santri .image {
            flex: 0 0 100px;
            margin-right: 20px;
        }

        .detail-santri .info {
            flex: 1;
        }

        .detail-santri .info h3 {
            margin-bottom: 5px;
        }

        .detail-santri .info .meta {
            display: flex;
            flex-wrap: wrap;
        }

        .detail-santri .info .meta div {
            margin-right: 20px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .detail-santri .info .meta div i {
            margin-right: 8px;
            color: #6366F1;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h4 {
            margin: 0;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="detail-santri-header mb-4">
                    <h2><strong>Detail Santri</strong></h2>
                    <a class="btn btn-primary-custom" href="{{ route('santri.index') }}">Back</a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 offset-md-1 content">
                        <div class="card p-4 mb-4">
                            <div class="detail-santri">
                                <div class="image">
                                    <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center"
                                        style="width: 100px; height: 100px;">
                                        <span class="text-white">Avatar</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>{{ $santri->nama }}</h3>
                                    <h4>{{ $santri->nomor_induk }}</h4>
                                    <div class="meta">
                                        <div><i class="bi bi-calendar"></i><strong>Tahun Masuk:</strong>
                                            {{ $santri->tahun_masuk }}</div>
                                        <div><i class="bi bi-person"></i><strong>Wali:</strong> {{ $santri->nama_wali }}
                                        </div>
                                        <div><i class="bi bi-geo-alt"></i><strong>Alamat:</strong> {{ $santri->alamat }}
                                        </div>
                                        <div><i class="bi bi-geo"></i><strong>Tempat Lahir:</strong>
                                            {{ $santri->tempat_lahir }}</div>
                                        <div><i class="bi bi-calendar2"></i><strong>Tanggal Lahir:</strong>
                                            {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-4">
                            <div class="card-header">
                                <h4>Nilai Rapor</h4>
                                <button class="btn btn-primary-custom">Input Nilai</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2023-2024</td>
                                            <td>Semester 1</td>
                                            <td>98,25</td>
                                            <td>
                                                <button class="btn btn-info-custom btn-sm">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
                rel="stylesheet">
        @endsection
