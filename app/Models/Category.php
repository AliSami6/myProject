<?php

namespace App\Models;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_name',
        'slug',
    ];
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
