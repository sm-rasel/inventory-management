// Product Section start
function updateProductStatus(id){
    swal({
        title: 'Are You Sure ?',
        text: "This Product Will be Visible !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "product-status-update/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true)
                    {
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500);
                    }
                    else
                    {
                        toastr.error(result.message);
                    }
                }
            });
        }
        else
        {
            e.dismiss;
        }
    }, function (dismiss){
        return false;
    });
}
function deleteproduct(id){
    swal({
        title: 'Are You Sure !',
        text: "You won't Be able to revert this !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "product-delete/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true){
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500)
                    }else {
                        toastr.error(result.message);
                    }
                }
            });
        }else {
            e.dismiss;
        }
    },function (dismiss){
        return false;
    });
}

 // Product Section End

 // Category Section Start
function updateCategoryStatus(id){
    swal({
        title: 'Are You Sure ?',
        text: "This Category Will be Active !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "category-status-update/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true)
                    {
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500);
                    }
                    else
                    {
                        toastr.error(result.message);
                    }
                }
            });
        }
        else
        {
            e.dismiss;
        }
    }, function (dismiss){
        return false;
    });
}

function deleteCategory(id){
    swal({
        title: 'Are You Sure !',
        text: "You won't Be able to revert this !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "category-delete/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true){
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500)
                    }else {
                        toastr.error(result.message);
                    }
                }
            });
        }else {
            e.dismiss;
        }
    },function (dismiss){
        return false;
    });
}
// Category Section Start

function getAllCategory(productId)
{
    $.ajax({
        type: 'GET',
        url: "get-all-category",
        data: {id: productId},
        dataType: 'JSON',
        success: function (response){
            var option = '';
            option += '<option> -- Select Category --</option>';
            $.each(response, function (key, value) {
                option += '<option value="'+value.id+'">'+value.c_name+'</option>'
            })
            var categoryId = $('#categoryId');
            categoryId.empty();
            categoryId.append(option);
        }
    });
}


