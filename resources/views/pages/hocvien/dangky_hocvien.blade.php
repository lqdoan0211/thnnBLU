@extends('layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           <h2 style="text-align: center; font-size: 20px">CẬP NHẬT THÔNG TIN HỌC VIÊN</h2>
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($edit_hocvien as $key => $kh)
                                <form role="form" action="{{URL::to('/update-hocvien/'.$kh->customer_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" name="customer_name" class="form-control" id="okok" value="{{$kh->customer_name}}" readonly="true" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh học viên</label>
                                    <input type="file" name="customer_image" class="form-control" id="okok" value="{{$kh->customer_image}}" >
                                    <img src="{{URL::to('public/uploads/hocvien/'.$kh->customer_image)}}" height="100" width="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giới tính</label>
                                      <select name="customer_phai" class="form-control input-sm m-bot15">
                                            <option >nam</option>
                                            <option >nữ</option>
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="customer_ngaysinh" class="form-control" id="test05" value="{{$kh->customer_ngaysinh}}" readonly="true" required>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số chứng minh nhân dân</label>
                                    <input type="text" name="customer_cmnd" class="form-control" id="test01" value="{{$kh->customer_cmnd}}" readonly="true" required>
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$kh->customer_email}}" name="customer_email" class="form-control" id="test03" readonly="true" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">password</label>
                                    <input type="password" name="customer_password" class="form-control" id="test012" value="{{$kh->customer_password}}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="customer_phone" class="form-control" id="test02" value="{{$kh->customer_phone}}" readonly="true" required>
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$kh->customer_diachi}}" name="customer_diachi" class="form-control" id="test04" readonly="true" required>
                                </div>

                                 <a class="btn btn-success" onclick="nhapData()">Cập nhật</a>

                                <button type="submit" name="update_hocvien" class="btn btn-info">Lưu thông tin cập nhật</button>
                                </form>
                                

                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>

@endsection