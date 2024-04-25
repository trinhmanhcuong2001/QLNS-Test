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
                      @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                        <tr>
                            <td>                       
                                <a href="" style="padding-right: 5px;color: Dodgerblue;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa công việc này không?')" href="" style="color:red;">
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
                      @else
                        <tr>
                            <td style="text-align: center;" colspan="8">Không tìm thấy công việc nào!</td>    
                        </tr>  
                      @endif
                      
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