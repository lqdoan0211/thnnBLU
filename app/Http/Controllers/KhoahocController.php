<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class KhoahocController extends Controller
{
     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_khoahoc(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
    	return view('admin.add_khoahoc')->with('cate_product', $cate_product);
    }
    public function all_khoahoc_th(){
        $this->AuthLogin();
    	$all_khoahoc_th = DB::table('tbl_khoahoc')->where('category_id','1')->get();
    	$manager_khoahoc_th  = view('admin.all_khoahoc_th')->with('all_khoahoc_th',$all_khoahoc_th);
    	return view('admin_layout')->with('admin.all_khoahoc_th', $manager_khoahoc_th);
    }
     public function all_khoahoc_av(){
        $this->AuthLogin();
    	$all_khoahoc_av = DB::table('tbl_khoahoc')->where('category_id','2')->get();
    	$manager_khoahoc_av  = view('admin.all_khoahoc_av')->with('all_khoahoc_av',$all_khoahoc_av);
    	return view('admin_layout')->with('admin.all_khoahoc_av', $manager_khoahoc_av);
    }
    public function save_khoahoc(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_id'] = $request->product_cate;
    	$data['khoahoc_name'] = $request->khoahoc_name;
        $data['ngay_khaigiang'] = $request->khoahoc_ngaykhaigiang;
    	$data['thoigian_hoc'] = $request->khoahoc_thoigianhoc;
    	$data['thoiluong_hoc'] = $request->khoahoc_thoiluonghoc;
    	$data['hoc_phi'] = $request->khoahoc_hocphi;
    	$data['dia_diem'] = $request->khoahoc_diadiem;
    	$data['chi_tiet'] = $request->khoahoc_thongtin;
    	$data['khoahoc_status'] = $request->khoahoc_status;
        $data['khoahoc_image'] = $request->khoahoc_image;
        $get_image = $request->file('khoahoc_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/khoahoc',$new_image);
            $data['khoahoc_image'] = $new_image;
            DB::table('tbl_khoahoc')->insert($data);
            Session::put('message','Thêm khóa học thành công');
            return Redirect::to('add-khoahoc');
        }
        $data['khoahoc_image'] = '';
        $get_file = $request->file('filedown');
      
        if($get_file){
            $get_name_file = $get_file->getClientOriginalName();
            $name_file = current(explode('.',$get_name_file));
            $new_file =  $name_file.rand(0,99).'.'.$get_file->getClientOriginalExtension();
            $get_file->move('public/uploads/download',$new_file);
            $data['filedown'] = $new_file;
            DB::table('tbl_khoahoc')->insert($data);
            Session::put('message','Thêm khóa học thành công');
            return Redirect::to('add-khoahoc');
        }
        $data['filedown'] = '';
    		DB::table('tbl_khoahoc')->insert($data);
    		Session::put('message','Thêm khóa học thành công');
    		return Redirect::to('add-khoahoc');
    }
    public function unactive_khoahoc_th($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->update(['khoahoc_status'=>1]);
        Session::put('message','Đóng khóa học thành công');
        return Redirect::to('all-khoahoc-th');

    }
    public function active_khoahoc_th($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->update(['khoahoc_status'=>0]);
        Session::put('message','Mở khóa học thành công');
        return Redirect::to('all-khoahoc-th');
    }
     public function unactive_khoahoc_av($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->update(['khoahoc_status'=>1]);
        Session::put('message','Đóng khóa học thành công');
        return Redirect::to('all-khoahoc-av');

    }
    public function active_khoahoc_av($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->update(['khoahoc_status'=>0]);
        Session::put('message','Mở khóa học thành công');
        return Redirect::to('all-khoahoc-av');
    }
    
    public function edit_khoahoc($khoahoc_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $edit_khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->get();

        $manager_khoahoc  = view('admin.edit_khoahoc')->with('edit_khoahoc',$edit_khoahoc)->with('cate_product', $cate_product);

        return view('admin_layout')->with('admin.edit_khoahoc',$manager_khoahoc);
    }
    public function update_khoahoc(Request $request,$khoahoc_id){
        $this->AuthLogin();
        $data = array();
        $data['category_id'] = $request->product_cate;
        $data['khoahoc_name'] = $request->khoahoc_name;
        $data['ngay_khaigiang'] = $request->khoahoc_ngaykhaigiang;
    	$data['thoigian_hoc'] = $request->khoahoc_thoigianhoc;
    	$data['thoiluong_hoc'] = $request->khoahoc_thoiluonghoc;
    	$data['hoc_phi'] = $request->khoahoc_hocphi;
    	$data['dia_diem'] = $request->khoahoc_diadiem;
    	$data['chi_tiet'] = $request->khoahoc_thongtin;
    	$data['khoahoc_status'] = $request->khoahoc_status;
       if ( $request->khoahoc_image != null) {
            $file =  $request->khoahoc_image;
            $file->move('public/uploads/khoahoc/', $file->getClientOriginalName());
            $data['khoahoc_image'] = $file->getClientOriginalName();
         }
         if ( $request->filedown != null) {
            $file =  $request->filedown;
            $file->move('public/uploads/download/', $file->getClientOriginalName());
            $data['filedown'] = $file->getClientOriginalName();
         }
        DB::table('tbl_khoahoc')->where('khoahoc_id', $khoahoc_id)->update($data);
        Session::put('message','Cập nhật khóa học thành công');
        return Redirect::to('add-khoahoc');
    }
    public function delete_khoahoc_th($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->delete();
        Session::put('message','Xóa khóa học thành công');
        return Redirect::to('all-khoahoc-th');
    }
     public function delete_khoahoc_av($khoahoc_id){
        $this->AuthLogin();
        DB::table('tbl_khoahoc')->where('khoahoc_id',$khoahoc_id)->delete();
        Session::put('message','Xóa khóa học thành công');
        return Redirect::to('all-khoahoc-av');
    }
      public function details_khoahoc($khoahoc_id,  Request $request)
    {
         $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $details_khoahoc = DB::table('tbl_khoahoc')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_khoahoc.category_id')
            ->where('tbl_khoahoc.khoahoc_id',$khoahoc_id)->get();

        foreach($details_khoahoc as $key => $value){
            $category_id = $value->category_id;
           //seo
           $meta_desc = $value->khoahoc_name;
           $meta_keywords = $value->khoahoc_id;
           $meta_title = $value->thoiluong_hoc;
           $url_canonical = $request->url();
           //--seo
        }

        $related_product = DB::table('tbl_khoahoc')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_khoahoc.category_id')
            ->where('tbl_category_product.category_id',$category_id)->wherenotin('tbl_khoahoc.khoahoc_id',[$khoahoc_id])->get();

        return view('pages.sanpham.show_details')
            ->with('category',$cate_product)
            ->with('details_khoahoc',$details_khoahoc)
            ->with('related_product',$related_product)
            ->with('slider',$slider);
    }


}
