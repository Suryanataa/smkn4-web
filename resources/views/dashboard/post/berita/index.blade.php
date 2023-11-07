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
				<div class="section-header-back">
					<a href="{{ route('post.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
				</div>
				<h1>{{ $title }}</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active">
						<a href="{{ route('dashboard') }}">Dashboard</a>
					</div>
					<div class="breadcrumb-item">
						<a href="{{ route('post.index') }}">Post</a>
					</div>
					<div class="breadcrumb-item">Berita</div>
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
									<a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">
										<i class="fas fa-plus"></i>
										Tambah Berita
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th>#</th>
												<th>Judul Berita</th>
												<th>Penulis</th>
												<th>Tanggal</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($berita as $item)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $item->judul }}</td>
													<td>{{ $item->penulis->name }}</td>
													<td>{{ $item->created_at->diffForHumans() }}</td>
													<td>
														@if ($item->status === 0)
															<div class="badge badge-warning">Draft</div>
														@elseif ($item->status === 1)                                                       
															<div class="badge badge-success">Published</div>
														@endif
													</td>
													<td>
														<a href="{{ route('post.show', $item->slug) }}" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Lihat Berita">
															<i class="fas fa-eye"></i>
														</a>
														<a href="{{ route('post.edit', $item->slug) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Berita">
															<i class="fas fa-edit"></i>
														</a>
														<a href="{{ route('post.destroy', $item->slug) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"  data-toggle="tooltip" data-placement="top" title="Hapus Berita">
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