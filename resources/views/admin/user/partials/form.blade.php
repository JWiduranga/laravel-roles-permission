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
            {!! Form::label('email', 'Email*', ['for' => 'name']) !!}
            {!! Form::text('email', $email, ['autocomplete'=>'off','id'=>'email','class' => 'form-control']) !!}
            @if($errors->has('email'))
                <p class="help-block">
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('roles', 'Role Name*', ['for' => 'roles']) !!}
            {!! Form::select('roles[]',$roles,$role,['class'=>'chosen form-control','id'=>'permission','multiple']) !!}
            @if($errors->has('roles'))
                <p class="help-block">
                    {{ $errors->first('roles') }}
                </p>
            @endif
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('password', 'Password*', ['for' => 'password']) !!}
           <input type="password" id="password" name="password" class="form-control">
            @if($errors->has('password'))
                <p class="help-block">
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>
    </div>
</div>
