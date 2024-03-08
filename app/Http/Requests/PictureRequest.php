<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PictureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'album_id' => 'required|exists:albums,id',
        ];
    
        if ($this->isMethod('post')) {
            $rules['image.*'] = 'required|image|max:2048';
        }
    
        if ($this->isMethod('put')) {
            $rules['image.*'] = 'image|max:2048';
        }
    
        return $rules;
    }
}
