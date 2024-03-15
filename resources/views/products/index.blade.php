
@extends('layouts.app')
<script src="{{ asset('java/sass/app.scss') }}" defer></script>
@push('styles') <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

@section('content')
<div class="container">
<h1 class="mb-4">商品一覧画面</h1>


@csrf


<div class="search mt-5">
 <form action="{{ route('products.index') }}" method="GET" class="row g-3">
    <div class="row">
   <div class="col-sm-12 col-md-3">
   <input type="text" name="search" class="form-control" placeholder="検索キーワード" value="{{ request('search') }}">
</div>
    
    

    
           
            <div class="col-sm-12 col-md-3">
            <select class="form-select" id="company_id" name="company_id">
            <option selected>メーカー名</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
</select>
 </div>
            <div class="col-sm-12 col-md-1">
            <button class="btn btn-outline-secondary" type="submit">検索</button>  
        </div>
</div>

    </form>
</div>
<div class="products mt-5">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th><a href="{{ route('products.create') }}" button type="button"  class="btn btn-warning " style="background-color:#fd7e14">新規登録</a></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}<span>.</span></td>
                    <td><img src="{{ asset($product->img_path) }}" alt="商品画像" width="100"></td>
                    <td>{{ $product->product_name }}</td>
                    <td><span>￥</span>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    </td>
                    <td>
                        
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm mx-1">詳細</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">削除</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <ul class="pagination justify-content-center">
    {{ $products->links() }}
    </ul>
</div>
@endsection