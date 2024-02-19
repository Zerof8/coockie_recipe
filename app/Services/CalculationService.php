<?php

namespace App\Services;

class CalculationService
{
    public function calculateHighestScore(array $ingredients): array
    {
        $combinations = $this->generateCombinations(count($ingredients), 100);

        $highestScore = 0;
        $highestQuantities = [];

        foreach ($combinations as $combination) {
            $score = $this->calculateCookieScore($ingredients, $combination);
            if ($score > $highestScore) {
                $highestScore = $score;
                $highestQuantities = $this->quantitiesWithNames($ingredients, $combination);
            }
        }

        return ['score' => $highestScore, 'quantities' => $highestQuantities];
    }

    public function calculatePerCalorieScore(array $ingredients, int $calories): array
    {
        $combinations = $this->generateCombinations(count($ingredients), 100);

        $highestScore = 0;
        $highestQuantities = [];
        $caloriesPossible = false;

        foreach ($combinations as $combination) {
            $score = $this->calculateCookieScore($ingredients, $combination);
            $totalCalories = $this->calculateTotalCalories($ingredients, $combination);

            if ($totalCalories == $calories && $score > $highestScore) {
                $highestScore = $score;
                $highestQuantities = $this->quantitiesWithNames($ingredients, $combination);
                $caloriesPossible = true;
            }
        }

        if (!$caloriesPossible) {
            return ['message' => 'calculation not possible with the given calories amount.'];
        }

        return ['score' => $highestScore, 'quantities' => $highestQuantities];
    }

    // Calculate the total calories based on ingredient quantities
    private function calculateTotalCalories(array $ingredients, array $quantities): int
    {
        $totalCalories = 0;

        foreach ($ingredients as $index => $ingredient) {
            $totalCalories += $ingredient['calories'] * $quantities[$index];
        }
        return $totalCalories;
    }

    // Map names to ingredients
    private function quantitiesWithNames(array $ingredients, array $quantities): array
    {
        $result = [];

        foreach ($ingredients as $index => $ingredient) {
            $result[$ingredient['name']] = $quantities[$index];
        }

        return $result;
    }

    // Calculate the score based on quantities
    private function calculateCookieScore(array $ingredients, array $quantities): int
    {
        $properties = ['capacity', 'durability', 'flavor', 'texture'];
        $score = 1;

        foreach ($properties as $property) {
            $propertyScore = 0;

            foreach ($ingredients as $index => $ingredient) {
                $propertyScore += $ingredient[$property] * $quantities[$index];
            }

            $score *= max(0, $propertyScore);
        }

        return $score;
    }

    // Generate all possible combinations of quantities for the given number of ingredients
    // that add up to the total quantity.
    private function generateCombinations(int $numIngredients, int $totalQuantity): array
    {
        $combinations = [];

        $this->generateCombinationsHelper($numIngredients, $totalQuantity, [], $combinations);

        return $combinations;
    }

    // Helper function to generate combinations recursively.
    private function generateCombinationsHelper(int $numIngredients, int $remainingQuantity, array $currentCombination, array &$combinations)
    {
        if ($numIngredients == 1) {
            $currentCombination[] = $remainingQuantity;
            $combinations[] = $currentCombination;
            return;
        }

        for ($i = 0; $i <= $remainingQuantity; $i++) {
            $newCombination = $currentCombination;
            $newCombination[] = $i;
            $this->generateCombinationsHelper($numIngredients - 1, $remainingQuantity - $i, $newCombination, $combinations);
        }
    }
}
