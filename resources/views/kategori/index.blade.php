@extends('layouts.app')

@section('content')
  <div class="container">
      <h3 class="m-0 font-weight-bold text-primary">DAFTAR KATEGORI BARANG</h3>

	<tr>
      <a href="{{ route('kategori.tambah') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
	</tr>		
      
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
							
            </tr>
          </thead>
          <tbody>
          	@php($no = 1)
            @foreach($kategori as $row)
			   <tr>
				    <th>{{ $no++ }}</th>
				    <td>{{ $row->nama }}</td>

                <td>
                  <a href="{{ route('kategori.tambah.update', $row->id) }}" class="btn btn-warning">Edit</a>               
                  <a href="{{ route('kategori.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
             </tr>
            @endforeach
          </tbody>
        </table>
    </div> 
@endsection
