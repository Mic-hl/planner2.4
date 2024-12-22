<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
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

    public function show(Recipe $recipe)
    {
        return Inertia::render('RecipeDetail', [
            'recipe' => $recipe
        ]);
    }
}
