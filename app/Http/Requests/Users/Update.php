<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
        return [
			'identifiant' => 'required|max:20',
			'nom' => 'nullable|max:20',
			'prenom' => 'nullable|max:20',
			'mail' => 'nullable|max:50',
			'mail_verif' => 'required',
			'mdp' => 'required|max:150',
			'adresse' => 'nullable|string',
			'tel' => 'nullable|max:20',
			'date_inscription' => 'nullable|date',
			'statut_membre' => 'nullable|numeric',
			'banni' => 'nullable|boolean',
			'nombre_attentes_validation' => 'nullable|numeric',
			'hash_mail' => 'nullable|max:35',
			'hash_mdp' => 'nullable|max:35',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [

        ];
    }

}
