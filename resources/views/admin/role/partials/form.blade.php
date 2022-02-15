<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('name', 'Name*', ['for' => 'name']) !!}
            {!! Form::text('name', $name, ['autocomplete'=>'off','id'=>'name','class' => 'form-control']) !!}
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('permission', 'Permission*', ['for' => 'permission']) !!}
            {!! Form::select('permission[]',$permissions,$selected_permissions,['class'=>'chosen form-control','id'=>'permission','multiple']) !!}
            @if($errors->has('permission'))
                <p class="help-block">
                    {{ $errors->first('permission') }}
                </p>
            @endif
        </div>
    </div>
</div>
