<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
</style>
<body>
@extends('layouts.navigation')
    @section('content')
    
    
    <div class="container mt-5" style="width:90%;">
        <h2 class="mb-4">Category Form</h2>
        <a href="/category"> quay lai</a>
        <form action="/category/create" method="post" >
        @csrf
            <!-- <div class="form-group">
                <label for="MaDM">Mã Danh Mục </label>
                <input type="number" class="form-control" name="MaDM" placeholder="Enter MaDM" readonly>
            </div> -->
            <div class="form-group">
                <label for="TenDM">Tên Danh Mục </label>
                <input type="text" required class="form-control" value="{{old('TenDM')}}"  name="TenDM" placeholder="Enter TenDM">
            @error('TenDM')
                <p style="color: red;">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="NgayTao">Ngày Tạo </label>
                <input type="datetime-local"required value="{{old('NgayTao')}}" class="form-control" name="NgayTao">
            @error('NgayTao')
                <p style="color: red;">{{$message}}</p>
            @enderror
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả </label>
                <textarea class="form-control"required value="{{old('MoTa')}}" name="MoTa" rows="3" placeholder="Enter MoTa"></textarea>
            @error('MoTa')
                <p style="color: red;">{{$message}}</p>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
    @endsection
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
