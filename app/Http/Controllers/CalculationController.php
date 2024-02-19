<?php

namespace App\Http\Controllers;

use App\Services\CalculationService;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CalculationController extends Controller
{
    protected $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function calculate(Request $request)
    {
        // Retrieve ingredients and quantities from the request
        $ingredients = config('ingredients');
        $calories = $request->input('calories');
        // Determine the action based on the value of the 'action' field
        $action = $request->input('action');
        $result = [];

        // Call the appropriate method from the CalculationService
        switch ($action) {
            case 'highest':
                $result = $this->calculationService->calculateHighestScore($ingredients);
                break;
            case 'per_calories';
                $result = $this->calculationService->calculatePerCalorieScore($ingredients, $calories);
                break;
            default:
                // Handle invalid action...
                break;
        }

        // Prepare data for the view
        $resultData = [
            'score' => $result['score'] ?? null,
            'quantities' => $result['quantities'] ?? [],
            'message' => $result['message'] ?? ''
        ];
        // Flash the result to the session
        Session::flash('result', $resultData);
        // Redirect back to the index view
        return redirect()->route('ingredients.index');
    }


}
