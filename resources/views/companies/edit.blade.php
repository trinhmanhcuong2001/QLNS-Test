@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm công ty</h1>
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
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName1">Tên</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Công Ty" name="name" value="{{$company->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCode1">Mã</label>
                            <input type="text" class="form-control" id="exampleInputCode1" placeholder="Mã" name="code" value='{{$company->code}}'>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAddress1">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Địa chỉ" name="address" value="{{$company->address}}">
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