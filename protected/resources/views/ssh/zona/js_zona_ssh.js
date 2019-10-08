$(document).ready(function () {

    $('[data-toggle="popover"]').popover();
    $('#proses').hide();

    var tzona = $('#tblzona').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        language: {
            "decimal": ",",
            "thousands": ".",
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        },
        "pageLength": 50,
        "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
        "bDestroy": true,
        "ajax": { "url": "./zonassh/getdata" },
        "columns": [
            { data: 'DT_Row_Index', orderable: false, searchable: false, sClass: "dt-center" },
            { data: 'keterangan_zona' },
            { data: 'diskripsi_zona' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
        ]
    });

    $('#tblzona tbody').on('dblclick', 'tr', function () {

        var data = tzona.row(this).data();

        $('.btnAddZona').removeClass('addZona');
        $('.btnAddZona').addClass('editZona');
        $('.modal-title').text('Edit Data Zona SSH');
        $('.form-horizontal').show();
        $('#id_zona').val(data.id_zona);
        $('#ket_zona').val(data.keterangan_zona);
        $('#diskripsi_zona').val(data.diskripsi_zona);
        $('#ModalZona').modal('show');

    });

    $(document).on('click', '.add-modal', function () {
        $('.btnAddZona').removeClass('editZona');
        $('.btnAddZona').addClass('addZona');
        $('.modal-title').text('Tambah Data Zona SSH');
        $('.form-horizontal').show();
        $('#id_zona').val(null);
        $('#ket_zona').val(null);
        $('#diskripsi_zona').val(null);
        $('#ModalZona').modal('show');
    });

    //edit function
    $(document).on('click', '.edit-modal', function () {
        $('.btnAddZona').removeClass('addZona');
        $('.btnAddZona').addClass('editZona');
        $('.modal-title').text('Edit Data Zona SSH');
        $('.form-horizontal').show();
        $('#id_zona').val($(this).data('id_zona'));
        $('#ket_zona').val($(this).data('keterangan_zona'));
        $('#diskripsi_zona').val($(this).data('diskripsi_zona'));
        $('#ModalZona').modal('show');
    });

    //delete function
    $(document).on('click', '.delete-modal', function () {
        $('.actionBtn').addClass('deleteZona');
        $('.modal-title').text('Hapus Data');
        $('.id_zona').text($(this).data('id_zona'));
        $('.form-horizontal').hide();
        $('.title').html($(this).data('keterangan_zona'));
        $('#HapusModal').modal('show');
    });

    $('.modal-footer').on('click', '.addZona', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './zonassh/tambah',
            data: {
                '_token': $('input[name=_token]').val(),
                'ket_zona': $('#ket_zona').val(),
                'diskripsi_zona': $('#diskripsi_zona').val()
            },
            success: function (data) {
                $('#tblzona').DataTable().ajax.reload();
                if (data.status_pesan == 1) {
                    $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.pesan + '</div>');
                } else {
                    $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.pesan + '</div>');
                }
            },
        });

        $('#tblzona').DataTable().ajax.reload();
    });

    $('.modal-footer').on('click', '.editZona', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './zonassh/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#id_zona").val(),
                'ket_zona': $('#ket_zona').val(),
                'diskripsi_zona': $('#diskripsi_zona').val()
            },
            success: function (data) {
                $('#tblzona').DataTable().ajax.reload();
                if (data.status_pesan == 1) {
                    $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.pesan + '</div>');
                } else {
                    $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.pesan + '</div>');
                }
            }
        });

    });

    $('.modal-footer').on('click', '.deleteZona', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './zonassh/delete',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_zona': $('.id_zona').text()
            },
            success: function (data) {
                $('.item' + $('.id_zona').text()).remove();
                $('#tblzona').DataTable().ajax.reload();
                $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.pesan + '</div>');
            }
        });

    });
});