@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Barang</div>

                    <div class="card-body">
                        <a href="{{ route('product.my') }}" class="btn btn-warning">Kembali</a>
                        <br>
                        <br>
                        <form method="POST" action="{{ route('editproses', ['id' => $product->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode"
                                    placeholder="Silahkan Masukkan Kode Barang" value="{{ old('kode', $data->kode) }}" />
                                    @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    placeholder="Silahkan Masukkan Nama Barang" value="{{ old('nama', $data->nama )}}" />
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" min="1" name="jumlah"
                                    placeholder="Silahkan Masukkan Jumlah Barang" value="{{ old('jumlah', $data->stok) }}" />
                                    @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <input type="submit" value="SIMPAN" class="btn btn-primary w-100 mt-3" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
