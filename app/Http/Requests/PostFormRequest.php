<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'image' => 'image|mimes:jpeg,png,jpg,svg'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array   
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.min' => 'Le titre doit faire au moins 3 caractères',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères',
            'content.required' => 'Le contenu est obligatoire',
            'content.min' => 'Le contenu doit faire au moins 3 caractères',
            'category_id.required' => 'La catégorie est obligatoire',
            'category_id.exists' => 'La catégorie n\'existe pas',
            'tags.array' => 'Les tags doivent être un tableau',
            'image.image' => 'L\'image doit être une image',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou svg',
        ];
    }
}
