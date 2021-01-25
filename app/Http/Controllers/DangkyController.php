<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\dangky;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Slider;
use App\khoahoc;
use App\Customer;
use App\dangkychitiet;
use App\Exports\ExportDangky;
use Excel;

class DangkyController extends Controller
{
    public function AuthLogin(){
        $customer_id = Session::get('customer_id');
        if($customer_id){
            return Redirect::to('trang-chu');
        }else{
            return Redirect::to('dang-nhap')->send();
        }

    }

    public function show_dangky($khoahoc_id, $customer_id){
    	$slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    	
    	$khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->get(); 
    	$customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->get(); 
    	return view('pages.dangky.show_thongtin_dangky')->with('slider', $slider)->with('khoahoc', $khoahoc)->with('customer', $customer);
    } 
    public function update_hocvien_dangky(Request $request,$customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_ngaysinh'] = $request->customer_ngaysinh;
        $data['customer_cmnd'] = $request->customer_cmnd;
        $data['customer_phai'] = $request->customer_phai;
        $data['customer_diachi'] = $request->customer_diachi;
       if ( $request->customer_image != null) {
            $file =  $request->customer_image;
            $file->move('public/uploads/hocvien/', $file->getClientOriginalName());
            $data['customer_image'] = $file->getClientOriginalName();
         }
        DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        Session::put('message','Cập nhật hocvien thành công');
        return Redirect::to('show-hocvien/'.$customer_id);
    }
    public function add_dangky($khoahoc_id, $customers_id){
        $this->AuthLogin();

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $dangky = new dangky;
        $dangky->dangky_code = $checkout_code;
        $dangky->khoahoc_id = $khoahoc_id;
        $dangky->customers_id = $customers_id;
        $dangky->dangky_status = 1;
        $dangky->save();

        $khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->get(); 
        foreach ($khoahoc as $key => $value) {
        	$khoahoc_name = $value->khoahoc_name;
        	$ngay_khaigiang = $value->ngay_khaigiang;
        	$thoigian_hoc = $value->thoigian_hoc;
        	$thoiluong_hoc = $value->thoiluong_hoc;
        	$dia_diem = $value->dia_diem;
        	$hoc_phi = $value->hoc_phi;
        }

    	$customer = DB::table('tbl_customers')->where('customer_id',$customers_id)->get();
    	foreach ($customer as $key => $value) {
        	$customers_name = $value->customer_name;
        	$customer_phai = $value->customer_phai;
        	$customer_ngaysinh = $value->customer_ngaysinh ;
            $customer_cmnd = $value->customer_cmnd;
            $customers_email = $value->customer_email;
            $customers_phone = $value->customer_phone ;
            $customer_diachi = $value->customer_diachi;
 
        }

        $dangkychitiet = new dangkychitiet;
        $dangkychitiet->dangky_code = $checkout_code;
        $dangkychitiet->customer_id = $customer_id;
        $dangkychitiet->khoahoc_id = $khoahoc_id;
        $dangkychitiet->khoahoc_name = $khoahoc_name;
        $dangkychitiet->ngay_khaigiang = $ngay_khaigiang;
        $dangkychitiet->thoigian_hoc = $thoigian_hoc;
        $dangkychitiet->thoiluong_hoc = $thoiluong_hoc;
        $dangkychitiet->dia_diem = $dia_diem;
        $dangkychitiet->hoc_phi = $hoc_phi;
        $dangkychitiet->dangky_status = 1;
        $dangkychitiet->save();
        //dd($dangky);
         return Redirect::to('/trang-chu');
    }
    public function export_csv(){
        return Excel::download(new ExportDangky , 'danhsach.xlsx');
    }
}
