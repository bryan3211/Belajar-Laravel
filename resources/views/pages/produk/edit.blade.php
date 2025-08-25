@extends('layouts.master')

@section('konten')
    <div class="card">
      <div class="card-header">Update data produk</div>
      <div class="card-body">
        <form action="/product/{{ $data->id_produk }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-6">
                    <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $data->nama_produk) }}">
          @error('nama_produk')
          <div id="emailHelp" class="form-text-danger">{{ $message }}</div>
          @enderror
            </div>
            </div>
            <div class="col-sm-6">
                    <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="harga_produk" class="form-control" value="{{ old('harga_produk', $data->harga) }}">
                    @error('harga_produk')
          <div id="emailHelp" class="form-text-danger">{{ $message }}</div>
          @enderror
            </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
           <textarea class="form-control" name="deskripsi_produk" placeholder="Leave a comment here" style="height: 100px">{{ old('deskripsi_produk', $data->deskripsi_produk) }}</textarea>
            <label for="floatingTextarea2">Deskripsi Produk</label>
            </div>
            @error('deskripsi_produk')
           <div id="emailHelp" class="form-text-danger">{{   $message }}</div>
           @enderror
            </div>
            <div class="col-sm-12 mt-3">
              <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
          </div>
      </form>
      </div>
    </div>
@endsection