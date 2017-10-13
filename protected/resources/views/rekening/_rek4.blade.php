<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>

<!-- Button trigger modal -->
<div class="row">
    <div class="col-md-12">
        <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Akun', '#', [
                'title' => 'Tambah Akun',
                'class' => 'btn btn-xs btn-success',
                'data-href' => url('/admin/parameter/rekening/'.$kd_rek_1.'.'.$kd_rek_2.'.'.$kd_rek_3.'/tambah/4'),
                'data-title' => 'Tambah Akun',
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
        ]) ?>
        </p>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="rek-4-table" class="table table-striped table-bordered table-responsive">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 1</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 2</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 3</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 4</th>
                    <th style="text-align: center; vertical-align:middle">Nama Rekening 4</th>
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
            $('#rek-4-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/admin/parameter/rekening/getData/4/'.$kd_rek_1.'/'.$kd_rek_2.'/'.$kd_rek_3) }}",
                columns: [
                    { data: 'kd_rek_1', name: 'kd_rek_1' },
                    { data: 'kd_rek_2', name: 'kd_rek_2' },
                    { data: 'kd_rek_3', name: 'kd_rek_3' },
                    { data: 'kd_rek_4', name: 'kd_rek_4' },
                    { data: 'nama_kd_rek_4', name: 'nama_kd_rek_4' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"]],
                aoColumnDefs: [
                    { sClass: "dt-center", aTargets: [ 0,1,2,3 ] },
                ],
                createdRow: function( row, data, dataIndex ) {
                    $(row).attr('data-id', data.kd_rek_1 + "." + data.kd_rek_2 + "." + data.kd_rek_3+ "." + data.kd_rek_4);
                },
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){

                    $('#rek-4-table tbody').on('dblclick', 'tr', function(e){
                        var id = $(this).closest('tr').data('id');
                        var target = e.target;
                        var link = '';
                        if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                            var href = '{{ url('/admin/parameter/rekening/') }}/' + id + '/rek5';
                            $('#tab-rek-4').removeClass('active');
                            $('#tab-rek-4').html('<a href=\"#rek-4\"  data-toggle=\"tab\" role=\"tab\" > Objek</a>');
                            $('#tab-rek-5').attr('class', 'active');

                            $('#link-rek-4').click();
                            $('#rek-4').removeClass('active in');
                            $('#rek-5').addClass('active in');
                            $('#rek-5').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                            $.get(href).done(function(data){
                                $('#rek-5').html(data);
                                // console.log('voila rek-5');
                            });
                        }
                    });
                    $('#rek-4-table tbody').off( 'click.rowClick' ).on('click.rowClick', 'a', function(e){
                        event.preventDefault();
                        var id = $(this).attr('id')
                        var target = e.target;
                        if(id) var id = id.split('-');
                        // if rinc
                        if(typeof id !== 'undefined' && id[0] == 'rincButton4'){
                            var href = $(this).data('href');
                            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                                $('#tab-rek-4').removeClass('active');
                                $('#tab-rek-4').html('<a href=\"#rek-4\"  data-toggle=\"tab\" role=\"tab\" > Objek</a>');
                                $('#tab-rek-5').attr('class', 'active');

                                $('#link-rek-4').click();
                                $('#rek-4').removeClass('active in');
                                $('#rek-5').addClass('active in');
                                $('#rek-5').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                                $.get(href).done(function(data){
                                    $('#rek-5').html(data);
                                    // console.log('voila rek-5');
                                });
                            }
                        }
                        if(typeof id !== 'undefined' && id[0] == 'delButton4'){
                            var confirmation = confirm('Yakin Menghapus')
                            var href = $(this).attr('data-href');
                            if(confirmation == true){
                                $.ajax({
                                    url: href,
                                    type:'POST',
                                    data: { "_token": "{{ csrf_token() }}" }, //$(this).serialize(),
                                    success: function(data) {
                                        $('#rek-4-table').DataTable().ajax.reload();
                                    }
                                });
                            }
                        }
                    });                    
                                                            
                }
            });
        });
    });
</script>