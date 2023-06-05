@extends('layout.admin.master')

@section('title')
    Inventory Section
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Inventory Area</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory Area</a></li>
                        <li class="breadcrumb-item active">Inventory Section</li>
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
                    <h4 class="card-title mb-3 mb-md-5">Inventory Section
                        <button class="btn btn-sm btn-outline-success w-md float-end"
                                onclick="window.location.href='{{ route('admin.inventory_add') }}'">
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
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Category Quantity</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{--                        @foreach($categories as $category)--}}
                        {{--                            <tr>--}}
                        {{--                                <td class="text-center">{{ $loop->iteration }}</td>--}}
                        {{--                                <td class="text-center">{{ $category->product->p_name }}</td>--}}
                        {{--                                <td class="text-center">{{ $category->c_name }}</td>--}}
                        {{--                                <td class="text-center">{{ $category->c_qty }}</td>--}}
                        {{--                                <td class="text-center">--}}
                        {{--                                    @if($category->c_status == 1)--}}
                        {{--                                        <span class="badge rounded-pill badge-soft-success">Active</span>--}}
                        {{--                                    @else--}}
                        {{--                                        <span class="badge rounded-pill badge-soft-danger">Inactive</span>--}}
                        {{--                                    @endif--}}
                        {{--                                </td>--}}
                        {{--                                <td class="text-center">--}}
                        {{--                                    <button class="btn btn-sm btn-outline-success" title="Edit Slider Section" onclick="window.location.href='{{ route('admin.category_edit', ['id' => $category->id]) }}'">--}}
                        {{--                                        <i class="fas fa-edit"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                    <button type="button" class="btn btn-sm btn-outline-warning" data-id="{{ $category->id }}" data-action="{{ route('admin.category_status_update', ['id' => $category->id]) }}" onclick="updateCategoryStatus({{$category->id}})" title="Active Status">--}}
                        {{--                                        @if($category->c_status == 1)--}}
                        {{--                                            <i class="fas fa-times"></i>--}}
                        {{--                                        @else--}}
                        {{--                                            <i class="fas fa-check"></i>--}}
                        {{--                                        @endif--}}
                        {{--                                    </button>--}}
                        {{--                                    <button type="button" class="btn btn-sm btn-outline-danger" {{ $category->i_status == 1 ? 'disabled': '' }} data-id="{{ $category->id }}" data-action="{{ route('admin.category_delete', ['id' => $category->id]) }}" onclick="deleteCategory({{ $category->id }})" title="Delete Section">--}}
                        {{--                                        <i class="fas fa-trash"></i>--}}
                        {{--                                    </button>--}}
                        {{--                                </td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
