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
class HocvienController extends Controller
{
	 public function AuthLogin(){
        $customer_id = Session::get('customer_id');
        if($customer_id){
            return Redirect::to('trang-chu');
        }else{
            return Redirect::to('dang-nhap')->send();
        }

    }
	public function show_hocvien($customer_id){
    	$slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    	
    	$show_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->get(); 
    	$show_dangky = DB::table('tbl_dangky_chitiet')->where('customer_id',$customer_id)->get();
    	return view('pages.hocvien.thongtin_hocvien')->with('slider', $slider)->with('show_customer', $show_customer)->with('show_dangky', $show_dangky);
    }

    public function all_hocvien(){
        $this->AuthLogin();
    	$all_hocvien = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();
    	$manager_hocvien  = view('admin.all_hocvien')->with('all_hocvien',$all_hocvien);
    	return view('admin_layout')->with('admin.all_hocvien', $all_hocvien);
    }

    public function edit_hocvien($customer_id){
        $this->AuthLogin();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $edit_hocvien = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();

        return view('pages.hocvien.dangky_hocvien')->with('slider', $slider)->with('edit_hocvien', $edit_hocvien);
    }

    public function reset_password($customer_id){
        $this->AuthLogin();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $reset_password = DB::table('tbl_customers')->where('customer_id',$customer_id)->get();

        return view('pages.hocvien.doimatkhau')->with('slider', $slider)->with('reset_password', $reset_password);
    }
    public function update_hocvien(Request $request,$customer_id){
        $this->AuthLogin();
        $data = array();
        $data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = ($request->customer_password);
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
    public function delete_hocvien($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa học viên thành công');
    return Redirect::to('all-hocvien');
    }
}
