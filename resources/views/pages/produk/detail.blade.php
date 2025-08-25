@extends('layouts.master')

@section('konten')
    <h1>Detail Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
  <div class="card-body">
    <img src="https://placehold.co/600x400" class="img-fluid" alt="">
    <p>Nama Produk : {{ $produk->nama_produk }}</p>
    <p>Harga : Rp. {{ $produk->harga }}</p>
    <p>Deskripsi : {{ $produk->deskripsi_produk }}</p>
    <p>Kategori : Barang Elektronik </p>
    <p>Stok : Tersedia 3 </p>
    <form action="/product/{{ $produk->id_produk }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Produk</button>
    </form>
    <a href="/product" class="btn btn-primary mt-2">Kembali Ke Produk</a>
</div>
@endsection