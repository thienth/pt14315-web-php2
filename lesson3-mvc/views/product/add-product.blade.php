@extends('layouts.admin')
@section('title', "Thêm sản phẩm")
@section('content')
    <style>
        .preview-img{
            min-height: 137px;
            border: 1px solid #ccc;
        }
        .product-form{
            margin-top: 50px;
        }
        .form-group label.error{
            color: indianred;
        }
    </style>

    <form id="add-product-form" action="<?php echo BASE_URL . 'products/save-product'?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="cate_id" class="form-control">
                        <?php foreach ($cates as $ca):?>
                            <option value="<?php echo $ca->id?>"><?php echo $ca->cate_name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" name="price" placeholder="Nhập giá sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Số lượng views</label>
                    <input type="number" name="views" placeholder="Nhập số lượt xem sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="short_desc" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="preview-img row">
                    <div class="col-8 offset-2">
                        <img class="img-preview img-fluid" src="<?= BASE_URL . 'public/images/default-img.jpg'?>" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input onchange="encodeImageFileAsURL(this)" type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="form-control" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary" type="submit">Lưu</button>&nbsp;
            <a href="<?php echo BASE_URL . 'san-pham'?>" class="btn btn-sm btn-danger">Hủy</a>
        </div>
    </form>

@endsection
@section('js')
    <script>

        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $(".preview-img img").attr('src', "<?= BASE_URL . 'public/images/default-img.jpg'?>");
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
        $('#add-product-form').validate({
            rules:{
                name: {
                    // checkProductName: true,
                    required: true,
                    rangelength: [4, 20],
                    remote: {
                        url: "<?= BASE_URL . 'check-product-existed'?>",
                        type: "post",
                        data:
                            {
                                name: function()
                                {
                                    return $('#add-product-form :input[name="name"]').val();
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