@extends('layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách công việc</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <a href="{{URL::to('tasks/exportExcel')}}">
                  <button type="button" class="btn btn-success">
                      <i class="fas fa-file-excel" style="padding-right: 8px"></i>
                         Xuất Excel
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
            <div class="col-12">
                <form action="{{URL::to('tasks/filter')}}">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <th>Lọc công việc</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="company_id" id="exampleInputCompany1" class="form-control" onchange="getProject(this.value);">
                                        <option>Công ty</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="project_id" id="exampleInputProject1" class="form-control" onchange="getPersonByProject(this.value);">
                                        <option value="">Dự án</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="person_id" id="exampleInputPerson1" class="form-control">
                                        <option value="">Người làm</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="priority" id="" class="form-control">
                                        <option value="">Mức độ ưu tiên</option>
                                        <option value="1">Cao</option>
                                        <option value="2">Trung bình</option>
                                        <option value="3">Thấp</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Trạng thái</option>
                                        <option value="1">Mới tạo</option>
                                        <option value="2">Đang làm</option>
                                        <option value="3">Hoàn thành</option>
                                        <option value="4">Tạm hoãn</option>
                                    </select>
                                </td>
                                <td><button class="btn btn-primary">Lọc</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
              <div class="card">
                <form action="{{URL::to('tasks/search')}}">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
        
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Tìm kiếm">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0">
                    
                  <table class="table table-hover text-nowrap">
                    <thead style="background-color: Dodgerblue;color:white;">
                      <tr>
                        <th>Trạng thái</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Công ty</th>
                        <th>Dự án</th>
                        <th>Người phụ trách</th>
                        <th>Mức độ ưu tiên</th>
                        <th>Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tasks as $task)
                        <tr>
                            <td>                       
                                <a href="{{URL::to('tasks/edit', $task->id)}}" style="padding-right: 5px;color: Dodgerblue;">
                                  <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa công việc này không?')" href="{{URL::to('tasks/delete', $task->id)}}" style="color:red;">
                                    <i class="fas fa-trash"></i>  
                                </a>                                           
                              </td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->project->company->name}}</td>
                            <td>{{$task->project->name}}</td>
                            <td>{{$task->person->full_name}}</td>
                            <td style="text-align: center;">
                                @switch($task->priority)
                                    @case(1)
                                        Cao
                                        @break
                                    @case(2)
                                        Trung bình
                                        @break
                                    @case(3)
                                        Thấp
                                        @break
                                @endswitch
                            </td>
                            <td style="text-align: center;">
                                @switch($task->status)
                                    @case(1)
                                        Mới tạo
                                        @break
                                    @case(2)
                                        Đang làm
                                        @break
                                    @case(3)
                                        Hoàn thành
                                        @break
                                    @case(4)
                                        Tạm hoãn
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>
                        </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
            
            <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('footer')
    <script>
        const urlProject = "{{URL::to('tasks/getProject')}}";
        const url = '{{URL::to('/tasks/getPersonByProject')}}';
    </script>
    <script src="{{URL::asset('template/js/main.js')}}"></script>
@endsection