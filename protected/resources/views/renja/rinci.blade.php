@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>
    </table>
@stop

@section('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin/rancanganrenja/') }}',
        columns: [
            { data: 'id_program_renstra', name: 'id_program_renstra' },
            { data: 'uraian_program_renstra', name: 'uraian_program_renstra' },
            { data: 'id_kegiatan_renstra', name: 'id_kegiatan_renstra' },
            { data: 'uraian_kegiatan_renstra', name: 'uraian_kegiatan_renstra' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection