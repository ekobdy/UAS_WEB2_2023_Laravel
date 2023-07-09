@extends('layouts.app')

@section('content')
  <div class="container">
      <h3 class="m-0 font-weight-bold text-primary">HASIL CARI BARANG</h3>
    	
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
            @forelse($results as $row)
			   <tr>
				    <th>{{ $no++ }}</th>
				    <td>{{ $row->kode_barang }}</td>
				    <td>{{ $row->nama_barang }}</td>
				    <td>{{ $row->kategori->nama }}</td>
				    <td>{{ $row->harga }}</td>
				    <td>{{ $row->jumlah }}</td>
             <td>
                  <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-warning">Edit</a>               
                  <a href="{{ route('barang.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>   
          </tr>
            @empty
          <tr>
            <td colspan="7">Tidak ada hasil pencarian.</td>
          </tr>
            @endforelse
          </tbody>
        </table>
    </div> 
@endsection
