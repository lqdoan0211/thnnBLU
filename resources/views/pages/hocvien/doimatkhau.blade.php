@extends('layout')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           <h2 style="text-align: center; font-size: 20px">ĐỔI MẬT KHẨU</h2>
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($reset_password as $key => $kh)
                                <form role="form" action="{{URL::to('/update-hocvien/'.$kh->customer_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" name="customer_email" class="form-control" id="okok" value="{{$kh->customer_email}}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                    <input type="password" data-validation="text" data-validation-error-msg="Vui lòng điền thời lượng cho khóa học" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu cũ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu mới</label>
                                    <input type="password" data-validation="number" data-validation-error-msg="Vui lòng điền thời lượng cho khóa học" name="customer_password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu mới">
                                </div>

                                <button type="submit" name="update_hocvien" class="btn btn-info">Lưu thông tin cập nhật</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection