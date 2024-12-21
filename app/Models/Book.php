<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'author', 
        'isbn', 
        'category_id',
        'description',
        'cover'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
