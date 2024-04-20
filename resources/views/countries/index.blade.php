@extends('layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách quốc gia</h1>
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
                    <th><input type="checkbox"></th>
                    <th width="150px">Thao tác</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($countries as $country)
                    <tr>
                      <td><input type="checkbox" value="{{$country->id}}"></td>
                      <td>                       
                        <a href="{{URL::to('countries/edit', $country->id)}}" style="padding-right: 5px;color: Dodgerblue;">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa quốc gia này không?')" href="{{URL::to('countries/delete', $country->id)}}" style="color:red;">
                          <i class="fas fa-trash"></i>  
                        </a>                                           
                      </td>
                      <td>{{$country->code}}</td>
                      <td>{{$country->name}}</td>
                      <td> {{$country->description}} </td>
                      
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
