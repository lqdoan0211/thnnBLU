@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm khóa học
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-khoahoc')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Môn học</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khóa học</label>
                                    <input type="text" data-validation="text" data-validation-length="min10" data-validation-error-msg="Vui lòng điền ít nhất 10 ký tự" name="khoahoc_name" class="form-control" id="exampleInputEmail1" placeholder="Tên khóa học">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh khóa học</label>
                                    <input type="file" name="khoahoc_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày khai giảng</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Vui lòng điền ngày khai giảng cho khóa học" name="khoahoc_ngaykhaigiang" class="form-control" id="exampleInputEmail1" placeholder="Ngày khai giảng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian học</label>
                                    <input type="text" name="khoahoc_thoigianhoc" class="form-control" id="exampleInputEmail1" placeholder="Thời gian học cho khóa học">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời lượng học</label>
                                    <input type="text" data-validation="text" data-validation-error-msg="Vui lòng điền thời lượng cho khóa học" name="khoahoc_thoiluonghoc" class="form-control" id="exampleInputEmail1" placeholder="Thời lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Học phí</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Vui lòng điền thời lượng cho khóa học" name="khoahoc_hocphi" class="form-control" id="exampleInputEmail1" placeholder="Học phí">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa điểm</label>
                                    <input type="text" data-validation="text" data-validation-error-msg="Vui lòng điền thời lượng cho khóa học" name="khoahoc_diadiem" class="form-control" id="exampleInputEmail1" placeholder="Địa điểm">
                                </div>
                                  
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin khóa học</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="khoahoc_thongtin" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đề cương khóa học</label>
                                    <input type="file" name="filedown" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="khoahoc_status" class="form-control input-sm m-bot15">
                                            <option value="1">Ẩn</option>
                                            <option value="0">Hiển thị</option>
                                            
                                    </select>
                                </div>
                                <button type="submit" name="add_khoahoc" class="btn btn-info">Thêm khóa học</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection