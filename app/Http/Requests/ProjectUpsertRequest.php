<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpsertRequest extends FormRequest
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
            "title" => "required",
            "description" => "required",
            "image" => "nullable|image|max:3072",
            "github_link" => "required",
            "type_id"=> "exists:types,id",
            "technologies" =>"nullable",
        ];
    }

    public function messages(): array{
        return[
            "title.required" => "Il titolo è neccessario",
            "description.required" => "La descrizione è neccessaria",
            "image.required" =>"Non dimenticare l'immagine",
            "github_link.required" => "Il link del progetto non è stato inserito",
            "tecnologie.required" => "che tecnologie hai utilizzzato per questo progetto?"
        ];
        
    }
}
