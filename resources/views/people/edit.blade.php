@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật người dùng: {{$person->user->email}}</h1>
            </div>
            
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputDes1">Tên đầy đủ</label>
                            <input type="text" class="form-control" id="exampleInputDes1" placeholder="Nhập họ và tên đầy đủ" name="full_name" value="{{$person->full_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBirth1">Ngày sinh</label>
                            <input type="date" class="form-control" id="exampleInputBirth1" name="birthdate" value="{{$person->birthdate}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGender1">Giới tính</label>
                            <select name="gender" id="exampleInputGender1" class="form-control">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Số điện thoại</label>
                            <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Số điện thoại" name="phone_number" value="{{$person->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Địa chỉ" name="address" value="{{$person->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGender1">Công ty</label>
                            <select name="" id="exampleInputGender1" class="form-control">
                                @foreach ($companies as $company)
                                    @if ($company->id == $person->company->id)
                                        <option value="{{$company->id}}" selected>{{$company->name}}</option>
                                    @else
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection