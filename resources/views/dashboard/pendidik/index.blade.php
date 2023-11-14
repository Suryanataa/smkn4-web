@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Guru dan Staff</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $title }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto</th>
                                                <th>Nama Guru</th>
                                                <th>Bagian</th>
                                                <th>Sub-bagian</th>
                                                <th>Mapel</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guru as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ $item->gambar !== 'no-image-34.png' ? asset('storage/gambar/' . $item->gambar) : asset('images/default/' . $item->gambar) }}" style="width: 100px" alt="{{ $item->nama }}">
                                                    </td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>
                                                        @if ($item->bagian === 'pendidik')
                                                            Tenaga Pendidik
                                                        @elseif ($item->bagian === 'pegawai')
                                                            Tenaga Kepegawaian
                                                        @endif
                                                    </td>
                                                    <td>{{ ucfirst($item->sub_bagian) }}</td>
                                                    <td>
                                                        {{ $item->mapel !== null ? $item->mapel->nama : '-' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('guru.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Guru">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('guru.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" data-placement="top" title="Hapus Guru">
                                                            <i class="fas fa-trash" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endsection
