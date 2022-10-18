@extends('layout.conquer')
@section('content')
<h2 class="page-title">
  Penjualan Buku <small>perusahaan</small>
</h2>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="/">Beranda</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="">Transaksi</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="">Penjualan</a>
    </li>
  </ul>
</div>
<div class="content">
	<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-shopping-cart"></i>
				Order Penjualan
			</div>
			@if(Auth::user()->role == "manajer")
				<div class="actions">
					<a href="/buku" class="btn btn-primary">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Buat Order </span>
					</a>
					<!-- <div class="btn-group">
						<a class="btn btn-success dropdown-toggle" href="#" data-toggle="dropdown">
						<i class="fa fa-share"></i>
						<span class="hidden-480">Tools </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#">
								Export to Excel </a>
							</li>
							<li>
								<a href="#">
								Export to PDF </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">
								Print Invoices </a>
							</li>
						</ul>
					</div> -->
				</div>
			@endif
		</div>
		<div class="portlet-body">
			@if(session('success'))
				<div class="alert alert-success">
						<strong>Sukses! </strong>
						{{ session('success') }} 
				</div>
			@endif
			@if(session('eror'))
				<div class="alert alert-danger">
						<strong>Gagal! </strong>
						{{ session('eror') }} 
				</div>
			@endif
			<table class="table table-striped table-bordered table-advance table-hover" id="table_riwayatPenjualan">
				<thead>
					<tr>
						<th width="15%">
							No Nota
						</th>
						<th width="15%">
							Tanggal Transaksi
						</th>
						<th width="22%">
							Konsumen
						</th>
						<th width="20%">
							Karyawan
						</th>
						<th width="20%">
							Total Harga
						</th>
						<th width="8%">
							Actions
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $d)
					<tr>
						<td class="col text-center">{{ $d->id }}</td>
						<td>{{ $d->tanggalPenjualan }}</td>
						<td>{{ $d->Konsumen->namaPemesan }} 
							@if(isset($d->Konsumen->namaToko))
								( {{ $d->Konsumen->namaToko }} )
							@endif
						</td>
						<td>{{ $d->karyawan->namaDepan }} {{ $d->karyawan->namaBelakang }}</td>
						<td>Rp. {{ $d->totalHarga }}</td>
						<td>
							<a href="{{ route('notaPenjualan', $d->id) }}" class="btn btn-xs btn-default"><i class="fa fa-search"></i> 
								Detail
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('tempat_script')
<script>


</script>
@endsection
