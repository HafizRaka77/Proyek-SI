@extends('admin.layout.main')
@section('content')
    @if (session()->has('createdProduct'))
        <div class="alert alert-success alert-dismissible mt-3 mx-3 fade show py-3 px-3 position-fixed-alert" role="alert">
            {{ session('createdProduct') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('updateProduct'))
        <div class="alert alert-success alert-dismissible mt-3 mx-3 fade show py-3 px-3 position-fixed-alert" role="alert">
            {{ session('updateProduct') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('deleteProduct'))
        <div class="alert alert-success alert-dismissible mt-3 mx-3 fade show py-3 px-3 position-fixed-alert" role="alert">
            {{ session('deleteProduct') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('failedDeleteProduct'))
        <div class="alert alert-danger alert-dismissible mt-3 mx-3 fade show py-3 px-3 position-fixed-alert" role="alert">
            {{ session('failedDeleteProduct') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="card-title">Daftar Produk</h2>
                                <p class="card-description">Produk Bisa Dirubah Sesuai Keinginan</p>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('product.create') }}" type="button" class="btn btn-primary btn-fw">Tambah
                                    Produk</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-light fw-bold">Produk</th>
                                        <th class="text-light fw-bold">Harga</th>
                                        <th class="text-light fw-bold">Ukuran</th>
                                        <th class="text-light fw-bold">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($data->count() > 0)
                                        @foreach ($data as $items)
                                            <tr>
                                                <td class="text-white-50">{{ $items->title }}</td>
                                                <td class="text-white-50">Rp.
                                                    {{ number_format($items->price, 2, ',', '.') }}</td>
                                                <td class="text-white-50">{{ implode(', ', $items->size) }}</td>
                                                <td class="d-flex gap-3">
                                                    {{-- <a href="{{ route('product.show', $items->id) }}" type="button"
                                                        class="btn btn-outline-primary">Lihat</a> --}}
                                                    <a href="{{ route('product.edit', $items->id) }}" type="button"
                                                        class="btn btn-outline-success">Lihat / Edit</a>
                                                    <button data-id="{{ $items->id}}" type="button" class="btn btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $items->id }}">Hapus</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $items->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">
                                                                        Konfirmasi Hapus</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-light">
                                                                    Apakah anda yakin ingin menghapus data ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Kembali</button>
                                                                    <form action="{{ route('product.delete', $items->id) }}" method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center text-danger">Data produk tidak ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="px-4 pt-4">
                                {!! $data->links('vendor.pagination.custom') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
