<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Id Membre </th>
		<th>Validee </th>
		<th>A Valider </th>
		<th>A Zoner </th>
		<th>Id Io Ref </th>
		<th>Modifiee </th>
		<th>Id Zones </th>
		<th>Situation </th>
		<th>Date Releve </th>
		<th>Date Validee </th>
		<th>Lieu Dit </th>
		<th>Origine </th>
		<th>Patrimonialite </th>
		<th>Classe </th>
		<th>Etat </th>
		<th>Dimensions </th>
		<th>Date Demontage </th>
		<th>Type Chantier </th>
		<th>Demontee </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->id_membre }} </td>
	 	<td> {{$record->validee }} </td>
	 	<td> {{$record->a_valider }} </td>
	 	<td> {{$record->a_zoner }} </td>
	 	<td> {{$record->id_io_ref }} </td>
	 	<td> {{$record->modifiee }} </td>
	 	<td> {{$record->id_zones }} </td>
	 	<td> {{$record->situation }} </td>
	 	<td> {{$record->date_releve }} </td>
	 	<td> {{$record->date_validee }} </td>
	 	<td> {{$record->lieu_dit }} </td>
	 	<td> {{$record->origine }} </td>
	 	<td> {{$record->patrimonialite }} </td>
	 	<td> {{$record->classe }} </td>
	 	<td> {{$record->etat }} </td>
	 	<td> {{$record->dimensions }} </td>
	 	<td> {{$record->date_demontage }} </td>
	 	<td> {{$record->type_chantier }} </td>
	 	<td> {{$record->demontee }} </td>
	<td><a class="btn btn-secondary" href="{{route('io.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('io.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('io.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form></td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>