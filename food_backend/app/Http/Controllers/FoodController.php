<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Ingredient;

class FoodController extends Controller {
    public function index() {
        return response()->json(Food::with('ingredients')->get());
    }
    
    public function store(Request $request) {
        $food = Food::create($request->only(['name', 'description']));
        if ($request->has('ingredients')) {
            $food->ingredients()->attach($request->ingredients);
        }
        return response()->json($food->load('ingredients'), 201);
    }
    
    public function ingredients() {
        return response()->json(Ingredient::all());
    }
    
    public function searchByIngredient($ingredient) {
        $foods = Food::whereHas('ingredients', function($query) use ($ingredient) {
            $query->where('name', 'like', "%$ingredient%");
        })->with('ingredients')->get();
        return response()->json($foods);
    }
}