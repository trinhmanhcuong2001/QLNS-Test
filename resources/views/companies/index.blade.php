@extends('layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách công ty</h1>
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
                    <th>Thao tác</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($companies as $company)
                    <tr>
                      <td>                       
                        <a href="{{URL::to('companies/edit', $company->id)}}" style="padding-right: 5px;color: Dodgerblue;">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?')" href="{{URL::to('companies/delete', $company->id)}}" style="color:red;">
                          <i class="fas fa-trash"></i>  
                        </a>                                           
                      </td>
                      <td> {{$company->code}} </td>
                      <td> {{$company->name}} </td>
                      <td> {{$company->address}} </td>
                    </tr>
                  @endforeach
                  
                  </tbody>
                </table>
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