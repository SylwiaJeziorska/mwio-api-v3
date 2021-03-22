<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Identifiant </th>
		<th>Nom </th>
		<th>Prenom </th>
		<th>Mail </th>
		<th>Mail Verif </th>
		<th>Mdp </th>
		<th>Tel </th>
		<th>Date Inscription </th>
		<th>Statut Membre </th>
		<th>Banni </th>
		<th>Nombre Attentes Validation </th>
		<th>Hash Mail </th>
		<th>Hash Mdp </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->identifiant }} </td>
	 	<td> {{$record->nom }} </td>
	 	<td> {{$record->prenom }} </td>
	 	<td> {{$record->mail }} </td>
	 	<td> {{$record->mail_verif }} </td>
	 	<td> {{$record->mdp }} </td>
	 	<td> {{$record->tel }} </td>
	 	<td> {{$record->date_inscription }} </td>
	 	<td> {{$record->statut_membre }} </td>
	 	<td> {{$record->banni }} </td>
	 	<td> {{$record->nombre_attentes_validation }} </td>
	 	<td> {{$record->hash_mail }} </td>
	 	<td> {{$record->hash_mdp }} </td>
	<td><a class="btn btn-secondary" href="{{route('membres.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('membres.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('membres.destroy',$record->id)}}"
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