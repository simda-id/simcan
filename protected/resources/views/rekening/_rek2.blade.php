<div class="container">
    <div class="row">
        <div class="col-md-10">
            <table id="rek-2-table" class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align:middle">Kd Rek 1</th>
                        <th style="text-align: center; vertical-align:middle">Kd Rek 2</th>
                        <th style="text-align: center; vertical-align:middle">Nama Rekening 2</th>
                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){    
  /*
        // ajax for datatables
        $(function() {
            $('#rek-2-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ Request::url() }}',
                columns: [
                    { data: 'kd_rek_1', name: 'kd_rek_1' },
                    { data: 'kd_rek_2', name: 'kd_rek_2' },
                    { data: 'nama_kd_rek_2', name: 'nama_kd_rek_2' },
                    { data: 'kd_rek_2', name: 'kd_rek_2' },
                    // { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                aoColumnDefs: [
                    { sClass: "dt-center", aTargets: [ 0, 1 ] },
                ],
                createdRow: function( row, data, dataIndex ) {
                    $(row).attr('data-id', data.id_renja);
                },
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                    var ajaxPelaksana = function(){
                        
                    }
                    $('#rek-2-table tbody').on('dblclick', 'tr', function(e){
                        var id = $(this).closest('tr').data('id');
                        var target = e.target
                        var link = '{{ $title[1] }}/'
                        // console.log(id)
                        // console.log(this)
                        // console.log(e.target)
                        if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                            var href = '{{ url('/renja/') }}/' + link + id + '/pelaksana';
                            $('#tab-home').removeClass('active');
                            // $('#tab-home').attr('class', 'disabled');
                            $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Kegiatan</a>');
                            $('#tab-pelaksana').attr('class', 'active');

                            $('#link-home').click();
                            $('#home').removeClass('active in');
                            $('#pelaksana').addClass('active in');
                            $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                            $.get(href).done(function(data){
                                $('#pelaksana').html(data);
                                // console.log('voila pelaksana');
                            });
                        }
                    });
                    $('#rek-2-table tbody').on('click', 'a', function(e){
                        var id = $(this).attr('id')
                        var target = e.target;
                        if(id) var id = id.split('-');
                        if(typeof id !== 'undefined' && id[0] == 'rincian'){
                            var href = $(this).data('href');
                            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                                // var href = '{{ url('/ranwalrkpd/btl/') }}/' + id + '/pelaksana';
                                $('#tab-home').removeClass('active');
                                // $('#tab-home').attr('class', 'disabled');
                                $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Program</a>');
                                $('#tab-pelaksana').attr('class', 'active');

                                $('#link-home').click();
                                $('#home').removeClass('active in');
                                $('#pelaksana').addClass('active in');
                                $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                                $.get(href).done(function(data){
                                    $('#pelaksana').html(data);
                                    // console.log('voila pelaksana');
                                });
                            }
                        }
                    });                    
                                                            
                }
            });
        });     
        */     
    });
</script>