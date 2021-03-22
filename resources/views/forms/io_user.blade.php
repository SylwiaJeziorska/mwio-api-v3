<form action="{{isset($route)?$route:route('io_user.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="io_id">Io Id</label>
        <input type="number" class="form-control {{ $errors->has('io_id') ? ' is-invalid' : '' }}" name="io_id" id="io_id" value="{{old('io_id',$model->io_id)}}" placeholder="" required="required" >
          @if($errors->has('io_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('io_id') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="user_id">User Id</label>
        <input type="number" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" value="{{old('user_id',$model->user_id)}}" placeholder="" required="required" >
          @if($errors->has('user_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>