@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ユーザー新規登録画面') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        
                        <div class="row mb-3">
                           

                        <div class="row mb-3">
                        <div class="mx-auto" style="width: 500px;">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" name="password" required autocomplete="new-password">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="アドレス" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                       

                        <div class="d-grid gap-2 col-6 mx-auto d-md-block grid gap-7 p-3">
                          
                                <button type="submit" class="btn  rounded-pill btn text-black " href ="login" style="background-color:#fd7e14 ">
                                    {{ __('新規登録') }}
                                </button>
                                <a class="btn btn-primary rounded-pill btn btn-info " href ="login" role="button" >戻る</a>
                        </div>   
     
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
