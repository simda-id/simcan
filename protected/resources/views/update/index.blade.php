<?php
use \hoaaah\LaravelHtmlHelpers\Html;
?>
@extends('layouts.updatelayout')

@section('content')
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">	
    <!-- /.panel -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> Update : {{$alamat}}
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
                @if(!$result)
                    <?php
                        $kronologiCount = COUNT($kronologi); 
                        $i = 1;
                        if($kronologiCount % 2 == 0) $i = 0;
                        foreach($kronologi AS $data):
                    ?>
                    <li class="timeline<?= $i == 1 ? '-inverted' : '' ?>">
                        <div class="timeline-badge info"><i class="fa fa-rocket"></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title"><strong>Available Version: {{ $data->version }}</strong></h4>
                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> Release pada: {{ isset($data->release_date) ? $data->release_date : "" }}</small></p>
                            </div>
                            <div class="timeline-body">
                                <?= $data->detail ?>
                                <hr>
                                <?php 
                                echo Html::a('Update', '/admin/update/execute',[
                                    'title' => 'Update Aplikasi',
                                    'class' => 'btn btn-xs btn-info',
                                    'onClick' => 'confirm("Update Aplikasi");',
                                ]);
                                ?>
                            </div>
                        </div>
                    </li>
                    <?php
                        $i == 1 ? $i = 0 : $i = 1;
                        endforeach;
                    ?>
                @endif                        
                <li>
                    <div class="timeline-badge {{ $result ? 'info' : 'danger' }}"><i class="fa {{ $result ? 'fa-check' : 'fa-times' }}"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title"><strong>System Version: {{$currentVersion->version}}</strong></h4>
                        </div>
                        <div class="timeline-body">
                            <p>Saat ini anda menggunakan {{$currentVersion->name}} v.{{$currentVersion->version}}</p>
                            @if(!$result) <p>Silahkan Update versi terbaru!</p>@endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
@endsection