@extends('layouts.master')

@section('konten')
    <h1>Daftar Produk</h1>
    <hr>
    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="alert alert-primary">
      <b>Nama Toko : </b> {{$data_toko['nama_toko']}}
      <br>
      <b>Alamat : </b> {{$data_toko['alamat']}}
      <br>
      <b>Tipe Toko : </b> {{$data_toko['type']}}
    </div>
    @if (session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
    
    @endif
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Detail Produk</span>
            <form class="d-flex" method="GET" action="/product">
                <input type="text" name="q" class="form-control me-2" placeholder="Cari data produk" value="{{ isset($query) ? $query : '' }}">
                <button class="btn btn-success btn-sm d-flex align-items-center" type="submit" style="white-space: nowrap;">
                  <i class="bi bi-search me-1" style="font-size: 1rem;"></i><span class="d-inline-block">Cari Data</span>
                </button>
            </form>
    </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
    <th scope="col">Harga</th>
    <th scope="col">Deskripsi Produk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if(count($data_produk) > 0)
      @foreach ($data_produk as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->nama_produk }}</td>
        <td>{{ $item->harga }}</td>
        <td>{{ $item->deskripsi_produk }}</td>
        <td>
          <button type="button" class="btn btn-danger btn-hapus" 
            data-id="{{ $item->id_produk }}" 
            data-nama="{{ $item->nama_produk }}"
            data-bs-toggle="modal" data-bs-target="#modalHapus">
            Hapus
          </button>
          <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning">Edit</a>
          <a href="/product/{{ $item->id_produk }}" class="btn btn-info">Detail</a>
        </td>
      </tr>
      @endforeach
    @else
      <tr>
        <td colspan="5" class="text-center text-danger">Data tidak ditemukan.</td>
      </tr>
    @endif
  </tbody>
</table>
  </div>
</div>
<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHapusLabel">Konfirmasi!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modalHapusText">Apakah anda yakin ingin menghapus produk ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form id="formHapus" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modalHapus = document.getElementById('modalHapus');
    var formHapus = document.getElementById('formHapus');
    var modalHapusText = document.getElementById('modalHapusText');
    var hapusButtons = document.querySelectorAll('.btn-hapus');
    hapusButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var nama = this.getAttribute('data-nama');
            formHapus.action = '/product/' + id;
            modalHapusText.textContent = 'Apakah anda yakin ingin menghapus produk ' + nama + '??';
        });
    });
});
</script>
@endsection