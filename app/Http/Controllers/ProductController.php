<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\Company; 
use Illuminate\Http\Request;
// Requestクラスはブラウザに表示させるフォームから送信されたデータをコントローラのメソッドで引数として受け取ることができます。

class ProductController extends Controller
{
   
    public function index(Request $request)
        {
            $query = Product::query();
            // 商品名の検索キーワードがある場合、そのキーワードを含む商品をクエリに追加
            $company = $request->input('company');
            $companies = Company::all();
            
    if($search = $request->search){
        $query->where('product_name', 'LIKE', "%".$search."%");
    }
    if($select = $request->company_id){
        $query->where('company_id','=',$select);
    }
            $products = $query->paginate(5); 
            
            return view('products.index',['products' => $products,'companies' => $companies ]);
        }
       
        public function create()
        {
            // 商品作成画面で会社の情報が必要なので、全ての会社の情報を取得します。
            $companies = Company::all();
    
            // 商品作成画面を表示します。その際に、先ほど取得した全ての会社情報を画面に渡します。
            return view('products.create', compact('companies'));

            
        }
        
   
     
      
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'product_name' => 'required', //requiredは必須という意味です
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'comment' => 'nullable', //'nullable'はそのフィールドが未入力でもOKという意味です
            'img_path' => 'nullable|image|max:2048',
        ]);
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    
      // 新しく商品を作る。リクエストから取得
      $product = new Product([
        'product_name' => $request->get('product_name'),
        'company_id' => $request->get('company_id'),
        'price' => $request->get('price'),
        'stock' => $request->get('stock'),
        'comment' => $request->get('comment'),
    ]);
  
    
    if($request->hasFile('img_path')){ 
        $filename = $request->img_path->getClientOriginalName();
        $filePath = $request->img_path->storeAs('products', $filename, 'public');
        $product->img_path = '/storage/' . $filePath;
    }   
        // 作成したデータベースに新しいレコードとして保存
        $product->save();
        // 商品一覧画面に戻る
        return redirect('products');

       
        return redirect('/');
    }
    
    public function show(Product $product)
    {
         // 商品詳細画面を表示
         return view('products.show', ['product' => $product]);
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // 全ての会社の情報を取得
        $companies = Company::all();
         // 商品編集画面を表示
         return view('products.edit', compact('product', 'companies'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
   // 必要な情報が全て揃っているかチェックします。
   $request->validate([
    'product_name' => 'required',
    'price' => 'required',
    'stock' => 'required',
]);

    // 商品の情報を更新
    $product->product_name = $request->product_name;
    $product->price = $request->price;
    $product->stock = $request->stock;
    

   
    if($request->hasFile('img_path')){ 
        $filename = $request->img_path->getClientOriginalName();
        $filePath = $request->img_path->storeAs('products', $filename, 'public');
        $product->img_path = '/storage/' . $filePath;
    }   
        // 作成したデータベースに新しいレコードとして保存
        $product->save();
    
        $dir = 'product';

        // アップロードされたファイル名を取得
        $file_name = $request->file('img_path')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('img_path')->storeAs('public/' . $dir, $file_name);

   
    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       
       $product->delete();
       return redirect('/products');
       
    }

  

 
}


//**  画像保存


    