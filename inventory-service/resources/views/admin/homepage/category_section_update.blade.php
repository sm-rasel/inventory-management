@extends('layout.admin.master')
@section('title')
    Item add
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Item Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Page Settings</a></li>
                        <li class="breadcrumb-item active">Item</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Type Form</h4>
                <form action="{{ route('admin.category_update', ['id' => $category->id]) }}" method="POST" id=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Category Name
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type_id">
                                <option>-- Select Type --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $category->product_id ? 'selected' : '' }}>{{ $product->p_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Category Name
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="c_name" value="{{ $category->c_name }}" id=""
                                   placeholder="Enter Category Name"/>
                            @if($errors->has('c_name'))
                                <span class="error" id="">{{ $errors->first('c_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Category Quantity
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="c_qty" value="{{ $category->c_qty }}" id=""
                                   placeholder="Enter Quantity"/>
                            @if($errors->has('c_qty'))
                                <span class="error" id="sliderDescriptionError">{{ $errors->first('c_qty') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="">Update Category
                            </button>
                            <button type="reset" class="btn btn-outline-danger w-md px-3"
                                    onclick="window.location.href='{{ route('admin.category_index') }}'">Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection
