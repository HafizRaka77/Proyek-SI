@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Daftar Produk</h2>
                        <p class="card-description">Produk Bisa Dirubah Sesuai Keinginan</p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $items)
                                        <tr>
                                            <td>{{ $items->title }}</td>
                                            <td>Rp. {{ $items->price }}</td>
                                            <td>{{ implode(", ", $items->size) }}</td>
                                            <td><label class="badge badge-danger">Pending</label></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
