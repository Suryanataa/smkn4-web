@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-button">
                    <a href="{{ route('konsentrasi.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Jurusan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Kelola {{ $title }}</h2>
                <p class="section-lead">
                    Di halaman ini Anda bisa menambah, mengedit dan menghapus {{ $title }}.
                </p>
                <div class="row">
                    @foreach ($konsentrasi as $item)
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $item->nama }}</h4>
                                    <div class="card-header-action">
                                        <a data-collapse="#{{ $item->slug }}-collapse" class="btn btn-icon btn-info" href="#">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <a href="{{ route('konsentrasi.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('konsentrasi.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" data-toggle="tooltip" title="Hapus Data">
                                            <i class="fas fa-times" onclick="event.preventDefault(); this.closest('a').click();"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="media mb-3">
                                        <img class="mr-3" src="{{ asset($item->icon) }}" alt="{{ $item->nama }}" style="width: 100px">
                                        <div class="media-body">
                                            <h5 class="mt-0">{{ $item->nama }}</h5>
                                            <p class="mb-0">
                                                Program Keahlian: {{ $item->program->nama }}
                                                <br>
                                                Bidang Keahlian: {{ $item->program->bidang->nama }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="collapse hide" id="{{ $item->slug }}-collapse">
                                        @if (strlen($item->deskripsi) > 200)
                                            {!! '<p>' . substr(strip_tags($item->deskripsi), 0, 200) . '...</p>' !!}
                                        @else
                                            {!! '<p>' . $item->deskripsi . '</p>' !!}
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('konsentrasi.show', $item->slug) }}" class="card-cta text-primary">
                                            Selengkapnya
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
