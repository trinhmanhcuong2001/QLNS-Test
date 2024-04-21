@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm thông phòng ban</h1>
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
                            <label for="exampleInpuCode1">Mã</label>
                            <input type="text" class="form-control" id="exampleInpuCode1" placeholder="Nhập mã phòng ban" name="code" value="{{$department->code}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tên</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Nhập tên phòng ban" name="name" value="{{$department->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCompany1">Công ty</label>
                            <select name="company_id" id="exampleInputCompany1" class="form-control">
                                <option value="">Chọn công ty</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" {{$company->id==$department->company_id ? 'selected' : ''}}>{{$company->name}} </option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputParent1">Phòng ban cha</label>
                            <select name="parent_id" id="exampleInputParent1" class="form-control">
                                
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
@section('footer')
    <script>
        const url = '{{url('/departments/getDepartmentParents')}}';
    </script>
    <script src="{{URL::asset('template/js/main.js')}}"></script>
    
@endsection