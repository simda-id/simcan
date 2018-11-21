<?php
use \hoaaah\LaravelHtmlHelpers\Html;
?>
@extends('layouts.app2')

@section('content')
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">	
    <!-- /.panel -->   
    <div id="pesan" class="panel">
    @if (Session::has('pesan')) 
        <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle-o fa-fw fa-lg text-danger"></i></button>
            <h4>{{Session::get('pesan')}}</h4>
        </div>
    @endif
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-refresh fa-fw fa-lg"></i> Transfer Data antar Database Perencanaan dan Keuangan:
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 3500);
};

$('[data-toggle="popover"]').popover();
$('.number').number(true,0,',', '.');

$('.page-alert .close').click(function(e) {
    e.preventDefault();
    $(this).closest('.page-alert').slideUp();
});



});
</script>
@endsection