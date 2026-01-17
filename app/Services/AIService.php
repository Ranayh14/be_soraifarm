<?php

namespace App\Services;

class AIService
{
    /**
     * Generate resep suggestions based on ingredients or budget.
     * This is a simulation logic as per requirements.
     *
     * @param array $data
     * @return array
     */
    public function generateResep(array $data)
    {
        // Simulation logic
        $bahan = $data['bahan'] ?? [];
        $budget = $data['budget'] ?? 0;

        // In a real app, this would call OpenAI or Gemini API
        // For now, we return a simulated response based on input
        
        $suggestions = [
            [
                'title' => 'Simulated Recipe 1 for ' . implode(', ', $bahan),
                'difficulty' => 'mudah',
                'estimated_cost' => $budget > 0 ? $budget * 0.8 : 50000,
                'description' => 'A delicious simulated recipe.'
            ],
            [
                'title' => 'Simulated Recipe 2',
                'difficulty' => 'sulit',
                'estimated_cost' => $budget > 0 ? $budget : 75000,
                'description' => 'Another great option.'
            ]
        ];

        return [
            'status' => 'success',
            'data' => $suggestions,
            'note' => 'This is a simulated AI response.'
        ];
    }
}
