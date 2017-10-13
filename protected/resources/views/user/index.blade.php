<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>
@extends('layouts.parameterlayout')

@section('content')

<!-- Modal Group -->
<div class="modal fade" id="myModalUbah" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah User</h4>
      </div>
      <div class="modal-body">
            ....
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Grup</h4>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Group User</label>
                <?php $groups = \App\RefGroup::get(); ?>
                <div class="col-md-6">
                    {{-- <input id="group_id" type="group_id" class="form-control" name="group_id" value="{{ old('group_id') }}" required> --}}
                    <select id="group_id" type="group_id" class="form-control" name="group_id" value="{{ old('group_id') }}" required>
                        @foreach($groups as $groups)
                        <option value={{ $groups->id }}>{{ $groups->name }}</option>
                        @endforeach
                    </select>                            
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
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'User dan Group';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Parameter']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar User</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-labeled btn-sm btn-success" data-toggle="modal" data-target="#myModal">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah User
                </button>
                {{-- <a href="{{ url('/admin/parameter/user/group') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-user"></i> Grup User</a>  --}}    
                <table class="table table-bordered table-striped table-responsive" id="users-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function(){    
        // ajax for datatables
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                // dom : 'bfrtIp',
                autoWidth : false,
                ajax: '{{ url('/admin/parameter/user/') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
            });
        });

        //ajax for modaledit
        $('#myModalUbah').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var title = button.data('title');
            var href = button.attr('href');
            href = button.data('href');
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').html('<i class="fa fa-spinner fa-spin"></i>');
            $.get(href, function( data ) {
                modal.find(".modal-body").html(data);
            });            
            // $.post(href)
            //     .done(function( data ) {
            //         modal.find('.modal-body').html(data)
            // });
        })       
    });
</script>
@endsection
