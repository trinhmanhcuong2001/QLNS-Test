@extends('layout')
@section('content')
@include('alert')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Thông tin người dùng</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    
                    <a href="{{URL::to('people/edit', $person->id)}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-pencil-alt" style="padding-right: 8px"></i>
                               Chỉnh sửa
                        </button>
                    </a>
                    
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <section class="content">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">
                            {{$person->user->email}}
                          </h3>
                          
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <dl class="row">

                            <dt class="col-sm-4">Họ và tên</dt>
                            <dd class="col-sm-8">{{$person->full_name}}</dd>
                            <dt class="col-sm-4">Giới tính</dt>
                            <dd class="col-sm-8">{{$person->gender}}</dd>
                            <dt class="col-sm-4">Ngày sinh</dt>
                            <dd class="col-sm-8">{{$person->birthdate}}</dd>
                            <dt class="col-sm-4">Số điện thoại</dt>
                            <dd class="col-sm-8">{{$person->phone_number}}</dd>
                            <dt class="col-sm-4">Địa chỉ</dt>
                            <dd class="col-sm-8">{{$person->address}}</dd>

                          </dl>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
              <!-- END TYPOGRAPHY -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
@endsection