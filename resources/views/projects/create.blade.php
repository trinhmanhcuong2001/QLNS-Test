@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm thông dự án</h1>
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
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInpuCode1">Mã</label>
                            <input type="text" class="form-control" id="exampleInpuCode1" placeholder="Nhập mã dự án" name="code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tên</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên dự án" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription1">Mô tả</label>
                            <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Mô tả" name="description">
                        </div>                      
                        <div class="form-group">
                            <label for="exampleInputCompany1">Công ty</label>
                            <select name="company_id" id="exampleInputCompany1" class="form-control" onchange="getPerson();">
                                <option value="">Chọn công ty</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPerson1">Nhân viên</label>
                            <select name="person_id[]" id="exampleInputPerson1" class="form-control" multiple>
                                
                            </select> 
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
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
@section('footer')
    <script>
       const url = '{{URL::to('/projects/getPersons')}}' 
    </script>
    <script src="{{URL::asset('template/js/main.js')}}"></script>
    
@endsection