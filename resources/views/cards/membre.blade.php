<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('membres.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('membres.edit',$record->id)}}">
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
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Identifiant</th>
			<td>{{$record->identifiant}}</td>
		</tr>
		<tr>
			<th>Nom</th>
			<td>{{$record->nom}}</td>
		</tr>
		<tr>
			<th>Prenom</th>
			<td>{{$record->prenom}}</td>
		</tr>
		<tr>
			<th>Mail</th>
			<td>{{$record->mail}}</td>
		</tr>
		<tr>
			<th>Mail Verif</th>
			<td>{{$record->mail_verif}}</td>
		</tr>
		<tr>
			<th>Mdp</th>
			<td>{{$record->mdp}}</td>
		</tr>
		<tr>
			<th>Tel</th>
			<td>{{$record->tel}}</td>
		</tr>
		<tr>
			<th>Date Inscription</th>
			<td>{{$record->date_inscription}}</td>
		</tr>
		<tr>
			<th>Statut Membre</th>
			<td>{{$record->statut_membre}}</td>
		</tr>
		<tr>
			<th>Banni</th>
			<td>{{$record->banni}}</td>
		</tr>
		<tr>
			<th>Nombre Attentes Validation</th>
			<td>{{$record->nombre_attentes_validation}}</td>
		</tr>
		<tr>
			<th>Hash Mail</th>
			<td>{{$record->hash_mail}}</td>
		</tr>
		<tr>
			<th>Hash Mdp</th>
			<td>{{$record->hash_mdp}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
