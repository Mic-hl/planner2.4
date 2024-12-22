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
        
        return Inertia::render('Recipes', [
            'recipes'=> $recipes,
        ]);
    }
}
