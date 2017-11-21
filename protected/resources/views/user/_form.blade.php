        <form class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nama</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $model['name'] }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Group User</label>
            <?php
            $groups = \App\Models\RefGroup::get();
            $groupsDropdown = [];
            foreach($groups as $group){
                $groupsDropdown[$group->id] = $group->name;
            }
            ?>
            <div class="col-md-6">
                {{ Form::select('group_id', $groupsDropdown == NULL ? [] : $groupsDropdown, isset($model->group_id)  ? $model->group_id : null , ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Group...']) }}
                                    
                @if ($errors->has('group_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('group_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $model['email'] }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        {{-- @if($model == NULL) --}}

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        {{-- <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div> --}}

        {{-- @else --}}
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>

        {{-- @endif --}}
        
        </form>