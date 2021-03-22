<form action="{{isset($route)?$route:route('membres.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="identifiant">Identifiant</label>
        <input type="text" class="form-control {{ $errors->has('identifiant') ? ' is-invalid' : '' }}" name="identifiant" id="identifiant" value="{{old('identifiant',$model->identifiant)}}" placeholder="" maxlength="20" required="required" >
          @if($errors->has('identifiant'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('identifiant') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="nom" value="{{old('nom',$model->nom)}}" placeholder="" maxlength="20" >
          @if($errors->has('nom'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('nom') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="prenom">Prenom</label>
        <input type="text" class="form-control {{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" id="prenom" value="{{old('prenom',$model->prenom)}}" placeholder="" maxlength="20" >
          @if($errors->has('prenom'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('prenom') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="mail">Mail</label>
        <input type="text" class="form-control {{ $errors->has('mail') ? ' is-invalid' : '' }}" name="mail" id="mail" value="{{old('mail',$model->mail)}}" placeholder="" maxlength="50" >
          @if($errors->has('mail'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('mail') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="mail_verif">Mail Verif</label>
        <input type="text" class="form-control {{ $errors->has('mail_verif') ? ' is-invalid' : '' }}" name="mail_verif" id="mail_verif" value="{{old('mail_verif',$model->mail_verif)}}" placeholder="" required="required" >
          @if($errors->has('mail_verif'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('mail_verif') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="mdp">Mdp</label>
        <input type="text" class="form-control {{ $errors->has('mdp') ? ' is-invalid' : '' }}" name="mdp" id="mdp" value="{{old('mdp',$model->mdp)}}" placeholder="" maxlength="150" required="required" >
          @if($errors->has('mdp'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('mdp') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" rows="3">{{old('adresse',$model->adresse)}}</textarea>
      @if($errors->has('adresse'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('adresse') }}</strong>
    </div>
  @endif
</div> 

    <div class="form-group">
        <label for="tel">Tel</label>
        <input type="text" class="form-control {{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" id="tel" value="{{old('tel',$model->tel)}}" placeholder="" maxlength="20" >
          @if($errors->has('tel'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('tel') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="date_inscription">Date Inscription</label>
    <div class="input-group">
        <input type="date" class="form-control {{ $errors->has('date_inscription') ? ' is-invalid' : '' }}" name="date_inscription" id="date_inscription"
               value="{{old('date_inscription',$model->date_inscription)}}"
               placeholder="" >
        <div class="input-group-addon">
            <label for="date_inscription" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('date_inscription'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('date_inscription') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="statut_membre">Statut Membre</label>
        <input type="number" class="form-control {{ $errors->has('statut_membre') ? ' is-invalid' : '' }}" name="statut_membre" id="statut_membre" value="{{old('statut_membre',$model->statut_membre)}}" placeholder="" >
          @if($errors->has('statut_membre'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('statut_membre') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('banni') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="banni"
           id="banni">
    <label class="form-check-label" for="banni">
        Banni
    </label>
      @if($errors->has('banni'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('banni') }}</strong>
    </div>
  @endif
</div>

    <div class="form-group">
        <label for="nombre_attentes_validation">Nombre Attentes Validation</label>
        <input type="number" class="form-control {{ $errors->has('nombre_attentes_validation') ? ' is-invalid' : '' }}" name="nombre_attentes_validation" id="nombre_attentes_validation" value="{{old('nombre_attentes_validation',$model->nombre_attentes_validation)}}" placeholder="" >
          @if($errors->has('nombre_attentes_validation'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('nombre_attentes_validation') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="hash_mail">Hash Mail</label>
        <input type="text" class="form-control {{ $errors->has('hash_mail') ? ' is-invalid' : '' }}" name="hash_mail" id="hash_mail" value="{{old('hash_mail',$model->hash_mail)}}" placeholder="" maxlength="35" >
          @if($errors->has('hash_mail'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('hash_mail') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="hash_mdp">Hash Mdp</label>
        <input type="text" class="form-control {{ $errors->has('hash_mdp') ? ' is-invalid' : '' }}" name="hash_mdp" id="hash_mdp" value="{{old('hash_mdp',$model->hash_mdp)}}" placeholder="" maxlength="35" >
          @if($errors->has('hash_mdp'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('hash_mdp') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>