<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function getLists()
{
    $categories = Company::pluck('company_name');
    return $categories;
}
    public function products()
{
    return $this->hasMany(Product::class);
}


}

