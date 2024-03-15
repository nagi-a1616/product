@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">商品新規登録画面</h1>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

       

    
    <div class="row mb-3">
        <label for="product_name" class="col-sm-2 col-form-label">商品名<span class="text-danger">*</span></label>
        <div class="col-sm-10">   
        <input id="product_name" type="text" name="product_name" class="form-control" required>
        </div>
    </div>   
       
    <div class="row mb-3">
            <label for="company_id" class="col-sm-2 col-form-label">メーカー名<span class="text-danger">*</span></label>
            <div class="col-sm-10">
            <select class="form-select" id="company_id" name="company_id">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            </div>
    </div>

    <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">価格<span class="text-danger">*</span></label>
            <div class="col-sm-10">
            <input id="price" type="text" name="price" class="form-control" required>
             </div>
        </div>
       
        <div class="row mb-3">
            <label for="stock" class="col-sm-2 col-form-label">在庫数<span class="text-danger">*</span></label>
            <div class="col-sm-10">
            <input id="stock" type="text" name="stock" class="form-control" required>
            </div>
        </div>
        
    <div class="row mb-3">
            <label for="comment" class="col-sm-2 col-form-label">コメント</label>
            <div class="col-sm-10">
            <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
            </div>
    </div>
        
    
    <div class="row mb-3">
<label for="img_path" class="col-sm-2 col-form-label">商品画像</label>
            <div class="col-sm-10">
            @csrf
            <input id="img_path" type="file" name="img_path" class="form-control" required>
                     
        <div class='d-flex justify-content-around p-5 m-5'>
          
        <button type="submit"  class="btn btn-warning " style="background-color:#fd7e14">新規登録</button>

        <a href="{{ route('products.index') }}" class="btn btn-info">戻る</a>
</div>
</div>
     


    </form>


</div>
@endsection