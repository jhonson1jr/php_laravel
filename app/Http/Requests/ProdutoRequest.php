<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required | min:3', //campo nome obrigatorio com minimo de 3 caracteres
            'descricao' => 'required | max:200',
            'valor' => 'required | numeric',
            'quantidade' => 'required | numeric',
            'tamanho' => 'required | max:100',
        ];
    }


    public function messages(){
        return [
            'required' => 'O :attribute é obrigatório!' //mensagem de erro para todos os campos obrigatórios. Com :attribute o laravel pega o campo em questao
        ];
    }
}
