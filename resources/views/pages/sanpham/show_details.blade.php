@extends('layout')
@section('content')
    @foreach($details_khoahoc as $key => $kh)

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        
       <div class="features_items"><!--features_items-->
       
                        <h2 class="title text-center">{{$kh->khoahoc_name}}</h2>
                <div>
                    <div class="product__details__text">

                        
                        <div class="product__details__price"><b style="font-size: 20px; color: #FF0000; ">Thông tin khóa học</b></div>
                        <div>   <p><b style="color:  #42BEF8;">Ngày khai giảng: </b> {{$kh->ngay_khaigiang}}</p> 
                                <p><b style="color:  #42BEF8;">Thời gian học: </b> {{$kh->thoigian_hoc}}</p>
                                <p><b style="color:  #42BEF8;">Thời lượng học: </b> {{$kh->thoiluong_hoc}}</p>
                                <p><b style="color:  #42BEF8;">Địa điểm học: </b> {{$kh->dia_diem}}/p>
                                <p><b style="color:  #42BEF8;">Học phí: </b> {{number_format($kh->hoc_phi,0,',','.').' '.'VNĐ'}}</p>
                        </div>
                        <div style="text-align: center;"><img src="{{URL::to('public/uploads/khoahoc/'.$kh->khoahoc_image)}}" height="300" width="600" alt="" /></div>
                        <div class="product__details__price"><b style="font-size: 20px; color: #FF0000; ">Giới thiệu</b></div>
                        <div>{{$kh->chi_tiet}}</div>
                        <div><a href="download/{{$kh->filedown}}" download="{{$kh->filedown}}" class="btn btn-large pull-left"><i class="icon-download-alt"> </i> Download: Đề cương chi tiết </a></div>
                        <div style="text-align: center;"><?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id!=NULL){
                            ?>
                            <a href="{{URL::to('show-dang-ky/'.$kh->khoahoc_id.'/'.$customer_id)}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 50px; width: 200px; padding-top: 15px; border-radius: 20px">Đăng ký khóa học</a>
                            <?php
                            }else{
                            ?>
                            <a href="{{URL::to('/dang-nhap')}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 50px; width: 200px; padding-top: 15px; border-radius: 20px"> Đăng ký khóa học</a>
                            <?php 
                            }
                            ?>

                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Product Details Section End -->

@endsection
