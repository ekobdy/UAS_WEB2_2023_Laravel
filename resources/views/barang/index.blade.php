@extends('layouts.app')

@section('content')
  <div class="container">
      <h3 class="m-0 font-weight-bold text-primary">DAFTAR INVENTORI BARANG</h3>
    
    <tr>
		<td>
		<form class="form" method="POST" action="{{ route('barang.search') }}">
			@csrf
		    <div class="form-group w-100 mb-3">
		        <input type="text" name="keyword" class="form-control w-75 d-inline" id="search" placeholder="cari disini">
		        <button type="submit" class="btn btn-primary mb-1">Cari</button>
		    </div>
		</form>
		</td>		
	</tr>

	<tr>
      <a href="{{ route('barang.tambah') }}" class="btn btn-primary mb-3">Tambah Barang</a>
	</tr>		
      
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Aksi</th>
							
            </tr>
          </thead>
          <tbody>
          	@php($no = 1)
            @foreach($data as $row)
			<tr>
				<th>{{ $no++ }}</th>
				<td>{{ $row->kode_barang }}</td>
				<td>{{ $row->nama_barang }}</td>
				<td>{{ $row->kategori->nama }}</td>
				<td>{{ $row->harga }}</td>
				<td>{{ $row->jumlah }}</td>
                <td>
                  <a href="{{ route('barang.edit.update', $row->id) }}" class="btn btn-warning">Edit</a>               
                  <a href="{{ route('barang.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
             </tr>
            @endforeach
          </tbody>
        </table>
    </div> 
@endsection