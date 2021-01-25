@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật khóa học
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
                                @foreach($edit_khoahoc as $key => $kh)
                                <form role="form" action="{{URL::to('/update-khoahoc/'.$kh->khoahoc_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Môn học</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$kh->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khóa học</label>
                                    <input type="text" name="khoahoc_name" class="form-control" id="exampleInputEmail1" value="{{$kh->khoahoc_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh khóa học</label>
                                    <input type="file" name="khoahoc_image" class="form-control" id="exampleInputEmail1" value="{{$kh->khoahoc_image}}">
                                    <img src="{{URL::to('public/uploads/khoahoc/'.$kh->khoahoc_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày khai giảng</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="khoahoc_ngaykhaigiang" class="form-control" id="exampleInputEmail1" value="{{$kh->ngay_khaigiang}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian học</label>
                                    <input type="text" name="khoahoc_thoigianhoc" class="form-control" id="exampleInputEmail1" value="{{$kh->thoigian_hoc}}">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Thời lượng học</label>
                                    <input type="text" value="{{$kh->thoiluong_hoc}}" name="khoahoc_thoiluonghoc" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Học phí</label>
                                    <input type="text" name="khoahoc_hocphi" class="form-control" id="exampleInputEmail1" value="{{$kh->hoc_phi}}">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Địa điểm</label>
                                    <input type="text" value="{{$kh->dia_diem}}" name="khoahoc_diadiem" class="form-control" id="exampleInputEmail1" >
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin khóa học</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="khoahoc_thongtin" id="exampleInputPassword1" >{{$kh->chi_tiet}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đề cương khóa học</label>
                                    <input type="file" name="filedown" class="form-control" id="exampleInputEmail1" value="{{$kh->filedown}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="khoahoc_status" class="form-control input-sm m-bot15">
                                            <option value="1">Ẩn</option>
                                            <option value="0">Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="edit_khoahoc" class="btn btn-info">Cập nhật khóa học</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection