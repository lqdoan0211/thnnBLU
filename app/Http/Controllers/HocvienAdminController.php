<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Excel;
use CategoryProductModel;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Customer;
session_start();
class HocvienAdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
	public function all_hocvien(){
        $this->AuthLogin();
    	$all_hocvien = DB::table('tbl_customers')->get();
    	$manager_hocvien  = view('admin.all_hocvien')->with('all_hocvien',$all_hocvien);
    	return view('admin_layout')->with('admin.all_hocvien', $manager_hocvien);
    }
    public function delete_hocvien($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa học viên thành công');
    return Redirect::to('all-hocvien');
    }
}
