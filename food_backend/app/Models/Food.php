<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Food extends Model {
    protected $table = 'foods';
    protected $fillable = ['name', 'description'];
    public function ingredients() {
        return $this->belongsToMany(Ingredient::class, 'food_ingredient');
    }
}
