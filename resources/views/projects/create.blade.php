@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <x-atoms.title title="Thêm dự án" />
                
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
                            <x-molecules.text-input-field id="exampleInpuCode1" placeholder="Nhập mã dự án" value="" label="Mã" name="code"/>
                        </div>
                        <div class="form-group">
                            <x-molecules.text-input-field id="exampleInputName1" placeholder="Nhập tên dự án" value="" label="Tên" name="name"/>
                        </div>
                        <div class="form-group">
                            <x-molecules.text-input-field id="exampleInputDescription1" placeholder="Mô tả" value="" label="Mô tả" name="description"/>
                        </div>                      
                        <div class="form-group">
                            <x-molecules.select-field id="exampleInputCompany1" name="company_id" placeholder="Chọn công ty" onchange="getPersonByCompany()" :options="$companies" value="id" content="name" label="Công ty" multiple="[]" />
                        </div>
                        <div class="form-group">
                            <x-molecules.select-field id="exampleInputPerson1" name="person_id[]" placeholder="Chọn nhân viên" onchange="[]" :options="[]" value="id" content="name" label="Nhân viên" multiple="multiple" />

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <x-atoms.button type="submit" text="Thêm" class="btn-primary" />
             
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