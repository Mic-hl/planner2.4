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
        $recipes = Recipe::paginate(15);

        return Inertia::render('Recipe/Index', [
            'recipes' => $recipes,
        ]);
    }

    public function create(Request $request)
    {
        $currentPage = $this->getCurrentPage($request);

        return Inertia::render('Recipe/Create', [
            'page' => $currentPage,
        ]);
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

        $validated['user_id'] = Auth::id();

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    public function show(Recipe $recipe, Request $request)
    {
        $currentPage = $this->getCurrentPage($request);

        return Inertia::render('Recipe/Show', [
            'recipe' => $recipe,
            'page' => $currentPage,
        ]);
    }

    public function destroy(Recipe $recipe, Request $request)
    {
        $currentPage = $this->getCurrentPage($request);
        $recipe->delete();

        return redirect()->route('recipes.index', ['page' => $currentPage])
                         ->with('success', 'Recipe deleted successfully!');
    }

    private function getCurrentPage(Request $request)
    {
        $currentPage = $request->query('page');

        if (!$currentPage) {
            $currentPage = $request->input('page', 1);
        }

        return $currentPage;
    }
}
