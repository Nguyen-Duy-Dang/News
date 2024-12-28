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
    <div class="container mt-2" style="width:90%;">
        <h2 class="mb-4">Category Form</h2>
        <a href="/new"> quay lai</a>
        <form action="/new/update" method="post" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <input type="hidden" required value="{{$new->MaTT}}" class="form-control" name="MaTT"  readonly>
            </div>
            <div class="form-group">
                <label for="TenDM">Tên Tin Tức </label>
                <input type="text" required value="{{$new->TenTT}}" class="form-control" name="TenTT" >
            </div>
            <div class="form-group">
                <label for="HinhAnh"> Ảnh Cũ </label>
                @if($new->HinhAnh )
            <div>
                <img src="{{ asset('images/'.$new->HinhAnh) }}" width="100">
            </div>
        @endif
        <input type="file" class="form-control" name="image"
         value="{{ url('images/'.$new->HinhAnh) }}">
    
            </div>
            
            <div class="form-group">
                <label for="NgayTao">Ngày Tạo </label>
                <input type="datetime-local" value="{{$new->NgayTao}}"  class="form-control" name="NgayTao">
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả </label>
                <textarea class="form-control"  name="MoTa" rows="3">{{ $new->MoTa }}</textarea>
            </div>
            <div class="form-group">
                <label for="MaDM">Mã Danh Mục </label>
                <select class="form-control" id="MaDM" name="MaDM" required>
                  
                @foreach($categories as $category)
                        <option value="{{ $category->MaDM }}"
                         {{ $category->MaDM == $new->MaDM ? 'selected' : '' }}>{{ $category->TenDM }}</option>
                    @endforeach
                   
                </select>
            <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
        </form>
    </div>

    @endsection
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
