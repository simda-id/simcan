<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
use hoaaah\LaravelHtmlHelpers\Html;

?>
@extends('layouts.parameterlayout')

@section('content')

<!-- Modal Group -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">----</h4>
      </div>
      <div class="modal-body">
            ....
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
                $this->title = 'Rekening Anggaran';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Parameter', 'url' => '/admin/parameter/']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div class="col-md-10">
        <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul id="myTab-19" class="nav nav-tabs" role="tablist">
                <li id="tab-home" class="active"><a id="link-home" href="#home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Akun</a></li>
                <li id="tab-rek-2"><a href="#rek-2" role="tab-kv" data-toggle="tab">Golongan</a></li>
                <li id="tab-rek-3"><a href="#rek-3" role="tab-kv" data-toggle="tab">Jenis</a></li>
                <li id="tab-rek-4"><a href="#rek-4" role="tab-kv" data-toggle="tab">Objek</a></li>
                <li id="tab-rek-5"><a href="#rek-5" role="tab-kv" data-toggle="tab">Rincian Objek</a></li>
            </ul>
            <div id="myTabContent-19" class="tab-content">
                <!-- tab home content-->
                <div class="tab-pane fade in active" id="home">    
                            <!-- Button trigger modal -->
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Akun', '#', [
                                            'title' => 'Tambah Akun',
                                            'class' => 'btn btn-xs btn-success',
                                            'data-href' => url('/admin/parameter/Akun/tambah'),
                                            'data-title' => 'Tambah Akun',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal',
                                    ]) ?>
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="renja-table" class="table table-striped table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; vertical-align:middle">Kd Rek 1</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Akun</th>
                                                <th style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($model as $data)
                                                <tr data-id =<?= $data->kd_rek_1 ?>>
                                                    <td><?= $data->kd_rek_1 ?></td>
                                                    <td><?= $data->nama_kd_rek_1 ?></td>
                                                    <td>
                                                        <div style="display: flex;" class="btn-group">
                                                            <?= Html::a('<i class="glyphicon glyphicon-forward"></i>', '#', [
                                                                    'id' => 'rincButton-'.$data->kd_rek_1,
                                                                    'title' => 'rek-2',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/rekening/'.$data->kd_rek_1.'/rek2'),
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                                    'title' => 'Lihat Akun',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/Akun/'.$data->kd_rek_1.'/view'),
                                                                    'data-title' => 'Lihat Akun #'.$data->kd_rek_1,
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal',
                                                            ]) ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pull-right"> <?= $model->links(); ?> </div>
                                </div>
                            </div>      
                </div>
                <div class="tab-pane fade" id="rek-2"><p>...</p></div>
                <div class="tab-pane fade" id="rek-3"><p>...</p></div>
                <div class="tab-pane fade" id="rek-4"><p>...</p></div>
                <div class="tab-pane fade" id="rek-5"><p>...</p></div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function(){    
        //ajax for modal
        $('#myModal').on('show.bs.modal', function (event) {
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
        })

        $('#renja-table tbody').on('dblclick', 'tr', function(e){
            var id = $(this).closest('tr').data('id');
            var target = e.target
            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                var href = '{{ url('/admin/parameter/rekening') }}/' + id + '/rek2';
                $('#tab-home').removeClass('active');
                // $('#tab-home').attr('class', 'disabled');
                $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Akun</a>');
                $('#tab-rek-2').attr('class', 'active');

                $('#link-home').click();
                $('#home').removeClass('active in');
                $('#rek-2').addClass('active in');
                $('#rek-2').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                $.get(href).done(function(data){
                    $('#rek-2').html(data);
                    // console.log('voila pelaksana');
                });
            }
        });
        $("a[id*='rincButton-']").on('click', function(e){
            var target = e.target;
            var href = $(this).data('href');
            $('#tab-home').removeClass('active');
            $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Akun</a>');
            $('#tab-rek-2').attr('class', 'active');
            $('#link-home').click();
            $('#home').removeClass('active in');
            $('#rek-2').addClass('active in');
            $('#rek-2').html('<i class=\"fa fa-spinner fa-spin\"></i>');
            $.get(href).done(function(data){
                $('#rek-2').html(data);
                // console.log('voila pelaksana');
            });
        });         
    });
</script>    
@endsection
