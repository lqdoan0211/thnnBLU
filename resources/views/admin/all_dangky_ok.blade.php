@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh sách đăng ký
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
                
              </label>
            </th>
            <th>ID</th>
            <th>Mã đăng ký</th>
            <th>ID học viên</th>
            <th>ID khóa học</th>
            <th>Xét duyệt</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_dangky_ok as $key => $value)
          <tr>
            <td></td>
            <td>{{ $value->dangky_id }}</td>
            <td>{{ $value->dangky_code }}</td>
            <td>{{ $value->customer_id }}</td>
            <td>{{ $value->khoahoc_id }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($value->dangky_status==0){
                ?>
                <a href="{{URL::to('/unactive-dangky-chitiet/'.$value->dangky_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-dangky-chitiet/'.$value->dangky_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-category-product/'.$value->dangky_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-dangky/'.$value->dangky_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    <!-----export data---->
       <form action="{{url('exp-dangky')}}" method="POST">
          @csrf
       <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
      </form>


    </div>
    
  </div>
</div>
@endsection