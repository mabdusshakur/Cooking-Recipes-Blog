<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'prepare_time' => 'nullable|integer',
            'difficulty' => 'nullable|string|max:50',
            'serving' => 'nullable|integer',
            'main_image' => 'nullable|image',
            'long_description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'category_id' => 'nullable|exists:recipe_categories,id',
            'author_id' => 'nullable|exists:authors,id',
            'is_active' => 'nullable|in:0,1',

            'ingredients' => 'nullable|array',
            'ingredients.*.name' => 'nullable|string',
            'ingredients.*.quantity' => 'nullable|numeric',

            'equipments' => 'nullable|array',
            'equipments.*.name' => 'nullable|string',

            'NutritionalValues' => 'nullable|array',
            'NutritionalValues.*.name' => 'nullable|string',
            'NutritionalValues.*.amount' => 'nullable|numeric',
            'NutritionalValues.*.calorie_per_gram' => 'nullable|numeric',
        ];
    }
}
