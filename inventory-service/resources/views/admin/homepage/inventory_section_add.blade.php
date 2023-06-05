@extends('layout.admin.master')
@section('title')
    Inventory add
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Inventory Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Page Settings</a></li>
                        <li class="breadcrumb-item active">Inventory</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Product Form</h4>
                <form class="w-px-500 p-3 p-md-3" action="{{ route('admin.inventory_store') }}" method="post">
                    @csrf
                    <div class="row clone-row">
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Product</label>
                            <select class="form-control form-control-sm" name="product_id[]" onchange="getAllCategory(this.value)">
                                <option>-- Select Category --</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->p_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Category</label>
                            <select type="text" name="category_id[]" class="form-control form-control-sm" id="categoryId">
                                <option>-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->c_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Stock Amount</label>
                            <input type="text" name="stc_amount[]" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-1" style="margin-top:27px;">
                            <span class="btn btn-danger btn-xs pull-right btn-del-select py-0">Remove</span>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-left: 5px;">
                        <span class="btn btn-secondary btn-xs add-select py-0">Add More</span>
                    </div>
                    <button type="submit" class="btn btn-success float-end">Submit</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

@endsection

@section('script_js')
    <script type="text/javascript">
        $('.btn-del-select').hide();
        $(document).on('click','.add-select', function(){
            $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass("clone-row");
            $('.btn-del-select').fadeIn();
            $(this).parent().parent().find(".btn-del-select").click(function(e) {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection
