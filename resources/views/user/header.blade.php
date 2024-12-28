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
<div class="container-fluidd">
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class=" navbar-nav me-auto  mb-lg-0" style="padding-left: 100px;" 20px>
        <li class="nav-item">
          <a class="nav-link text-white " style="font-size:18px; ;" href="/">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="font-size:18px;" href="about">Giới thiệu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="font-size:18px;" href="#"> Xã hội</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="font-size:18px;" href="#"> Thể thao</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="font-size:18px;" href="#">Thời sự</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" style="font-size:18px;" href="/contact">Liên hệ</a>
        </li>
      </ul>
      <form class="d-flex" method="get" action="{{route('search')}}" style="height: 3vw;">
        <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm tin tức...">
        <button class="btn btn-outline-success me-5" style="width: 10vw;" type="submit">Tìm kiếm</button>
      </form>

      <form class="d-flex" >
        <ul >
        <li >
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0  sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 text-white dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" style="margin-right: 1vw;" class="text-sm text-gray-700  text-white dark:text-gray-500 underline">Đăng nhập</a> |

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="margin-right: 3vw;" class="ml-4 text-sm text-white text-gray-700 dark:text-gray-500 underline">Đăng ký</a>
                        @endif
                    @endauth
                </div>
            @endif
            
        </li>
        </ul>
      </form>
    </div>
  </div>
</nav>

</header>
</div>
@yield('content')
</body>
</html>
