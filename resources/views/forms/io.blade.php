<form action="{{isset($route)?$route:route('io.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="id_membre">Id Membre</label>
        <input type="number" class="form-control {{ $errors->has('id_membre') ? ' is-invalid' : '' }}" name="id_membre" id="id_membre" value="{{old('id_membre',$model->id_membre)}}" placeholder="" >
          @if($errors->has('id_membre'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('id_membre') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('validee') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="validee"
           id="validee">
    <label class="form-check-label" for="validee">
        Validee
    </label>
      @if($errors->has('validee'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('validee') }}</strong>
    </div>
  @endif
</div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('a_valider') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="a_valider"
           id="a_valider">
    <label class="form-check-label" for="a_valider">
        A Valider
    </label>
      @if($errors->has('a_valider'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('a_valider') }}</strong>
    </div>
  @endif
</div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('a_zoner') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="a_zoner"
           id="a_zoner">
    <label class="form-check-label" for="a_zoner">
        A Zoner
    </label>
      @if($errors->has('a_zoner'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('a_zoner') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="id_io_ref">Id Io Ref</label>
        <input type="text" class="form-control {{ $errors->has('id_io_ref') ? ' is-invalid' : '' }}" name="id_io_ref" id="id_io_ref" value="{{old('id_io_ref',$model->id_io_ref)}}" placeholder="" maxlength="100" >
          @if($errors->has('id_io_ref'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('id_io_ref') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('modifiee') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="modifiee"
           id="modifiee">
    <label class="form-check-label" for="modifiee">
        Modifiee
    </label>
      @if($errors->has('modifiee'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('modifiee') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="id_zones">Id Zones</label>
        <input type="text" class="form-control {{ $errors->has('id_zones') ? ' is-invalid' : '' }}" name="id_zones" id="id_zones" value="{{old('id_zones',$model->id_zones)}}" placeholder="" maxlength="100" >
          @if($errors->has('id_zones'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('id_zones') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="situation">Situation</label>
        <input type="text" class="form-control {{ $errors->has('situation') ? ' is-invalid' : '' }}" name="situation" id="situation" value="{{old('situation',$model->situation)}}" placeholder="" >
          @if($errors->has('situation'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('situation') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="date_releve">Date Releve</label>
    <div class="input-group">
        <input type="date" class="form-control {{ $errors->has('date_releve') ? ' is-invalid' : '' }}" name="date_releve" id="date_releve"
               value="{{old('date_releve',$model->date_releve)}}"
               placeholder="" >
        <div class="input-group-addon">
            <label for="date_releve" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('date_releve'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('date_releve') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="date_validee">Date Validee</label>
    <div class="input-group">
        <input type="date" class="form-control {{ $errors->has('date_validee') ? ' is-invalid' : '' }}" name="date_validee" id="date_validee"
               value="{{old('date_validee',$model->date_validee)}}"
               placeholder="" >
        <div class="input-group-addon">
            <label for="date_validee" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('date_validee'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('date_validee') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="lieu_dit">Lieu Dit</label>
        <input type="text" class="form-control {{ $errors->has('lieu_dit') ? ' is-invalid' : '' }}" name="lieu_dit" id="lieu_dit" value="{{old('lieu_dit',$model->lieu_dit)}}" placeholder="" maxlength="40" >
          @if($errors->has('lieu_dit'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('lieu_dit') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="origine">Origine</label>
        <input type="text" class="form-control {{ $errors->has('origine') ? ' is-invalid' : '' }}" name="origine" id="origine" value="{{old('origine',$model->origine)}}" placeholder="" maxlength="40" >
          @if($errors->has('origine'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('origine') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="proprio_terrain">Proprio Terrain</label>
    <textarea id="proprio_terrain" name="proprio_terrain" class="form-control {{ $errors->has('proprio_terrain') ? ' is-invalid' : '' }}" rows="3">{{old('proprio_terrain',$model->proprio_terrain)}}</textarea>
      @if($errors->has('proprio_terrain'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('proprio_terrain') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="proprio_io">Proprio Io</label>
    <textarea id="proprio_io" name="proprio_io" class="form-control {{ $errors->has('proprio_io') ? ' is-invalid' : '' }}" rows="3">{{old('proprio_io',$model->proprio_io)}}</textarea>
      @if($errors->has('proprio_io'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('proprio_io') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="ampleur">Ampleur</label>
    <textarea id="ampleur" name="ampleur" class="form-control {{ $errors->has('ampleur') ? ' is-invalid' : '' }}" rows="3">{{old('ampleur',$model->ampleur)}}</textarea>
      @if($errors->has('ampleur'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('ampleur') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="impact">Impact</label>
    <textarea id="impact" name="impact" class="form-control {{ $errors->has('impact') ? ' is-invalid' : '' }}" rows="3">{{old('impact',$model->impact)}}</textarea>
      @if($errors->has('impact'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('impact') }}</strong>
    </div>
  @endif
</div> 

    <div class="form-group">
        <label for="patrimonialite">Patrimonialite</label>
        <input type="text" class="form-control {{ $errors->has('patrimonialite') ? ' is-invalid' : '' }}" name="patrimonialite" id="patrimonialite" value="{{old('patrimonialite',$model->patrimonialite)}}" placeholder="" maxlength="20" >
          @if($errors->has('patrimonialite'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('patrimonialite') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="classe">Classe</label>
        <input type="text" class="form-control {{ $errors->has('classe') ? ' is-invalid' : '' }}" name="classe" id="classe" value="{{old('classe',$model->classe)}}" placeholder="" maxlength="200" >
          @if($errors->has('classe'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('classe') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="etat">Etat</label>
        <input type="text" class="form-control {{ $errors->has('etat') ? ' is-invalid' : '' }}" name="etat" id="etat" value="{{old('etat',$model->etat)}}" placeholder="" maxlength="100" >
          @if($errors->has('etat'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('etat') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="dimensions">Dimensions</label>
        <input type="text" class="form-control {{ $errors->has('dimensions') ? ' is-invalid' : '' }}" name="dimensions" id="dimensions" value="{{old('dimensions',$model->dimensions)}}" placeholder="" maxlength="100" >
          @if($errors->has('dimensions'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('dimensions') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="nombre">Nombre</label>
    <textarea id="nombre" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" rows="3">{{old('nombre',$model->nombre)}}</textarea>
      @if($errors->has('nombre'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('nombre') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="accessibilite">Accessibilite</label>
    <textarea id="accessibilite" name="accessibilite" class="form-control {{ $errors->has('accessibilite') ? ' is-invalid' : '' }}" rows="3">{{old('accessibilite',$model->accessibilite)}}</textarea>
      @if($errors->has('accessibilite'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('accessibilite') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="facilite_demontage">Facilite Demontage</label>
    <textarea id="facilite_demontage" name="facilite_demontage" class="form-control {{ $errors->has('facilite_demontage') ? ' is-invalid' : '' }}" rows="3">{{old('facilite_demontage',$model->facilite_demontage)}}</textarea>
      @if($errors->has('facilite_demontage'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('facilite_demontage') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="commentaires">Commentaires</label>
    <textarea id="commentaires" name="commentaires" class="form-control {{ $errors->has('commentaires') ? ' is-invalid' : '' }}" rows="3">{{old('commentaires',$model->commentaires)}}</textarea>
      @if($errors->has('commentaires'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('commentaires') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="image">Image</label>
    <textarea id="image" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" rows="3">{{old('image',$model->image)}}</textarea>
      @if($errors->has('image'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('image') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="video">Video</label>
    <textarea id="video" name="video" class="form-control {{ $errors->has('video') ? ' is-invalid' : '' }}" rows="3">{{old('video',$model->video)}}</textarea>
      @if($errors->has('video'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('video') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="date_demontage">Date Demontage</label>
    <div class="input-group">
        <input type="date" class="form-control {{ $errors->has('date_demontage') ? ' is-invalid' : '' }}" name="date_demontage" id="date_demontage"
               value="{{old('date_demontage',$model->date_demontage)}}"
               placeholder="" >
        <div class="input-group-addon">
            <label for="date_demontage" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('date_demontage'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('date_demontage') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="type_chantier">Type Chantier</label>
        <input type="text" class="form-control {{ $errors->has('type_chantier') ? ' is-invalid' : '' }}" name="type_chantier" id="type_chantier" value="{{old('type_chantier',$model->type_chantier)}}" placeholder="" maxlength="20" >
          @if($errors->has('type_chantier'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('type_chantier') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="nom_partenaires">Nom Partenaires</label>
    <textarea id="nom_partenaires" name="nom_partenaires" class="form-control {{ $errors->has('nom_partenaires') ? ' is-invalid' : '' }}" rows="3">{{old('nom_partenaires',$model->nom_partenaires)}}</textarea>
      @if($errors->has('nom_partenaires'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('nom_partenaires') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="duree_chantier">Duree Chantier</label>
    <textarea id="duree_chantier" name="duree_chantier" class="form-control {{ $errors->has('duree_chantier') ? ' is-invalid' : '' }}" rows="3">{{old('duree_chantier',$model->duree_chantier)}}</textarea>
      @if($errors->has('duree_chantier'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('duree_chantier') }}</strong>
    </div>
  @endif
</div> 

<div class="form-group">
    <label for="commentaires_chantier">Commentaires Chantier</label>
    <textarea id="commentaires_chantier" name="commentaires_chantier" class="form-control {{ $errors->has('commentaires_chantier') ? ' is-invalid' : '' }}" rows="3">{{old('commentaires_chantier',$model->commentaires_chantier)}}</textarea>
      @if($errors->has('commentaires_chantier'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('commentaires_chantier') }}</strong>
    </div>
  @endif
</div> 

<div class="form-check">
    <input class="form-check-input {{ $errors->has('demontee') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="demontee"
           id="demontee">
    <label class="form-check-label" for="demontee">
        Demontee
    </label>
      @if($errors->has('demontee'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('demontee') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>