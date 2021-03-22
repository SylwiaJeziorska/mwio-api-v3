<?php

namespace App\Http\Requests\Io;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest 
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
			'id_membre' => 'nullable|numeric',
			'validee' => 'nullable|boolean',
			'a_valider' => 'nullable|boolean',
			'a_zoner' => 'nullable|boolean',
			'id_io_ref' => 'nullable|max:100',
			'modifiee' => 'nullable|boolean',
			'id_zones' => 'nullable|max:100',
			'situation' => 'nullable',
			'date_releve' => 'nullable|date',
			'date_validee' => 'nullable|date',
			'lieu_dit' => 'nullable|max:40',
			'origine' => 'nullable|max:40',
			'proprio_terrain' => 'nullable|string',
			'proprio_io' => 'nullable|string',
			'ampleur' => 'nullable|string',
			'impact' => 'nullable|string',
			'patrimonialite' => 'nullable|max:20',
			'classe' => 'nullable|max:200',
			'etat' => 'nullable|max:100',
			'dimensions' => 'nullable|max:100',
			'nombre' => 'nullable|string',
			'accessibilite' => 'nullable|string',
			'facilite_demontage' => 'nullable|string',
			'commentaires' => 'nullable|string',
			'image' => 'nullable|string',
			'video' => 'nullable|string',
			'date_demontage' => 'nullable|date',
			'type_chantier' => 'nullable|max:20',
			'nom_partenaires' => 'nullable|string',
			'duree_chantier' => 'nullable|string',
			'commentaires_chantier' => 'nullable|string',
			'demontee' => 'nullable|boolean',
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
