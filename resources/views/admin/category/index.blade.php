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
    <h2 class="mb-4">Danh sách Danh Mục</h2>
        <a href="/category/add/">Thêm mới Danh Mục</a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Mã DM</th>
                    <th scope="col">Tên DM</th>
                    <th scope="col">Ngày Tạo</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Hành Động</th>

                </tr>
            </thead>
            <tbody>
               @foreach ($categorys as $category )
                <tr>
                    <td>{{$category->MaDM}}</td>
                    <td>{{$category->TenDM}}</td>
                    <td>{{$category->NgayTao}}</td>
                    <td>{{$category->MoTa}}</td>
                    <td>
                        <a href="/category/edit/{{$category->MaDM}}">Sửa</a> |
                        <a onclick="return confirm ('Bạn có muốn xóa danh mục có id {{$category->MaDM}} này không? ')" 
                        href="/category/delete/{{$category->MaDM}}">Xóa</a>
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
