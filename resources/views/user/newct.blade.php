<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

                <div class="col-10">
                    <h3>Hôm nay là ngày : {{date('d')}} Tháng {{date('m')}} Năm{{date('y')}}</h3>
                    <img style="width: 100%; height:25vw;" src="{{asset('images/'. $news->HinhAnh)}}" alt="{{ $news->TenTT }}" class="img-fluid"> <br>
                    <a href="" style="font-size: 22px;" class="text-decoration-none">{{$news->TenTT}} </a><br>
                    <span>Nguyễn Duy Đẳng  {{$news->NgayTao}}</span><br>
                    <p>{{$news->MoTa}}<br> Trong các tuần lễ thời trang, ngoài thời trang của các sao là vấn đề gây chú ý thì thời trang của các fashionista cũng là một chủ đề được bàn tán sôi nổi. Ở Việt Nam, tại các tuần lễ thời trang, các fashionista có dịp thể hiện gu ăn mặc độc đáo của mình trong các sự kiện đề cao thời trang đẳng cấp. Một điều rất dễ nhìn thấy ở các fashionta lẫn các fashiontisto khi đến dự các tuần lễ thời trang đó chính là tính “độc” và “dị” trong trang phục, như thể càng độc, càng dị bạn sẽ càng được chú ý nhiều hơn. <br><br>

 

Nếu nói về độ “dị” chắc hẳn không thể không nói đến phong cách thời trang của giới trẻ Nhật Bản. Không chỉ trong các tuần lễ thời trang, rất dễ bắt gặp những bộ cánh độc đáo hay những cách trang điểm, kiểu tóc không giống ai của các bạn trẻ Nhật Bản trên đường phố.<br><br>

 

Không kể đến những fashionista có gu thời trang khác với những “dị bản”. Trên thảm đỏ của các tuần lễ thời trang Việt Nam không thiếu những bạn trẻ gây sốc khi đến dự cùng những bộ trang phục mang phong cách “chứng tỏ mình là fashionista/fashionisto”. Thường thấy là những bộ quần áo bất chấp thời tiết, bất chấp các quy tắc phối đồ.<br></p>

<!-- Form action -->
@if(Auth::check())
    <form action="{{ route('comment', $news->MaTT) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Bình luận:</label>
            <textarea name="comment" id="content" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Gửi</button>
    </form>
    @else
                <a class="login" href="{{route('login')}}">
                    Đăng nhập để gửi bình luận
                </a>
            
@endif



<div class="comment">
    <h2>Đã bình luận :</h2>
    @foreach ($comments as $comment)
    <div class="item">
        <p>{{$comment->id_user}}</p>
        <p>{{$comment->comment}}</p>
    </div>
    @endforeach
</div>

                </div>

                <div class="col-2 ">
            
                 </div>
            
        </div>
    </div>

   @endsection


   @extends ('user.header')
</body>
</html>
