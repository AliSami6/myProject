<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'details',
        'image',
        'link',
       
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
