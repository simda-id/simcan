@extends('layouts.app')

@section('content')	
<div class="col-md-12">	
	{!! $data->table() !!}
</div>
@endsection
 
@section('scripts')
{!! $data->scripts() !!}
@endsection
{{-- 
@push('scripts')
<script>
    $(function() {
        $('#renjarancangan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/admin/rancanganrenja/datarenjarancangan") }}'
            },
            columns: [
                {data: 'id_program_renstra', name: 'id_program_renstra'},
                {data: 'id_kegiatan_renstra', name: 'id_kegiatan_renstra'},
                {data: 'uraian_program_renstra', name: 'uraian_program_renstra'},
                {data: 'uraian_kegiatan_renstra', name: 'uraian_kegiatan_renstra', orderable: false},
            ],            
        });
    });    
</script>
@endpush --}}