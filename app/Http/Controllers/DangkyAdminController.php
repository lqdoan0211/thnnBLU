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

class DangkyAdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function show_dangky($khoahoc_id, $customer_id){

    	$khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->get(); 
    	$customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->get(); 
    	return view('pages.dangky.show_thongtin_dangky')->with('slider', $slider)->with('khoahoc', $khoahoc)->with('customer', $customer);
    } 

    public function all_dangky_ok(){
        $this->AuthLogin();
    	$all_dangky = DB::table('tbl_dangky')->get();
         $all_dangky_ok = DB::table('tbl_dangky_chitiet')->get();
    	$manager_dangky  = view('admin.all_dangky_ok')->with('all_dangky_ok',$all_dangky_ok);
    	return view('admin_layout')->with('admin.all_dangky_ok', $manager_dangky);
    }

	public function unactive_dangky($dangky_id){
        $this->AuthLogin();
        DB::table('tbl_dangky')->where('dangky_id',$dangky_id)->update(['dangky_status'=>1]);
        Session::put('message','Duyệt đăng ký thành công');
        return Redirect::to('all-dangky');

    }
    public function active_dangky($dangky_id){
        $this->AuthLogin();
        DB::table('tbl_dangky')->where('dangky_id',$dangky_id)->update(['dangky_status'=>0]);
        Session::put('message','Hủy đăng ký thành công');
        return Redirect::to('all-dangky');
    }
    public function unactive_dangky_chitiet($dangky_id){
        $this->AuthLogin();
        DB::table('tbl_dangky_chitiet')->where('dangky_id',$dangky_id)->update(['dangky_status'=>1]);
        Session::put('message','Hủy đăng ký thành công');
        return Redirect::to('all-dangky');

    }
    public function active_dangky_chitiet($dangky_id){
        $this->AuthLogin();
        DB::table('tbl_dangky_chitiet')->where('dangky_id',$dangky_id)->update(['dangky_status'=>0]);
        Session::put('message','Duyệt đăng ký thành công');
        return Redirect::to('all-dangky');
    }
    public function delete_dangky($dangky_code){
        $this->AuthLogin();
        DB::table('tbl_dangky')->where('dangky_code',$dangky_code)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    
}

