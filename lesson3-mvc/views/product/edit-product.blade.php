@extends('layouts.admin')
@section('title', 'Cập nhật thông tin sản phẩm')
@section('content')
    <style>
        .preview-img{
            min-height: 137px;
            border: 1px solid #ccc;
        }
        .product-form{
            margin-top: 50px;
        }
    </style>

    <form id="edit-product-form" action="{{BASE_URL . 'products/save-edit-product'}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{$model->id}}">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" placeholder="Nhập tên sản phẩm"
                           value="{{$model->name}}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="cate_id" class="form-control">
                        @foreach ($cates as $ca)
                            <option
                                    @if($ca->id == $model->cate_id)
                                        selected
                                    @endif
                                    value="{{$ca->id}}">{{$ca->cate_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" name="price" placeholder="Nhập giá sản phẩm"
                           value="{{$model->price}}}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Số lượng views</label>
                    <input type="number" name="views" placeholder="Nhập số lượt xem sản phẩm"
                           value="{{$model->views}}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="short_desc" class="form-control" rows="5">{!! $model->short_desc !!}</textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="preview-img row">
                    <div class="col-8 offset-2">
                        <img class="img-preview img-fluid" src="{{BASE_URL . $model->image}}" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input onchange="encodeImageFileAsURL(this)" type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="form-control" rows="10">{!! $model->detail !!}</textarea>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Lưu</button>&nbsp;
            <a href="{{ BASE_URL . 'products'}}" class="btn btn-sm btn-danger">Hủy</a>
        </div>
    </form>
@endsection
@section('js')
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $(".preview-img img").attr('src', "{{BASE_URL . $model->image}}");
            }else{
                var reader = new FileReader();
                reader.onloadend = function() {
                    if(reader.result){
                        $(".preview-img img").attr('src', reader.result);
                    }
                }
                reader.readAsDataURL(file);
            }
        }

        // tên sp: phải nhập
        // độ dài tối đa = 50

        // giá: phải nhập
        // giá tối thiểu: 1
        // lượt views: o bắt buộc nhập
        // nếu nhập thì phải là số dương

        // ảnh: bắt buộc nhập
        // định dạng ảnh (chỉ cho phép nhập các file đuôi jpg, png, jpeg, gif)
        $('#edit-product-form').validate({
            rules:{
                name: {
                    // checkProductName: true,
                    required: true,
                    rangelength: [4, 20],
                    remote: {
                        url: "{{BASE_URL . 'products/check-product-existed'}}",
                        type: "post",
                        dataType: "json",
                        data: {
                            name:  function(){
                                return $("[name='name']").val()
                            }
                        }
                    }
                },
                price: {
                    required: true,
                    min: 1
                }
            },
            messages:{
                name: {
                    required: 'Vui lòng nhập tên sản phẩm',
                    rangelength: "Tên sản phẩm nằm trong khoảng 4-20 ký tự",
                    remote: "Tên sản phẩm đã tồn tại, vui lòng chọn tên khác"
                },
                price: {
                    required: 'Vui lòng nhập giá sản phẩm',
                    min: "Giá sản phẩm ít nhất bằng 1"
                }
            }
        });
    </script>
@endsection