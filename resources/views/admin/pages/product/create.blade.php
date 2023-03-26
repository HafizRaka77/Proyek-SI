@extends('admin.layout.main')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            @if (session()->has('failedAddProduct'))
                <div class="alert alert-danger alert-dismissible mt-3 mx-3 fade show py-3 px-3 position-fixed-alert" role="alert">
                    {{ session('failedAddProduct') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <h3 class="card-title">Buat Produk Baru</h3>
                <form class="forms-sample" method="POST" action="{{ route('product.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Produk</label>
                        <input value="{{ old('title') }}" autofocus type="text"
                            class="form-control @error('title') is-invalid @enderror text-light" name="title"
                            id="title" placeholder="Nama Produk" required>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi Produk</label>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                        <trix-editor class="text-light" input="desc"></trix-editor>
                    </div>
                    <div class="form-group mt-2">
                        <label for="price">Harga</label>
                        <input value="{{ old('price') }}" required type="number"
                            class="form-control @error('price') is-invalid @enderror text-light" name="price"
                            id="price" placeholder="Harga">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="price">Link</label>
                        <input value="{{ old('link') }}" required type="url"
                            class="form-control @error('link') is-invalid @enderror text-light" name="link"
                            id="link" placeholder="Link">
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="size">Ukuran</label>
                        <div class="row @error('size') is-invalid @enderror">
                            <div class="col-1">
                                <input type="checkbox" value="S" name="size[]" id="size" class="form-check-input">&nbsp;
                                S</label>
                            </div>
                            <div class="col-1">
                                <input type="checkbox" value="M" name="size[]" id="size" class="form-check-input">&nbsp;
                                M</label>
                            </div>
                            <div class="col-1">
                                <input type="checkbox" value="L" name="size[]" id="size" class="form-check-input">&nbsp;
                                L</label>
                            </div>
                            <div class="col-1">
                                <input type="checkbox" value="XL" name="size[]" id="size" class="form-check-input">&nbsp;
                                XL</label>
                            </div>
                            <div class="col-1">
                                <input type="checkbox" value="XXL" name="size[]" id="size" class="form-check-input">&nbsp;
                                XXL</label>
                            </div>
                        </div>
                        @error('size')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-form-label">Foto Produk</label>
                        <div class="col-sm-12 col-md-7 col-lg-12">
                            <div id="image-preview" class="image-preview">
                                <center>
                                    <img id="preview-image" class="mx-auto my-2 text-center" width="300px">
                                </center>
                                <div class="input-group col-xs-12">
                                    <input type="file" name="image" id="image"
                                        class="form-control file-upload-info text-light" placeholder="Upload Foto Produk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        // Alert Confrimation
        // Show Image
        $(document).ready(function(e) {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
