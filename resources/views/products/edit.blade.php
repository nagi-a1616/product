@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>商品情報編集画面</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                            <label for="id" class="form-label">ID.</label>
                                <input type="number" class="form-control" id="id" name="id" value="{{ $product->id }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">商品名<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="company_id" class="form-label">メーカー名<span class="text-danger">*</span></label>
                                <select class="form-select" id="company_id" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ $product->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">価格<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">在庫数<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">コメント</label>
                                <textarea id="comment" name="comment" class="form-control" rows="3">{{ $product->comment }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="img_path" class="form-label">商品画像</label>
                                <input id="img_path" type="file" name="img_path" class="form-control">
                                <img src="{{ asset($product->img_path) }}" rows="3" alt="商品画像" class="product-image p-5 " width="700">
                            
                             </div>
                                
                                
                            
                            
                                <div class="d-grid gap-2 col-6 ms-5 mx-auto d-md-block grid gap-1">
                                <button type="submit"  class="btn btn-warning " style="background-color:#fd7e14">更新</button>
                            <a href="{{ route('products.index') }}" class="btn btn-info">戻る</a>

                        </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
