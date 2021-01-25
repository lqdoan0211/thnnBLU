<?php
    $customer_id = Session::get('customer_id');
?>

@extends('layout')
@section('content')
    @foreach($show_customer as $key => $value)

    <!-- Product Details Section Begin -->
    <section class="cart_items">
       <div class="features_items"><!--features_items-->
                <div class="col-sm-4" style="background-color: #F7F9FA; margin-left: 50px">
                    <div class="col-sm-12" style="border-bottom: 1px solid">
                    <div class="col-sm-5" style="margin-top: 16px; margin-bottom: 10px">
                        <img src="{{URL::to('public/uploads/hocvien/'.$value->customer_image)}}" height="100" width="100">
                    </div>
                    <div class="col-sm-7" style="margin-top: 36px; margin-bottom: 10px; font-size: 20px">
                       <b>{{$value->customer_name}}</b>
                       <p>{{$value->customer_cmnd}}</p>
                    </div>
                    </div>
                    <div style="margin-top: 10px">
                   <div>
                    <a href="{{URL::to('edit-hocvien/'.$customer_id)}}" value="xac nhan dang ky" class="btn btn-default add-to-cart" style="height: 50px; width: 100%; padding-top: 15px;  background-color: #42BEF8; margin-top: 10px; margin-bottom: 10px"> <b>Cập nhật thông tin</b></a>
                    </div>
                    <div>
                    <a href="{{URL::to('doimatkhau/'.$customer_id)}}" value="xac nhan dang ky" class="btn btn-default add-to-cart" style="height: 50px; width: 100%; padding-top: 15px;  background-color: #42BEF8;  margin-bottom: 88px"> <b>Đổ mật khẩu</b></a>
                    </div>
                    </div>

                </div>
                <div class="col-sm-7" style="background-color: #F7F9FA; margin-left: 10px;">
                    <div style="font-size: 20px">
                       <h2 class="title text-center" style="margin-top:10px; border-bottom: 1px solid; font-size: 25px;">THÔNG TIN</h2>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Họ và tên:</b>{{$value->customer_name}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Giới tính:</b>{{$value->customer_phai}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Ngày sinh:</b>{{$value->customer_ngaysinh}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Số CMND:</b>{{$value->customer_cmnd}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Email:</b>{{$value->customer_email}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Số điện thoại:</b>{{$value->customer_phone}}</p>
                       <p style="margin-left: 20px"><b style="margin-right: 5px">- Địa chỉ:</b>{{$value->customer_diachi}}</p>
                    </div>
                </div>
                @endforeach
        </div>
        

    <div class="features_items" style="margin-top: 10px;"><!--features_items-->
        <h2 class="title text-center" style="font-size: 20px; margin-top:20px;">CÁC KHÓA HỌC ĐÃ ĐĂNG KÝ</h2>
            <div class="container">
            <div class="table-responsive cart_info" style="margin-bottom: 30px">
                
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu" style="background-color: #42BEF8; height: 50px">
                            <td class="description" style="text-align: center;"><b>Mã đăng ký</b></td>
                            <td class="description" style="text-align: center;"><b>Tên khóa học</b></td>
                            <td class="description" style="text-align: center;"><b>Ngày khai giảng</b></td>
                            <td class="description" style="text-align: center;"><b>Học phí</b></td>
                            <td class="description" style="text-align: center;"><b>Tình trạng</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show_dangky as $key => $value)        
                        <tr>
                            <td style="text-align: center; font-size: 16px; padding-top: 20px">
                                <b>{{$value->dangky_code}}</b>
                            </td >
                            <td style="text-align: center; font-size: 16px; padding-top: 20px">
                                <b>{{$value->khoahoc_name}}</b>
                            </td>
                            <td style="text-align: center; font-size: 16px; padding-top: 20px">
                                <b>{{$value->ngay_khaigiang}}</b>
                            </td>
                            <td style="text-align: center; font-size: 16px; padding-top: 20px">
                                <b>{{number_format($value->hoc_phi,0,',','.')}}đ</b>
                            </td>
                            <td style="text-align: center; font-size: 16px; padding-top: 20px">
                                <span class="text-ellipsis">
                                    <?php
                                        if($value->dangky_status==0){
                                    ?>
                                        <span class="fa-thumb-styling fa fa-thumbs-up">Đã phê duyệt</span>
                                    <?php
                                        }else{
                                    ?>  
                                        <span class="fa-thumb-styling fa fa-thumbs-down">Chưa phê duyệt</span>
                                    <?php
                                    }
                                    ?>
            </span>
                            </td>
                        </tr>
                         @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
          
    </section>
    <!-- Product Details Section End -->

@endsection
