<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>

<!-- Button trigger modal -->
<div class="row">
    <div class="col-md-12">
        <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Akun', '#', [
                'title' => 'Tambah Akun',
                'class' => 'btn btn-xs btn-success disabled',
                'data-title' => 'Tambah Akun',
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
        ]) ?>
        </p>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="rek-3-table" class="table table-striped table-bordered table-responsive">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 1</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 2</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 3</th>
                    <th style="text-align: center; vertical-align:middle">Nama Rekening 3</th>
                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script>
    $(document).ready(function(){
        // ajax for datatables
        $(function() {
            $('#rek-3-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/admin/parameter/rekening/getData/3/'.$kd_rek_1.'/'.$kd_rek_2) }}",
                columns: [
                    { data: 'kd_rek_1', name: 'kd_rek_1' },
                    { data: 'kd_rek_2', name: 'kd_rek_2' },
                    { data: 'kd_rek_3', name: 'kd_rek_3' },
                    { data: 'nama_kd_rek_3', name: 'nama_kd_rek_3' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, "asc"], [1, "asc"], [2, "asc"]],
                aoColumnDefs: [
                    { sClass: "dt-center", aTargets: [ 0,1,2 ] },
                ],
                createdRow: function( row, data, dataIndex ) {
                    $(row).attr('data-id', data.kd_rek_1 + "." + data.kd_rek_2 + "." + data.kd_rek_3);
                },
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){

                    $('#rek-3-table tbody').on('dblclick', 'tr', function(e){
                        var id = $(this).closest('tr').data('id');
                        var target = e.target;
                        var link = '';
                        if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                            var href = '{{ url('/admin/parameter/rekening/') }}/' + id + '/rek4';
                            $('#tab-rek-3').removeClass('active');
                            $('#tab-rek-3').html('<a href=\"#rek-3\"  data-toggle=\"tab\" role=\"tab\" > Jenis</a>');
                            $('#tab-rek-4').attr('class', 'active');

                            $('#link-rek-3').click();
                            $('#rek-3').removeClass('active in');
                            $('#rek-4').addClass('active in');
                            $('#rek-4').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                            $.get(href).done(function(data){
                                $('#rek-4').html(data);
                                // console.log('voila rek-4');
                            });
                        }
                    });
                    $('#rek-3-table tbody').off( 'click.rowClick' ).on('click.rowClick', 'a', function(e){
                        e.preventDefault();
                        console.log('click');
                        var id = $(this).attr('id')
                        var target = e.target;
                        if(id) var id = id.split('-');
                        if(typeof id !== 'undefined' && id[0] == 'rincButton3'){
                            var href = $(this).data('href');
                            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                                $('#tab-rek-3').removeClass('active');
                                $('#tab-rek-3').html('<a href=\"#rek-3\"  data-toggle=\"tab\" role=\"tab\" > Jenis</a>');
                                $('#tab-rek-4').attr('class', 'active');

                                $('#link-rek-3').click();
                                $('#rek-3').removeClass('active in');
                                $('#rek-4').addClass('active in');
                                $('#rek-4').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                                $.get(href).done(function(data){
                                    $('#rek-4').html(data);
                                    // console.log('voila rek-4');
                                });
                            }
                        }
                    });                    
                                                            
                }
            });
        });     
    });
</script>