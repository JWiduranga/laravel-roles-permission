<div class="card-body">
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('name', 'Name*', ['for' => 'name']) !!}
            {!! Form::text('name', $name, ['autocomplete'=>'off','id'=>'name','class' => 'form-control']) !!}
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
    </div>
</div>
