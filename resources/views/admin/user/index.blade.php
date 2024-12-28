<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.navigation')
@section('content')
    <div class="container mt-5">
    <h2 class="mb-4">Danh sách Người Dùng</h2>
        
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Role</th>
                    <th scope="col">Hành Động</th>

                </tr>
            </thead>
            <tbody>
               @foreach ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td><img width="50px;" src="{{asset('/storage/'.$user->avatar)}}" alt=""></td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a onclick="return confirm ('Bạn có muốn xóa danh mục có id {{$user->id}} này không? ')" 
                        href="/user/delete/{{$user->id}}">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
