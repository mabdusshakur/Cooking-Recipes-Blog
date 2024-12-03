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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'prepare_time' => 'required|integer',
            'difficulty' => 'required|string|max:50',
            'serving' => 'required|integer',
            'main_image' => 'required|image',
            'long_description' => 'required|string',
            'short_description' => 'required|string|max:500',
            'category_id' => 'required|exists:recipe_categories,id',
            'author_id' => 'required|exists:authors,id',
            'is_active' => 'nullable|in:0,1',

            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string',
            'ingredients.*.quantity' => 'required|numeric',

            'equipments' => 'required|array',
            'equipments.*.name' => 'required|string',

            'NutritionalValues' => 'required|array',
            'NutritionalValues.*.name' => 'required|string',
            'NutritionalValues.*.amount' => 'required|numeric',
            'NutritionalValues.*.calorie_per_gram' => 'nullable|numeric',
        ];
    }
}
