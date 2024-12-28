<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>





@extends('layout.layout')

@section('content')
<div class="content">
    <div class="news">
        <div class="title">
            <h2>Tin vắn cho bạn</h2>
            <p>Ngày {{date('d')}} Tháng {{date('m')}}</p>
        </div>
        <div class="news_content">
            @foreach ($news as $new)
            <a class="news_item" href="{{route('news',$new->id)}}">
                <div class="item">
                    <div class="texts">
                        <div class="top">
                            <h4>{{$new->author}}</h4>
                            <p>{{$new->title}}</p>
                        </div>
                        <span>{{$new->created_at}}</span>
                    </div>
                    <img src="{{ asset('images/'. $new->image) }}" alt="">
                </div>
            </a>
            @endforeach
            <div class="hr"></div>
        </div>
    </div>
    <div class="topic">
        <p>Chủ đề của bạn</p>
        <div class="content_topic">
           
                @foreach ($categories as $category)
                @if ($category->id == 1 || $category->id == 3)
                    <div class="items outstanding category_item" category="{{$category->id}}"> 
                @else
                    <div class="items category_item" category="{{$category->id}}">   
                @endif
                <a class="topic_name" href="{{route('category',$category->id)}}">{{$category->name}}<i class="fa-solid fa-chevron-right"></i></a>
                    @foreach ($news as $new)
                        @if ($new->category == $category->id)
                        <a class="news_category_item" category="{{$new->category}}" href="{{route('news',$new->id)}}">
                        <div class="item">
                            <div class="texts">
                                <p>{{$new->title}}</p>
                                <span>{{$new->created_at}}</span>
                            </div>
                            <img src="{{ asset('images/'. $new->image) }}" alt="">
                        </div>
                        </a>
                        @endif
                    @endforeach
                </div>
                @endforeach
                
        </div>
    </div>
</div>
@endsection




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Tin tức</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="sticky">
        <nav>
            <div class="logo">
                <a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
            </div>
            <div class="search">
                <form action="{{route('search')}}" method="get">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Tìm kiếm chủ đề, vị trí và nguồn" name="content" @isset ($value_search) value="{{$value_search}}" @endisset>
                </form>
            </div>
            <div class="account">
                @guest
                    <a href="{{route('login')}}"><button>Đăng nhập</button></a>
                @endguest
                @auth
                    <div>
                        @if (Auth::user()->role == "admin" || Auth::user()->role == "staff")
                        <a href="{{route('category.list')}}" class="admin">Quản trị</a>
                        @endif
                        <a href="{{route('account')}}" class="image"><img src="{{ asset('images/'. Auth::user()->image) }}" alt=""></a>
                    </div>
                @endauth
            </div>
        </nav>
        <div class="list_category">
            <ul>
                <a href="{{route('about')}}"><li @class(['selected' => $navigational == 'about'])>Giới thiệu</li></a>
                <a href="{{route('index')}}"><li @class(['selected' => $navigational == 'index'])>Trang chủ</li></a>
                <a href="{{route('all')}}" @class(['selected' => $navigational == 'all'])><li>Tất cả</li></a>
                @foreach ($categories as $category)
                    <a href="{{route('category',$category->id)}}"><li @class(['selected' => $navigational == $category->id])>{{$category->name}}</li></a>
                @endforeach
            </ul>
        </div>
    </div>
    @yield('content')
    {{-- Message --}}
    @include('shared.message')
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html> 

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-group" style="margin-top: 10px;">
        <label for="avatar">Avatar</label><br>
        <input type="file" name="avatar" class="form-control" id="avatar">
         </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-group" style="margin-top: 10px;">
        <label for="avatar">Avatar</label><br>
        <input type="file" name="avatar" class="form-control" id="avatar">
         </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>



