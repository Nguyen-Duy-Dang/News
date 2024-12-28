<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</head>
<body>
@extends ('user.footer')

@section('content')

<div class="container mt-2">
        <div class="row g-3 mt-2">
            <div class="col-8">
                <div class="row">
                @foreach($news as $new)
                <div class="col-4">
                    <img style="width: 100%; height:12vw;" src="{{asset('images/'.$new->HinhAnh)}}" alt="" class="img-fluid"> <br>
                    <a href="/newct/{{$new->MaTT}}" style="font-size: 22px;" class="text-decoration-none">{{$new->TenTT}} </a><br>
                    <span>Ngày đăng :  {{$new->NgayTao}}</span>
                    <p>{{$new->MoTa}}</p>
                </div>
            @endforeach
                </div>
            </div>
            <div class="col-4 ">
            @foreach($news as $new)
            <img style="width: 20%; height:4vw;" src="{{asset('images/'.$new->HinhAnh)}}" alt="" class="img-fluid">
                    <a href="/newct/{{$new->MaTT}}" style="font-size: 22px;" 
                    class="text-decoration-none">{{$new->TenTT}} </a><br>
                    <span>Ngày đăng :  {{$new->NgayTao}}</span><hr>
                    @endforeach    
                 </div>
        </div>
    </div>

   @endsection


   @extends ('user.header')
</body>
</html>
