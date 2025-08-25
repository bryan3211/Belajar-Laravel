@extends('layouts.master')

@section('konten')
    <div class="card">
      <div class="card-header">Tambah data produk</div>
      <div class="card-body">
        <form action="/product" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-6">
                    <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
          @error('nama_produk')
          <div id="emailHelp" class="form-text-danger">{{ $message }}</div>
          @enderror
            </div>
            </div>
            <div class="col-sm-6">
                    <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="harga_produk" class="form-control"  >
                    @error('harga_produk')
          <div id="emailHelp" class="form-text-danger">{{ $message }}</div>
          @enderror
            </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
           <textarea class="form-control" name="deskripsi_produk" placeholder="Leave a comment here" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Deskripsi Produk</label>
            </div>
            @error('deskripsi_produk')
           <div id="emailHelp" class="form-text-danger">{{   $message }}</div>
           @enderror
            </div>
            <div class="col-sm-12 mt-3">
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
          </div>
      </form>
      </div>
    </div>
@endsection