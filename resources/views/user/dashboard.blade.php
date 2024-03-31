
@extends('master')


@section('header')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group has-feedback ">
                <label for="import_file">Upload JSON File</label>
                <input type="file" class="form-control" autofocus="" id="import_file" name="import_file">
                <span class="help-block error-msg" id="import_file-error"></span>
                {!! $errors->first('import_file', '<span class="help-block">:message</span>') !!}
            </div>
        <div>
            <input type="submit" class="btn btn-primary btn-block"></input>
        </div>
    </div>
</form>
@stop