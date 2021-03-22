<form action="{{isset($route)?$route:route('media.store')}}" method="POST" >
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
        <label for="file_name">File Name</label>
        <input type="text" class="form-control {{ $errors->has('file_name') ? ' is-invalid' : '' }}" name="file_name" id="file_name" value="{{old('file_name',$model->file_name)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('file_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('file_name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="original_name">Original Name</label>
        <input type="text" class="form-control {{ $errors->has('original_name') ? ' is-invalid' : '' }}" name="original_name" id="original_name" value="{{old('original_name',$model->original_name)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('original_name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('original_name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" id="type" value="{{old('type',$model->type)}}" placeholder="" maxlength="191" required="required" >
          @if($errors->has('type'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('type') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>