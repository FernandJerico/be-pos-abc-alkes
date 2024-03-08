@extends('layouts.main')

@section('content-section')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Products/</span> Add</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Product Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    id="name" placeholder="John Doe" name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    placeholder="Enter description product" name="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input type="text"
                                    class="form-control @error('price')
                                is-invalid
                            @enderror"
                                    placeholder="Enter price" name="price" value="{{ old('price') }}" />
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="stock">Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    placeholder="Enter stock" name="stock" value="{{ old('stock') }}" />
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="alat ukur" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Alat Ukur</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="alat bantu" class="selectgroup-input">
                                        <span class="selectgroup-button">Alat Bantu</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="alat respirasi"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Alat Respirasi</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="alat pemulihan"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Alat Pemulihan</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="strerilisasi"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Strerilisasi</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="perawatan pribadi"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">Perawatan Pribadi</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="first aid" class="selectgroup-input">
                                        <span class="selectgroup-button">First Aid</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
