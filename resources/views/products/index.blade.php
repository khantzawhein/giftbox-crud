@extends('layout')

@section('title', 'Products')

@section('content')
    <form action="" method="POST" id="deleteProductForm">
        @csrf
        @method('DELETE')
    </form>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="card-title mb-4">Products</h5>
                </div>
                <div>
                    <a href="{{route('products.create')}}" class="btn btn-success">Create <i class="bi bi-plus"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_type}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>
                                    <div style="width: 100px">
                                        <img class="img-thumbnail rounded" style="max-height: 150px"
                                             src="{{$product->product_image ? Storage::url($product->product_image) : ""}}"
                                             alt="Product Image">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('products.edit', $product->product_id)}}"
                                           class="btn btn-sm btn-primary me-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" data-id="{{$product->product_id}}"
                                                class="btn btn-sm btn-danger delete-btn">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            $(".delete-btn").click(function () {
                let id = $(this).data("id");
                let url = "{{route('products.destroy', ':id')}}";
                url = url.replace(':id', id);
                $("#deleteProductForm").attr("action", url);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel it!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#deleteProductForm").submit();
                    }
                })
            });
        });
    </script>

@endpush
