@extends('layout')
@section('content')



<div class="features_items"><!--features_items-->
       <div class="container" style="margin-bottom: 30px">
        <div class="col-sm-12 pull-right">
            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                {{csrf_field()}}
                <div class="search_box pull-right">
                    <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                    <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                </div>
            </form>
        </div>
    </div>
                        <h2 class="title text-center">CÁC KHÓA HỌC TIN HỌC</h2>
                        @foreach($all_khoahoc_tinhoc as $key => $kh)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                           
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                            <input type="hidden" value="{{$kh->khoahoc_id}}" class="cart_product_id_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->khoahoc_name}}" class="cart_product_name_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->khoahoc_image}}" class="cart_product_image_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->hoc_phi}}" class="cart_product_price_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->ngay_khaigiang}}" class="cart_product_ngaykg_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->dia_diem}}" class="cart_product_diadiem_{{$kh->khoahoc_id}}">
                                             <input type="hidden" value="1" class="cart_product_qty_{{$kh->khoahoc_id}}">

                                            <a href="{{URL::to('/chi-tiet/'.$kh->khoahoc_id)}}" style="text-align: left;">
                                                <img src="{{URL::to('public/uploads/khoahoc/'.$kh->khoahoc_image)}}" alt=""/>
                                                <h2 style="text-align: center; font-size: 18px">{{$kh->khoahoc_name}}</h2>
                                                <p><b style="color:  #42BEF8;">Ngày khai giảng: </b> <i><b>{{$kh->ngay_khaigiang}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời gian học: </b> <i><b>{{$kh->thoigian_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời lượng học: </b> <i><b>{{$kh->thoiluong_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Địa điểm học: </b> <i><b>{{$kh->dia_diem}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Học phí: </b> <i><b>{{number_format($kh->hoc_phi,0,',','.').' '.'VNĐ'}}</b></i></p>
                                             </a>
                                            <?php
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){
                                            ?>
                                            <a href="{{URL::to('show-dang-ky/'.$kh->khoahoc_id.'/'.$customer_id)}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 40px; width: 200px; padding-top: 10px; border-radius: 20px;">Đăng ký khóa học </a>
                                            <?php
                                                }else{
                                            ?>
                                             <a href="{{URL::to('/dang-nhap')}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 40px; width: 200px; padding-top: 10px; border-radius: 20px;">Đăng ký khóa học</a>
                                            <?php 
                                                }
                                            ?>
                                            </form>

                                        </div>
                                      
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
                    <div class="features_items"><!--features_items-->
       
                        <h2 class="title text-center">CÁC KHÓA HỌC NGOẠI NGỮ</h2>
                        @foreach($all_khoahoc_anhvan as $key => $kh)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                           
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                            <input type="hidden" value="{{$kh->khoahoc_id}}" class="cart_product_id_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->khoahoc_name}}" class="cart_product_name_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->khoahoc_image}}" class="cart_product_image_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->hoc_phi}}" class="cart_product_price_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->ngay_khaigiang}}" class="cart_product_ngaykg_{{$kh->khoahoc_id}}">
                                            <input type="hidden" value="{{$kh->dia_diem}}" class="cart_product_diadiem_{{$kh->khoahoc_id}}">
                                             <input type="hidden" value="1" class="cart_product_qty_{{$kh->khoahoc_id}}">

                                            <a href="{{URL::to('/chi-tiet/'.$kh->khoahoc_id)}}" style="text-align: left;">
                                                <img src="{{URL::to('public/uploads/khoahoc/'.$kh->khoahoc_image)}}" alt="" />
                                                <h2 style="text-align: center; font-size: 18px">{{$kh->khoahoc_name}}</h2>
                                                <p><b style="color:  #42BEF8;">Ngày khai giảng: </b> <i><b>{{$kh->ngay_khaigiang}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời gian học: </b> <i><b>{{$kh->thoigian_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời lượng học: </b> <i><b>{{$kh->thoiluong_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Địa điểm học: </b> <i><b>{{$kh->dia_diem}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Học phí: </b> <i><b>{{number_format($kh->hoc_phi,0,',','.').' '.'VNĐ'}}</b></i></p>
                                             </a>
                                           <?php
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){
                                            ?>
                                            <a href="{{URL::to('show-dang-ky/'.$kh->khoahoc_id.'/'.$customer_id)}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 40px; width: 200px; padding-top: 10px; border-radius: 20px;">Đăng ký khóa học</a>
                                            <?php
                                                }else{
                                            ?>
                                             <a href="{{URL::to('/dang-nhap')}}" value="Đăng ký khóa học" class="btn btn-default add-to-cart" style="height: 40px; width: 200px; padding-top: 10px; border-radius: 20px;">Đăng ký khóa học</a>
                                            <?php 
                                                }
                                            ?>
                                            </form>

                                        </div>
                                      
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_khoahoc->links()!!}
                      </ul>
        <!--/recommended_items-->
@endsection