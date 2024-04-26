@extends('layout')
@section('content')
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật công việc</h1>
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
                            <label for="exampleInputProject1">Dự án</label>
                            <select name="project_id" id="exampleInputProject1" class="form-control" onchange="getPersonByProject(this.value);">
                                <option >Chọn dự án</option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}" {{$project->id==$task->project_id ? 'selected' : ''}}>{{$project->name}} - {{$project->company->name}}</option>
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
                            <input type="date" class="form-control" id="exampleInpuStart1" name="start_time" value="{{$task->start_time}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEnd1">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="exampleInputEnd1" name="end_time" value="{{$task->end_time}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription1">Tên</label>
                            <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Tên công việc" name="name" value="{{$task->name}}">
                        </div>    
                        <div class="form-group">
                            <label for="exampleInputDescription1">Mô tả</label>
                            <input type="text" class="form-control" id="exampleInputDescription1" placeholder="Mô tả" name="description" value="{{$task->description}}"> 
                        </div>                   
                        
                        <div class="form-group">
                            <label for="exampleInputPerson1">Độ ưu tiên</label>
                            <select name="priority" id="exampleInputPerson1" class="form-control" >
                                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Cao</option>
                                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Trung bình</option>
                                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Thấp</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPerson1">Trạng thái</label>
                            <select name="status" id="exampleInputPerson1" class="form-control" >
                                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Mới tạo</option>
                                <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>Đang làm</option>
                                <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>Hoàn thành</option>
                                <option value="4" {{ $task->status == 4 ? 'selected' : '' }}>Tạm hoãn</option>
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
        const url = '{{URL::to('/tasks/getPersonByProject')}}';
        document.addEventListener('DOMContentLoaded', () => {
            getPersonByProject({{$task->project_id}});
        });
    </script>
    <script src="{{URL::asset('template/js/main.js')}}"></script>
@endsection
