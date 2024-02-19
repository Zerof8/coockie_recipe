<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the ingredients.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ingredients = config('ingredients');
        return view('ingredients.index', ['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created ingredient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|numeric',
            'durability' => 'required|numeric',
            'flavor' => 'required|numeric',
            'texture' => 'required|numeric',
            'calories' => 'required|numeric',
        ]);

        // Check if the name already exists
        if (Ingredient::where('name', $request->name)->exists()) {
            return redirect()->back()->withErrors(['name' => 'The ingredient already exists'])->withInput();
        }

        Ingredient::create($validatedData);

        return redirect()->route('ingredients.index')->with('success', 'The ingredient has been successfully added!');
    }




    /**
     * Show the form for editing the specified ingredient.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\View\View
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified ingredient in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name,' . $ingredient->id,
            'capacity' => 'required|numeric',
            'durability' => 'required|numeric',
            'flavor' => 'required|numeric',
            'texture' => 'required|numeric',
            'calories' => 'required|numeric',
            ]);

        $ingredient->update($validatedData);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully!');
    }

    /**
     * Remove the specified ingredient from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully!');
    }

}
