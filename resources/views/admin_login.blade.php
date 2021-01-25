<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="assets/images/LOGO_BLU.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/LOGO_BLU.png" height="48" class='mb-4'>
                        <h3>ĐĂNG NHẬP</h3>
                        <p>Làm ơn đăng nhập để vào Admin</p>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                    </div>
                    <form action="{{URL::to('/admin-dashboard')}}" method="post">
                        {{ csrf_field() }}
                        @foreach($errors->all() as $val)
                        <ul>
                            <li>{{$val}}</li>
                        </ul>
                        @endforeach
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Tài khoản</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="username" name="admin_email" placeholder="Điền tài khoản">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Mật khẩu</label>
                                
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="admin_password" placeholder="Điền mật khẩu">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-left">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Nhớ đăng nhập</label>
                            </div>
                            <!-- <div class="float-right">
                                <a href="auth-register.html">Don't have an account?</a>
                            </div> -->
                        </div>

                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                        @if($errors->has('g-recaptcha-response'))
                        <span class="invalid-feedback" style="display:block">
                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                        </span>
                        @endif

                        <div class="clearfix text-center " style="margin-top: 15px">
                            <button class="btn btn-primary float-none w-100" name="login">Đăng nhập</button>
                        </div>
                    </form>
                   <div class="divider">
                        <div class="divider-text">OR</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-secondary"><i data-feather=""></i> Google</button>
                        </div>
                    </div>
                </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('public/backend/js/scripts.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</body>

</html>
