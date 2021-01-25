<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function send_mail(){
         //send mail
                $to_name = "Đoàn TaJ";
                $to_email = "lqdoan0211@gmail.com";//send to this email
               
             
                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn đề khóa học'); //body of mail.blade.php
                
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                // return redirect('/')->with('message','');
                //--send mail
    }

    public function index(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        $meta_desc = "Tin học - Ngoai ngu BLU"; 
        $meta_keywords = "trung tâm tin học ngoại ngữ BLU";
        $meta_title = "Tin học - Ngoai ngu BLU";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 

        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_d','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        
         $all_khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_status','0')->orderby(DB::raw('RAND()'))->paginate(6);
         $all_khoahoc_tinhoc = DB::table('tbl_khoahoc')->where('khoahoc_status','0')->where('category_id','1')->orderby(DB::raw('RAND()'))->paginate(6);
          $all_khoahoc_anhvan = DB::table('tbl_khoahoc')->where('khoahoc_status','0')->where('category_id','2')->orderby(DB::raw('RAND()'))->paginate(6);

    	return view('pages.home')->with('cate_product',$cate_product)->with('all_khoahoc_anhvan',$all_khoahoc_anhvan)->with('all_khoahoc',$all_khoahoc)->with('all_khoahoc_tinhoc',$all_khoahoc_tinhoc)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider); //1
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
    }
     public function lienhe(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
        $meta_desc = "Tin học - Ngoai ngu BLU"; 
        $meta_keywords = "trung tâm tin học ngoại ngữ BLU";
        $meta_title = "Tin học - Ngoai ngu BLU";
        $url_canonical = $request->url();
        //--seo
        return view('pages.lienhe')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
     }

    public function search(Request $request){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo 
        $meta_desc = "Tìm kiếm khóa học"; 
        $meta_keywords = "Tìm kiếm khóa học";
        $meta_title = "Tìm kiếm khóa học";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 


        $search_khoahoc = DB::table('tbl_khoahoc')->where('khoahoc_name','like','%'.$keywords.'%')->get(); 
        return view('pages.sanpham.search')->with('category',$cate_product)->with('search_khoahoc',$search_khoahoc)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

    }
}
