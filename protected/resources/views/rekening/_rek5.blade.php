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
                'data-href' => url('/admin/parameter/rekening/'.$kd_rek_1.'.'.$kd_rek_2.'.'.$kd_rek_3.'.'.$kd_rek_4.'/tambah/5'),
                'data-title' => 'Tambah Akun',
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
        ]) ?>
        </p>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="rek-5-table" class="table table-striped table-bordered table-responsive">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 1</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 2</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 3</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 4</th>
                    <th style="text-align: center; vertical-align:middle">Kd Rek 5</th>
                    <th style="text-align: center; vertical-align:middle">Nama Rekening 5</th>
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
            $('#rek-5-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/admin/parameter/rekening/getData/5/'.$kd_rek_1.'/'.$kd_rek_2.'/'.$kd_rek_3.'/'.$kd_rek_4) }}",
                columns: [
                    { data: 'kd_rek_1', name: 'kd_rek_1' },
                    { data: 'kd_rek_2', name: 'kd_rek_2' },
                    { data: 'kd_rek_3', name: 'kd_rek_3' },
                    { data: 'kd_rek_4', name: 'kd_rek_4' },
                    { data: 'kd_rek_5', name: 'kd_rek_5' },
                    { data: 'nama_kd_rek_5', name: 'nama_kd_rek_5' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"], [4, "asc"]],
                aoColumnDefs: [
                    { sClass: "dt-center", aTargets: [ 0,1,2,3,4 ] },
                ],
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                    $('#rek-5-table tbody').off( 'click.rowClick' ).on('click.rowClick', 'a', function(e){
                        event.preventDefault();
                        var id = $(this).attr('id')
                        var target = e.target;
                        if(id) var id = id.split('-');
                        if(typeof id !== 'undefined' && id[0] == 'delButton5'){
                            var confirmation = confirm('Yakin Menghapus')
                            var href = $(this).attr('data-href');
                            if(confirmation == true){
                                $.ajax({
                                    url: href,
                                    type:'POST',
                                    data: { "_token": "{{ csrf_token() }}" }, //$(this).serialize(),
                                    success: function(data) {
                                        $('#rek-5-table').DataTable().ajax.reload();
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