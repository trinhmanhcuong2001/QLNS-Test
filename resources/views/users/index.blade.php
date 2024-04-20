@extends('layout')
@section('head')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách người dùng</h1>
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
                    <th>Thông tin</th>
                    <th>Thao tác</th>
                    <th>Tài khoản</th>
                    @foreach ($roles as $role)
                     <th>{{$role->role}}</th>
                    @endforeach
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>
                        @if ($user->person)
                          <a href="{{URL::to('people/detail', $user->person->id)}}">Chi tiết</a>
                        @else
                          <a href="{{URL::to('people/create/user_id='. $user->id)}}">Thêm thông tin</a>
                        @endif
                      </td>
                      <td>                       
                        <a href="{{URL::to('users/edit', $user->id)}}" style="padding-right: 5px;color: Dodgerblue;">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?')" href="{{URL::to('users/delete', $user->id)}}" style="color:red;">
                          <i class="fas fa-trash"></i>  
                        </a>                                           
                      </td>
                      <td> {{$user->email}} </td>
                      @foreach ($roles as $role)
                          <td>
                            <input type="checkbox" name="role_id" id="input_checkbox" value="{{$role->id}}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} 
                            onclick="handleCheckbox({{$user->id}},this)">
                          </td>
                      @endforeach
                     
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
@section('footer')
    <script>
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const inputCheckbox = document.querySelector('#input_checkbox');
      function handleCheckbox(id,checkbox){
        if(checkbox.checked){
          addRole(id, checkbox.value);
        }
        else{
          removeRole(id, checkbox.value);
        }
      }
      function addRole(id,role){
        if(confirm('Xác nhận trao quyền cho người dùng?')){
          fetch("{{url('/users/addRole')}}", {
            method: 'POST',
            headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-Token' : csrfToken
                      },
            body: JSON.stringify({user_id: id, role_id: role})
          })
          .then(response => response.json())
          .then(data => {
            alert('Trao quyền thành công!');
          })
          .catch(error => {
            console.error(error);
            alert('Xảy ra lỗi ');
          })
        }else{
          inputCheckbox.checked = false;
        }
      }
      function removeRole(id,role){
        if(confirm('Xác nhận bỏ quyền của người dùng?')){
          fetch("{{url('/users/removeRole')}}", {
            method: 'DELETE',
            headers: {
                          'Content-Type': 'application/json',
                          'X-CSRF-Token' : csrfToken
                      },
            body: JSON.stringify({user_id: id, role_id: role})
          })
          .then(response => response.json())
          .then(data => {
            alert('Xóa quyền thành công!');
          })
          .catch(error => {
            console.error(error);
            alert('Xảy ra lỗi ');
          })
        }else{
          inputCheckbox.checked = true;
        }
      }
    </script>
@endsection