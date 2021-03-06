@extends('admin_layout');
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Sản Phẩm
            </header>

            <div class="panel-body">
            @foreach($edit_product as $key=> $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-product', $edit_value->product_id)}}" method="post" enctype="multipart/form-data">
                    
                    {{ csrf_field() }}
                    <?php
	$message = Session::get('message');
	if($message){
		echo $message;
		Session::get('message',null);
    }
    else
    echo null;
	?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản phẩm</label>
                            <input name="product_name" class="form-control" value="{{$edit_value->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea name="product_desc" class="form-control"
                                placeholder="Mô tả danh mục">{{$edit_value->product_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <textarea name="product_content" class="form-control"
                                placeholder="Mô tả danh mục">{{$edit_value->product_content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá tiền</label>
                            <textarea name="product_price" class="form-control"
                                placeholder="Mô tả danh mục">{{$edit_value->product_price}}</textarea>
                        </div>

                        <div class="form-group">
                        <label for="exampleInput">Danh mục</label>
                            <select name="category_product" class="form-control input-sm m-bot15">
                                @foreach($category_product as $key => $cate)
                                @if($cate->category_id==$edit_value->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="exampleInput">Thương Hiệu</label>
                            <select name="brand_product" class="form-control input-sm m-bot15">
                            @foreach($brand_product as $key => $brand)
                            @if($brand->brand_id==$edit_value->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input name="product_image" type="file" id="exampleInputFile">
                            <img src="{{URL::to('public/upload/product/'.$edit_value->product_image)}}" height="100" width="100">
                        </div>

                        <button type="submit" name="update_product" class="btn btn-info">Update</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>

@endsection