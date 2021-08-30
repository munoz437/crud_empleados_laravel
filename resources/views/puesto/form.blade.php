<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_puesto') }}
            {{ Form::number('id_puesto', $puesto->id_puesto, ['class' => 'form-control' . ($errors->has('id_puesto') ? ' is-invalid' : ''), 'placeholder' => 'Id Puesto']) }}
            {!! $errors->first('id_puesto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puesto') }}
            {{ Form::text('puesto', $puesto->puesto, ['class' => 'form-control' . ($errors->has('puesto') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
            {!! $errors->first('puesto', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>