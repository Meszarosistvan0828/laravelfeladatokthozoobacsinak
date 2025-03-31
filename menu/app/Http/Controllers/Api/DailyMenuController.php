<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyMenu;
use Illuminate\Http\Request;

class DailyMenuController extends Controller
{
    
    public function index()
    {
        $menus = DailyMenu::all();
        return response()->json($menus);
    }

    public function search($query)
    {
        $menus = DailyMenu::where('name', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->get();
            
        return response()->json($menus);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0'
        ]);

        $menu = DailyMenu::create($validated);

        return response()->json($menu, 201);
    }
}