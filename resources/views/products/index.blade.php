@extends('layouts.main')

@section('content-section')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Products /</span> Index</h4>
        <div class="row">
            <div class="col-12">
                @include('layouts.alert')
            </div>
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Products</h5>
            <div class="demo-inline-spacing px-3">
                <a href="{{ route('products.create') }}" type="button" class="btn btn-primary text-white">
                    <span class="tf-icons bx bx-layer-plus"></span> Add Product
                </a>
            </div>
            <div class="table-responsive text-nowrap p-3">
                <table class="table" id="datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $product->name }}</strong>
                                </td>
                                <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->category }}</td>
                                <td><img src="{{ $product->image }}" alt="image" height="30"></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
