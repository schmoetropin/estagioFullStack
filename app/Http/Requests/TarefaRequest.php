<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'titulo'=>['required','min:3','max:50'],
            
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'titulo'=> strip_tags($this->titulo),
        ]);
    }
}
