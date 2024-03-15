<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function posts()
    {
        return $this->hasMany(post::class, 'company_name', 'id');
    }
}
