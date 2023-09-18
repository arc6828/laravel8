<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory; 
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'actor', 'price', 'special', 'common_id', 'sold'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function orderlines()
    {
        return $this->hasMany(Orderline::class, 'movie_id');
    }
}
