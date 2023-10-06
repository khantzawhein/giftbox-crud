@extends('layout')

@section('title', 'Create Product')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="card-title mb-4">Add New Product</h5>
                </div>
                <div>
                    <a href="{{route("products.index")}}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>
                        Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 required">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3 required">
                            <label for="product_type">Product Type</label>
                            <input type="text" class="form-control" id="product_type" name="product_type" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_description">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
                        </div>
                        <div class="mb-3 required">
                            <label for="product_price">Product Price</label>
                            <input type="number" step="0.01" class="form-control" id="product_price"
                                   name="product_price" required>
                        </div>
                        <div class="mb-3 required">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image"
                                   accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
