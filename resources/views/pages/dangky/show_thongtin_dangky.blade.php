
<?php
    $customer_id = Session::get('customer_id');
?>
@extends('layout')
@section('content')

@foreach($customer as $key => $value)
<section id="cart_items">
	<div class="features_items"><!--features_items-->
        <h2 class="title text-center" style="font-size: 25px">ĐĂNG KÝ KHÓA HỌC</h2>
        <div class="product__details__price" style="text-align: center; font-size: 20px; color: #FF0000; padding-bottom: 10px"><b>Thông tin học viên</b></div>
			<div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-hocvien-dangky/'.$value->customer_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" name="customer_name" class="form-control" id="okok" value="{{$value->customer_name}}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh học viên</label>
                                    <input type="file" name="customer_image" class="form-control" id="okok" value="{{$value->customer_image}}" >
                                    <img src="{{URL::to('public/uploads/hocvien/'.$value->customer_image)}}" height="100" width="100">
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
                                    <input type="date" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="customer_ngaysinh" class="form-control" id="test05" value="{{$value->customer_ngaysinh}}" readonly="true">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số chứng minh nhân dân</label>
                                    <input type="text" name="customer_cmnd" class="form-control" id="test01" value="{{$value->customer_cmnd}}" readonly="true">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$value->customer_email}}" name="customer_email" class="form-control" id="test03" readonly="true">
                                </div>
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" value="{{$value->customer_email}}" name="customer_email" class="form-control" id="test111" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="customer_phone" class="form-control" id="test02" value="{{$value->customer_phone}}" readonly="true">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" value="{{$value->customer_diachi}}" name="customer_diachi" class="form-control" id="test04" readonly="true">
                                </div>

                                 <a class="btn btn-success" onclick="nhapData()">Cập nhật</a>

                                <button type="submit" name="update_hocvien_dangky" class="btn btn-info" >Lưu thông tin cập nhật</button>
                                </form>
                            </div>

                        </div>
@endforeach
@foreach($khoahoc as $key => $value)
		<div class="product__details__price" style="text-align: center; font-size: 20px; color: #FF0000; padding-bottom: 10px"><b>Thông tin khóa học</b></div>
 		<div class="container">
			<div class="table-responsive cart_info">
				<form>
					@csrf
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description" style="text-align: center;">Tên khóa học</td>
							<td class="description" style="text-align: center;">Ngày khai giảng</td>
							<td class="description" style="text-align: center;">Thời gian học</td>
							<td class="description" style="text-align: center;">thời lượng học</td>
							<td class="description" style="text-align: center;">Địa điểm</td>
							<td class="total">Học phí</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td  style="text-align: center; padding-left: 10px">
								<img src="{{URL::to('public/uploads/khoahoc/'.$value->khoahoc_image)}}" height="80" width="90" alt="" />
							</td>
							<td style="text-align: center;">
								<b>{{$value->khoahoc_name}}</b>
							</td>
							<td style="text-align: center;">
								<b>{{$value->ngay_khaigiang}}</b>
							</td>
							<td style="text-align: center;">
								<b>{{$value->thoigian_hoc}}</b>
							</td>
							<td style="text-align: center;">
								<b>{{$value->thoiluong_hoc}}</b>
							</td>
							<td style="text-align: center;">
								<b>{{$value->dia_diem}}</b>
							</td>
							<td>
								<b>{{number_format($value->hoc_phi,0,',','.')}}đ</b>
							</td>
						</tr>
@endforeach
					</tbody>
				</table>
				</form>
			</div>
		</div>
		<div style="text-align: right;">
			<a onclick="myFunction()" href="{{URL::to('add-to-dangky/'.$value->khoahoc_id.'/'.$customer_id)}}" value="xac nhan dang ky" class="btn btn-default add-to-cart" style="height: 50px; width: 200px; padding-top: 15px; border-radius: 20px; color: #000000"> <b>Xác nhận đăng ký</b></a>
		</div>
	</div>
	</section> <!--/#cart_items-->
<script>
function myFunction() {
  alert("Đăng ký khóa học thành công! Vui lòng chờ hệ thống phê duyệt");
}
</script>
@endsection