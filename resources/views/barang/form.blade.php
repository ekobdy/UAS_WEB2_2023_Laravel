@extends('layouts.app')

@section('content')
  
  <form action="{{ isset($barang) ? route('barang.edit.update', $barang->id) : route('barang.tambah.simpan') }}" method="post">


    @csrf

    @if (isset($barang))
      @method('PUT')
    @endif

    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kode_barang">Kode Barang</label>
              <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo isset($barang) ? $barang->kode_barang : '';?>">
            </div>
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo isset($barang) ? $barang->nama_barang : '' ;?>">
            </div>
            <div class="form-group">
              <label for="id_kategori">Kategori Barang</label>
							<select name="id_kategori" id="id_kategori" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kategori --</option>
								@foreach ($kategori as $row)
									<option value="{{ $row->id }}" {{ isset($barang) ? ($barang->id_kategori == $row->id ? 'selected' : '') : '' }}>{{ $row->nama }}</option>
								@endforeach
							</select>
            </div>
            <div class="form-group">
              <label for="harga">Harga Barang</label>
              <input type="number" class="form-control" id="harga" name="harga" value="<?php echo isset($barang) ? $barang->harga : '' ;?>">
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah Barang</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo isset($barang) ? $barang->jumlah : '' ;?>">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
