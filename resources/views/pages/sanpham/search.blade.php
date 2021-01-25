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
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                       @foreach($search_khoahoc as $key => $kh)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <a href="{{URL::to('/chi-tiet-san-pham/'.$kh->chi_tiet)}}" style="text-align: left;">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                           <img src="{{URL::to('public/uploads/khoahoc/'.$kh->khoahoc_image)}}" alt="" />
                                                <h2 style="text-align: center; font-size: 18px">{{$kh->khoahoc_name}}</h2>
                                                <p><b style="color:  #42BEF8;">Ngày khai giảng: </b> <i><b>{{$kh->ngay_khaigiang}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời gian học: </b> <i><b>{{$kh->thoigian_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Thời lượng học: </b> <i><b>{{$kh->thoiluong_hoc}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Địa điểm học: </b> <i><b>{{$kh->dia_diem}}</b></i></p>
                                                <p><b style="color:  #42BEF8;">Học phí: </b> <i><b>{{number_format($kh->hoc_phi,0,',','.').' '.'VNĐ'}}</b></i></p>
                                            <a href="{{URL::to('/checkout')}}" class="btn btn-default add-to-cart"><i class="fa"></i>Đăng ký khóa học</a>
                                        </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items--> 
        <!--/recommended_items-->
@endsection