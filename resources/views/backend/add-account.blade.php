@extends('backend.master');
@section('main')
@section('title', 'Add Account')
@section('name_page', 'Account')
@include('errors.error')
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <strong>Add Account</strong>
          <small>Form</small>
        </div>
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
          <!-- /.row-->
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="ccmonth">Type Account</label>
              <select class="form-control" id="sel1" name="type_account">
                @foreach ($type_account as $rows)
                  <option 
                  @if(!empty($account) && $account->type_account == $rows->ta_id) 
                    selected 
                  @endif 
                  value="{{$rows->ta_id}}">
                    
                    {{$rows->name}}</option>
                @endforeach
              </select>
            </div>
                      <!-- /.row-->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="username">Username</label>
              <input class="form-control" id="username" type="text" value="{{isset($account->username) ? $account->username : ""}}" name="username" placeholder="Username" required>
              </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                  <label for="username">Password</label>
                  <input class="form-control" id="password" name="password" value="{{isset($account->password) ? $account->password : ""}}" type="text" placeholder="Password | Password 2" required>
                </div>
              </div>
        </div>
        <!-- /.row-->
        <div class="row">
            <div class="form-group col-sm-4">
              <label for="ccmonth">Nội dung mô tả</label>
              <input class="form-control" id="content" type="text" value="{{isset($account->content) ? $account->content : ""}}" name="content" placeholder="Trắng Thông Tin">
            </div>
                      <!-- /.row-->
            <div class="col-sm-4">
              <div class="form-group">
                <label for="url_image">Url Ảnh</label>
                <input class="form-control" id="url_image" type="text" value="{{isset($account->url_image) ? $account->url_image : ""}}" name="url_image" placeholder="Ảnh 1 | Ảnh 2 | ..." >
              </div>
            </div>
          <div class="col-sm-4">
          <div class="form-group">
            <label> Upload nhiều ảnh </label>
            <input type="file" name="url_images[]" id="file" multiple>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="url_champs">Víp gì</label>
              <input class="form-control" id="vip_name" value="{{isset($account->vip_name) ? $account->vip_name : ""}}" type="text" name="vip_name" placeholder="VD: Vip map1401" >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="vip_level">Vip Ingame</label>
              <input class="form-control" id="vip_level" value="{{isset($account->vip_level) ? $account->vip_level : ""}}" type="text" name="vip_level" placeholder="Vip ingame: 1" >
            </div>
          </div>

                    <div class="col-sm-4">
          <div class="form-group">
            <label for="vip_main">Acc chuyên</label>
            <input class="form-control" id="vip_main" value="{{isset($account->vip_main) ? $account->vip_main : ""}}" type="text" name="vip_main" placeholder="Acc chuyên gì" >
          </div>
          </div>

          <div class="col-sm-4">
          <div class="form-group">
            <label for="url_bangchung">Upload Bằng Chứng</label>
            <input class="form-control" id="url_bangchung" value="{{isset($account->url_bangchung) ? $account->url_bangchung : ""}}" type="file"  name="url_bangchung" placeholder="URL bằng chứng" >
          </div>
          </div>

                    <div class="col-sm-4">
              <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" id="price" value="{{isset($account->price) ? $account->price : ""}}" type="number" placeholder="Giá" name="price" required>
              </div>
            </div>

           {{-- <div class="form-group col-sm-4">
            <label for="rank">Rank</label>
            <select class="form-control" id="rank" name="rank">
              @foreach ($rank as $key => $rows)
                <option 
                @if(!empty($account) && $account->rank == $key) 
                selected 
              @endif 
                value="{{$key}}">{{$rows}}</option>
              @endforeach
            </select>
          </div> --}}

        </div>
    
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group"></div>
            </div>
            <div class="col-sm-6">
                
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Submit">
                <input class="btn btn-primary" type="reset" value="Reset">
            </div>
            </div>
        </div>
         </div>
      </div>
      @csrf
    </form>
    </div>
    <!-- /.col-->
    @if(empty($account)) 
    <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <strong>Add Type Account</strong>
            <small>Form</small>
          </div>
          <div class="card-body">
              <form method="POST" action="/admin/account/type_add">
              <div class="form-group">
                <label for="company">Type Account</label>
                <input class="form-control" id="type_account" name="name" type="text" placeholder="Type account" required>
              </div>
            <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Thêm">
            </div>
            @csrf
          </form>
          </div>
        </div>
      </div>
    @endif
    <!-- /.col-->
  </div>

@stop
