@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
             <div class="card">
               <div class="card-header">
                   <h4 style="float:left;">ADD USERS </h4>
                   <a href="#" style="float:right;" class=" btn bnt-dark" 
                   data-toggle="modal" data-target="#addUser">
                   <i class="fa fa-plus"></i> ADD NEW USERS</a>

                </div>
                <div class="card-body">
                <table class="table table-bordered table-left">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th> 
                            <th>Actions</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->is_admin == 1) Admin 
                                    @else Cashier
                                    @endif
                                </td>
                                <td>
                                    <div class="form-group">
                                       <a href="#" data-toggle="modal" data-target="#editUser{{$user->id}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                                       <a href="#" data-toggle="modal" data-target="#deleteUser{{$user->id}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <!-- edit user modal-->
                            <div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Edit User </h4>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                            {{$user->id}}
                                        </div>
                                        <div class="modal-body">
                                            <form  Action="{{route ('users.update', $user->id) }}" Method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Email</label>
                                                    <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Password</label>
                                                    <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Role</label>
                                                <select name="is_admin" id="" class="form-control">
                                                        <option value="1" @if($user->is_admin == 1 )Selected @endif>Admin</option>
                                                        <option value="2" @if($user->is_admin == 2 )Selected  @endif>Cashier</option>
                                                </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-warning btn-block">Make Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <!-- delete modal-->
                           <div class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">  Delete User </h4>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                            {{$user->id}}
                                        </div>
                                        <div class="modal-body">
                                            <form  Action="{{route ('users.destroy',$user->id) }}" Method="POST">
                                                @csrf
                                                @method('delete')
                                                <p>Are you sure you want to delete this user {{$user->name}} ? </p>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal"> cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <!-- end of delete modal-->
                        @endforeach
                    </tbody>
                </table>
                </div>
             </div>
        </div>
        
    </div>
</div>
<div class="container" id="search">
    <div class="col-md-4">
        <div class=card>
            <div class="card-header">
                <h4>SEARCH USER </h4>
            </div>
            <div class="card-body"> 
                .......
            </div>
        </div>
    </div>
</div> 


<!-- modal section-->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">ADD USER </h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form  Action="{{route ('users.store') }}" Method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Role</label>
                <select name="is_admin" id="" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Cashier</option>
                </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block">Save User</button>
                </div>
         </form>   
      </div>
    </div>
  </div>
</div>




<style>
  #search{
      position:fixed;
      top:81px;
      right:-650px;
  }  
  .modal.right .modal-dialog{
      position:absolute;
      top:0px;
      right:0px;
      margin-right:20vh;
  }
  .modal.fade:not(.in).left .modal-dialog{
      -webkit-transform:translate3d(50%,0,0);
      transform:translate3d(50%,0,0);
  }
</style>

@endsection
 