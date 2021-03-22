<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('io.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('io.edit',$record->id)}}">
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
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Id Membre</th>
			<td>{{$record->id_membre}}</td>
		</tr>
		<tr>
			<th>Validee</th>
			<td>{{$record->validee}}</td>
		</tr>
		<tr>
			<th>A Valider</th>
			<td>{{$record->a_valider}}</td>
		</tr>
		<tr>
			<th>A Zoner</th>
			<td>{{$record->a_zoner}}</td>
		</tr>
		<tr>
			<th>Id Io Ref</th>
			<td>{{$record->id_io_ref}}</td>
		</tr>
		<tr>
			<th>Modifiee</th>
			<td>{{$record->modifiee}}</td>
		</tr>
		<tr>
			<th>Id Zones</th>
			<td>{{$record->id_zones}}</td>
		</tr>
		<tr>
			<th>Situation</th>
			<td>{{$record->situation}}</td>
		</tr>
		<tr>
			<th>Date Releve</th>
			<td>{{$record->date_releve}}</td>
		</tr>
		<tr>
			<th>Date Validee</th>
			<td>{{$record->date_validee}}</td>
		</tr>
		<tr>
			<th>Lieu Dit</th>
			<td>{{$record->lieu_dit}}</td>
		</tr>
		<tr>
			<th>Origine</th>
			<td>{{$record->origine}}</td>
		</tr>
		<tr>
			<th>Patrimonialite</th>
			<td>{{$record->patrimonialite}}</td>
		</tr>
		<tr>
			<th>Classe</th>
			<td>{{$record->classe}}</td>
		</tr>
		<tr>
			<th>Etat</th>
			<td>{{$record->etat}}</td>
		</tr>
		<tr>
			<th>Dimensions</th>
			<td>{{$record->dimensions}}</td>
		</tr>
		<tr>
			<th>Date Demontage</th>
			<td>{{$record->date_demontage}}</td>
		</tr>
		<tr>
			<th>Type Chantier</th>
			<td>{{$record->type_chantier}}</td>
		</tr>
		<tr>
			<th>Demontee</th>
			<td>{{$record->demontee}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
