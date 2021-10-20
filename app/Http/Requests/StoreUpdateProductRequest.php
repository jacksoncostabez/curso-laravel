<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        ///teste/105/edit
        $id = $this->segment(2); //pega o id, que é o segmento 2 da url.
        //name,{$id},id" - adiciona a excessão caso altere a descricao e deixe o mesmo nome.
        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'required|min:3|max:10000',
            'preco' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'preco.required' => 'Preço é obrigatório.',
            'description.required' => 'Descrição é obrigatória.',
            'name.min'=> 'Ops! O nome precisa ter no mínimo 3 caracteres.',
            'photo.required' => 'Imagem obrigatória!',
        ];
    }
}
