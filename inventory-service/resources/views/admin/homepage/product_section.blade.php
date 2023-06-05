@extends('layout.admin.master')

@section('title')
    Product Section
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product Area</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Area</a></li>
                        <li class="breadcrumb-item active">Product Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 mb-md-5">Product Section
                        <button class="btn btn-sm btn-outline-success w-md float-end" onclick="window.location.href='{{ route('admin.product_add') }}'">
                            <span class="font-size-12">
                                <i class="fas fa-plus"></i>
                                Create new
                            </span>
                        </button>
                    </h4>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $product->p_name }}</td>
                                <td class="text-center">
                                    @if($product->p_status == 1)
                                        <span class="badge rounded-pill badge-soft-success">Active</span>
                                    @else
                                        <span class="badge rounded-pill badge-soft-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-success" title="Edit Slider Section" onclick="window.location.href='{{ route('admin.product_edit', ['id' => $product->id]) }}'">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-id="{{ $product->id }}" data-action="{{ route('admin.product_status_update', ['id' => $product->id]) }}" onclick="updateProductStatus({{$product->id}})" title="Active Status">
                                        @if($product->p_status == 1)
                                            <i class="fas fa-times"></i>
                                        @else
                                            <i class="fas fa-check"></i>
                                        @endif
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" {{ $product->p_status == 1 ? 'disabled': '' }} data-id="{{ $product->id }}" data-action="{{ route('admin.product_delete', ['id' => $product->id]) }}" onclick="deleteproduct({{ $product->id }})" title="Delete Section">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
