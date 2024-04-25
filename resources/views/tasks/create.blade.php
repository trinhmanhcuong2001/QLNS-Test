@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm công việc</h1>
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
                            <label for="exampleInputProject1">Dự án</label>
                            <select name="project_id" id="exampleInputProject1" class="form-control" onchange="getPersonByProject(this.value);">
                                <option >Chọn dự án</option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}} - {{$project->company->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPerson1">Người làm</label>
                            <select name="person_id" id="exampleInputPerson1" class="form-control">
                                
                                
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInpuStart1">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="exampleInpuStart1" name="start_time">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEnd1">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="exampleInputEnd1" name="end_time">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription1">Tên</label>
                            <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Tên công việc" name="name">
                        </div>    
                        <div class="form-group">
                            <label for="exampleInputDescription1">Mô tả</label>
                            <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Mô tả" name="description">
                        </div>                   
                        
                        <div class="form-group">
                            <label for="exampleInputPerson1">Độ ưu tiên</label>
                            <select name="priority" id="exampleInputPerson1" class="form-control" >
                                <option value="1">Cao</option>
                                <option value="2">Trung bình</option>
                                <option value="3">Thấp</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPerson1">Trạng thái</label>
                            <select name="status" id="exampleInputPerson1" class="form-control" >
                                <option value="1">Mới tạo</option>
                                <option value="2">Đang làm</option>
                                <option value="3">Hoàn thành</option>
                                <option value="4">Tạm hoãn</option>
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
        const url = '{{URL::to('/tasks/getPersonByProject')}}';
    </script>
    <script src="{{URL::asset('template/js/main.js')}}"></script>
@endsection
