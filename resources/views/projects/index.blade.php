@extends('layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <x-atoms.title title="Danh sách dự án" />
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
              <div class="card-header">
                <h3 class="card-title">Danh sách</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead style="background-color: Dodgerblue;color:white;">
                    <tr>
                      <th width="150px">Thao tác</th>
                      <th>Mã</th>
                      <th>Tên</th>
                      <th>Công ty</th>
                      <th>Nhân viên</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($projects as $project)
                    <tr>
                      <td>                       
                        <a href="{{URL::to('projects/edit', $project->id)}}" style="padding-right: 5px;color: Dodgerblue;">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa dự án này không?')" href="{{URL::to('projects/delete', $project->id)}}" style="color:red;">
                          <i class="fas fa-trash"></i>  
                        </a>                                           
                      </td>
                      <td>{{$project->code}}</td>
                      <td> {{$project->name}} </td>
                      <td> {{$project->company->name}} </td>
                      <td><a href="">Danh sách</a></td>
                    </tr>
                  @endforeach
                  
                  </tbody>
                </table>
                {{$projects->links()}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection