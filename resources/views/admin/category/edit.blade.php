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
        <form action="/category/update" method="post" >
        @csrf
            <div class="form-group">
                <input type="hidden" value="{{$category->MaDM}}" class="form-control" name="MaDM"  readonly>
            </div>
            <div class="form-group">
                <label for="TenDM">Tên Danh Mục </label>
                <input type="text" value="{{$category->TenDM}}" class="form-control" name="TenDM" >
            </div>
            <div class="form-group">
                <label for="NgayTao">Ngày Tạo </label>
                <input type="datetime-local" value="{{$category->NgayTao}}"  class="form-control" name="NgayTao">
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả </label>
                <textarea class="form-control"  name="MoTa" rows="3">{{ $category->MoTa }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    @endsection
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
