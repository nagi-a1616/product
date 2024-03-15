<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card ">
                <div class="card-header">{{ __('ユーザーログイン画面') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                      

                        
                         
                <div class="row mb-3"> 

                    <div class="row mb-3">
                        <div class="mx-auto" style="width: 500px;">  
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
   
                        
                        
                    <div class="row mb-3">
                        
                        <div class="row mb-3">
                            <div class="mx-auto" style="width: 500px;">  

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="アドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                        <div class="d-grid gap-2 col-6 mx-auto d-md-block grid gap-7 px-5">
                        
                        <a class="btn btn-primary rounded-pill btn btn-warning " href ="register" role="button"style="background-color:#fd7e14" >新規登録</a>

                        
                                <button type="submit" class="btn btn-primary rounded-pill btn btn-info" >
                                    {{ __('ログイン') }}
                                </button>

</div>     

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
