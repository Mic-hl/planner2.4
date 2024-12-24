<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        
        return Inertia::render('RecipeList', [
            'recipes'=> $recipes,
        ]);
    }

    public function create()
    {
        return Inertia::render('RecipeCreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'ingredients.*' => 'required|string|max:255',
            'preparation' => 'required|string',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'time' => 'required|integer|min:1',
        ]);
        
        // Attach the authenticated user
        $validated['user_id'] = Auth::id();

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    public function show(Recipe $recipe)
    {
        return Inertia::render('RecipeDetail', [
            'recipe' => $recipe
        ]);
    }
}
