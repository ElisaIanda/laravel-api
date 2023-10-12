<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProjectStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Faccio un controllo sull'utente che fa la request
        $user = Auth::user();

        if ($user->email === "elisaianda01@gmail.com") {
            return true;
        }
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
            "title"=>"required|string|max:255",
            "link"=>"required|string",
            "description"=>"required|string",
            "image"=>"nullable|image",
            "date"=>"required|date",
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable',
        ];
    }
}
