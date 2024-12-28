<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.navigation')
@section('content')

    <div class="container mt-5">
    <h2 class="mb-4">Danh sách Tin Tức</h2>
    
        <a href="/demo">Thêm mới Tin Tức</a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Mã TT</th>
                    <th scope="col">Tên TT</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Ngày Tạo</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Mã DM</th>
                    <th scope="col">Hành Động</th>

                </tr>
            </thead>
            <tbody>
               @foreach ($news as $new )
                <tr>
                    <td>{{$new->MaTT}}</td>
                    <td>{{$new->TenTT}}</td>
                    <td><img style="width: 100px; height:100px;" src="{{ asset('images/'. $new->HinhAnh) }}"></td>
                    <td>{{$new->NgayTao}}</td>
                    <td>{{$new->MoTa}}</td>
                    <td>{{$new->MaDM}}</td>
                    <td>
                        <a href="/new/edit/{{$new->MaTT}}">Sửa</a> |
                        <a onclick="return confirm ('Bạn có muốn xóa danh mục có id {{$new->MaTT}} này không? ')" 
                        href="/new/delete/{{$new->MaTT}}">Xóa</a>
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
