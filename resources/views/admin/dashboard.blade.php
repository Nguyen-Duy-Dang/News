<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
           
                        <div class="d-flex align-items-center">
                            @if ($user->avatar)
                                <img src="{{ asset('avatar/' . $user->avatar) }}" alt="Avatar" class="rounded-circle" width="50" height="50">
                            @else
                                <img src="{{ asset('storage/default-avatar.png') }}" alt="Avatar" class="rounded-circle" width="50" height="50">
                            @endif
                            <span  class="ml-3">{{ $user->name }}</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
