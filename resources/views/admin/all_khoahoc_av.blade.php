@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê các khóa học
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Id</th>
            <th>Tên khóa học</th>
            <th>Hình ảnh</th>
            <th>Ngày khai giảng</th>
            <th>Thời gian học</th>
            <th>Thời lượng học</th>
            <th>Học phí</th>
            <th>Địa điểm</th>
            <th>Thông tin</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_khoahoc_av as $key => $kh_av)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $kh_av->khoahoc_id }}</td>
            <td>{{ $kh_av->khoahoc_name }}</td>
            <td><img src="public/uploads/khoahoc/{{ $kh_av->khoahoc_image }}" height="100" width="100"></td>
            <td>{{ $kh_av->ngay_khaigiang }}</td>
            <td>{{ $kh_av->thoigian_hoc }}</td>
            <td>{{ $kh_av->thoiluong_hoc }}</td>
            <td>{{ $kh_av->hoc_phi }}</td>
            <td>{{ $kh_av->dia_diem }}</td>
            <td>{{ $kh_av->chi_tiet }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($kh_av->khoahoc_status==0){
                ?>
                <a href="{{URL::to('/unactive-khoahoc-av/'.$kh_av->khoahoc_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-khoahoc-av/'.$kh_av->khoahoc_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-khoahoc/'.$kh_av->khoahoc_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa khóa học này ko?')" href="{{URL::to('/delete-khoahoc/'.$kh_av->khoahoc_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-----import data---->
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection