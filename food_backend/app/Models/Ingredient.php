<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {
    protected $table = 'ingredients';
    protected $fillable = ['name'];
    public function foods() {
        return $this->belongsToMany(Food::class, 'food_ingredient');
    }
}
