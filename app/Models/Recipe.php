<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'ingredients', 'preparation', 'difficulty', 'time', 'user_id'];

    protected $casts = [
        'ingredients' => 'array',
    ];
    
    public function getIngredientsAttribute($value)
    {
        return explode(', ', $value);
    }

    public function setIngredientsAttribute($value)
    {
        $this->attributes['ingredients'] = implode(', ', $value);
    }
}
