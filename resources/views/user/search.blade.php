<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    @extends ('user.footer')
    
    @section('content')
    
    <div class="container mt-5">
    <div class="row g-3 ">
    <h2>Kết quả tìm kiếm :</h2>

@if($news->isEmpty())
    <h4>Không tìm thấy sản phẩm nào phù hợp.</h4>
@else
@foreach($news as $new)
                <div class="col-4">
                    <img style="width: 100%; height:16vw;" src="{{asset('images/'.$new->HinhAnh)}}" alt="" class="img-fluid"> <br>
                    <a href="/newct/{{$new->MaTT}}" style="font-size: 22px;" class="text-decoration-none">{{$new->TenTT}} </a><br>
                    <span>Ngày đăng :  {{$new->NgayTao}}</span>
                    <p>{{$new->MoTa}}</p>
                </div>
            @endforeach
@endif
</div>
    </div>
    @endsection

    @extends ('user.header')
</body>
</html>