$(document).ready(function () {

    var id_gol_ssh, nm_gol_ssh;
    var id_kel_ssh, nm_kel_ssh;
    var id_skel_ssh, nm_skel_ssh;
    var id_item_ssh, nm_item_ssh;

    if (id_gol_ssh == null && id_gol_ssh === undefined) {
        document.getElementById("btnAddKel").style.visibility = 'hidden';
        document.getElementById("btnAddSubKel").style.visibility = 'hidden';
        document.getElementById("btnAddItem").style.visibility = 'hidden';
        document.getElementById("btnAddRek").style.visibility = 'hidden';
    };

    $.ajax({
        type: "GET",
        url: './ssh/getRefSatuan',
        dataType: "json",
        success: function (data) {

            var j = data.length;
            var post, i;

            $('select[name="id_satuan_ssh"]').empty();
            $('select[name="id_satuan_ssh"]').append('<option value="-1">---Pilih Satuan---</option>');

            $('select[name="id_satuan_edit"]').empty();
            $('select[name="id_satuan_edit"]').append('<option value="-1">---Pilih Satuan---</option>');

            for (i = 0; i < j; i++) {
                post = data[i];
                $('select[name="id_satuan_ssh"]').append('<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>');
                $('select[name="id_satuan_edit"]').append('<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>');
            }

        }
    });

    var golongan = $('#tblGolongan').DataTable({
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
        "ajax": { "url": "./ssh/getGolongan" },
        "columns": [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'uraian_golongan_ssh' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
        ],
        "order": [[0, 'asc']],
    });

    var kelompok;
    function LoadKelompokSSH(id_golongan) {
        kelompok = $('#tblKelompok').DataTable({
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
            "ajax": { "url": "./ssh/getKelompok/" + id_golongan },
            "columns": [
                { data: 'no_urut_gol', sClass: "dt-center" },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_kelompok_ssh' },
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
            ],
            "order": [[1, "asc"]]
        });
    };

    var subkelompok;
    function LoadSubKelompokSSH(id_ssh) {
        subkelompok = $('#tblSubKelompok').DataTable({
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
            deferRender: true,
            "ajax": { "url": "./ssh/getSubKelompok/" + id_ssh },
            "columns": [
                { data: 'no_urut_kel', sClass: "dt-center" },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_sub_kelompok_ssh' },
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
            ],
            "order": [[1, "asc"]],
        });
    };

    var tarif;
    function LoadItemSSH(id_ssh) {
        tarif = $('#tblTarif').DataTable({
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
            deferRender: true,
            "ajax": { "url": "./ssh/getTarif/" + id_ssh },
            "columns": [
                { data: 'no_urut_skel', sClass: "dt-center" },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_tarif_ssh' },
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
            ],
            "order": [[1, "asc"]],
        });
    };

    var rekeningSSH
    function LoadRekeningSSH(id_ssh) {
        rekeningSSH = $('#tblRekening').DataTable({
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
            deferRender: true,
            "ajax": { "url": "./ssh/getRekening/0" },
            "columns": [
                // { data: 'id_rekening_ssh'},
                { data: 'no_urut_tarif', sClass: "dt-center" },
                { data: 'kd_rekening', sClass: "dt-center" },
                { data: 'ur_rekening' },
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
            ],
            "order": [[1, "asc"]],
        });
    };

    $('#tblGolongan tbody').on('dblclick', 'tr', function () {

        var data = golongan.row(this).data();

        id_gol_ssh = data.id_golongan_ssh;
        nm_gol_ssh = data.uraian_golongan_ssh;

        if (id_gol_ssh != null && id_gol_ssh !== undefined) {
            document.getElementById("btnAddKel").style.visibility = 'visible';
        } else {
            document.getElementById("btnAddKel").style.visibility = 'hidden';
        };

        document.getElementById("nm_golongan_kel").innerHTML = nm_gol_ssh;

        $('.nav-tabs a[href="#kelompok"]').tab('show');
        LoadKelompokSSH(id_gol_ssh);

    });

    $('#tblKelompok tbody').on('dblclick', 'tr', function () {

        var data = kelompok.row(this).data();

        id_gol_ssh = data.id_golongan_ssh;
        nm_gol_ssh = data.uraian_golongan_ssh;
        id_kel_ssh = data.id_kelompok_ssh;
        nm_kel_ssh = data.uraian_kelompok_ssh;

        if (id_kel_ssh != null && id_kel_ssh !== undefined) {
            document.getElementById("btnAddSubKel").style.visibility = 'visible';
        } else {
            document.getElementById("btnAddSubKel").style.visibility = 'hidden';
        };

        document.getElementById("nm_golongan_skel").innerHTML = nm_gol_ssh;
        document.getElementById("nm_kelompok_skel").innerHTML = nm_kel_ssh;


        $('.nav-tabs a[href="#subkelompok"]').tab('show');
        LoadSubKelompokSSH(id_kel_ssh);

    });

    $('#tblSubKelompok tbody').on('dblclick', 'tr', function () {

        var data = subkelompok.row(this).data();

        id_gol_ssh = data.id_golongan_ssh;
        nm_gol_ssh = data.uraian_golongan_ssh;
        id_kel_ssh = data.id_kelompok_ssh;
        nm_kel_ssh = data.uraian_kelompok_ssh;
        id_skel_ssh = data.id_sub_kelompok_ssh;
        nm_skel_ssh = data.uraian_sub_kelompok_ssh;

        if (id_skel_ssh != null && id_skel_ssh !== undefined) {
            document.getElementById("btnAddItem").style.visibility = 'visible';
        } else {
            document.getElementById("btnAddItem").style.visibility = 'hidden';
        };

        document.getElementById("nm_golongan_tarif").innerHTML = nm_gol_ssh;
        document.getElementById("nm_kelompok_tarif").innerHTML = nm_kel_ssh;
        document.getElementById("nm_subkelompok_tarif").innerHTML = nm_skel_ssh;

        $('.nav-tabs a[href="#tarif"]').tab('show');
        LoadItemSSH(id_skel_ssh);

    });

    $('#tblTarif tbody').on('dblclick', 'tr', function () {

        var data = tarif.row(this).data();

        id_gol_ssh = data.id_golongan_ssh;
        nm_gol_ssh = data.uraian_golongan_ssh;
        id_kel_ssh = data.id_kelompok_ssh;
        nm_kel_ssh = data.uraian_kelompok_ssh;
        id_skel_ssh = data.id_sub_kelompok_ssh;
        nm_skel_ssh = data.uraian_sub_kelompok_ssh;
        id_item_ssh = data.id_tarif_ssh;
        nm_item_ssh = data.uraian_tarif_ssh;

        if (id_item_ssh != null && id_item_ssh !== undefined) {
            document.getElementById("btnAddRek").style.visibility = 'visible';
        } else {
            document.getElementById("btnAddRek").style.visibility = 'hidden';
        };

        document.getElementById("nm_golongan_rek").innerHTML = nm_gol_ssh;
        document.getElementById("nm_kelompok_rek").innerHTML = nm_kel_ssh;
        document.getElementById("nm_subkelompok_rek").innerHTML = nm_skel_ssh;
        document.getElementById("nm_itemssh_rek").innerHTML = nm_item_ssh;

        $('.nav-tabs a[href="#rekening"]').tab('show');
        LoadRekeningSSH(id_item_ssh);
    });

    var rekening = $('#tblCariRekening').DataTable({
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
        deferRender: true,
        "ajax": { "url": "./ssh/getCariRekening" },
        "columns": [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'kd_rekening', sClass: "dt-center" },
            { data: 'nm_rekening' }
        ],
        "order": [[0, 'asc']],
    });

    $('#tblCariRekening tbody').on('dblclick', 'tr', function () {

        var data = rekening.row(this).data();

        document.getElementById("nm_rekening").value = data.kd_rekening + '--' + data.nm_rekening;
        document.getElementById("id_rek").value = data.id_rekening;

        document.getElementById("nm_rekening_edit").value = data.kd_rekening + '--' + data.nm_rekening;
        document.getElementById("id_rekening_edit").value = data.id_rekening;

        $('#cariRekening').modal('hide');

    });

    //tambah golongan
    $(document).on('click', '.add-golongan', function () {
        $('.btnAddGol').addClass('btn-success');
        $('.btnAddGol').removeClass('btn-danger');
        $('.btnAddGol').addClass('addGolongan');
        $('.modal-title').text('Tambah Data Golongan SSH');
        $('.form-horizontal').show();
        $('#TambahGolongan').modal('show');
    });

    $('.modal-footer').on('click', '.addGolongan', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/addGolongan',
            data: {
                '_token': $('input[name=_token]').val(),
                'no_urut_gol': $('#no_urut_gol').val(),
                'ur_golongan': $('#ur_golongan').val(),
            },
            success: function (data) {
                $('#tblGolongan').DataTable().ajax.reload(null, true);
                $('#tblGolongan').DataTable().page('last').draw('page');
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            },
        });
    });

    //edit golongan
    $(document).on('click', '.edit-golongan', function () {
        $('.btnEditGol').addClass('btn-success');
        $('.btnEditGol').removeClass('btn-danger');
        $('.btnEditGol').addClass('editGolongan');
        $('.modal-title').text('Edit Data Golongan SSH');
        $('.form-horizontal').show();
        $('#id_gol_edit').val($(this).data('id_gol_edit'));
        $('#no_urut_gol_edit').val($(this).data('no_urut_gol_edit'));
        $('#ur_gol_edit').val($(this).data('ur_gol_edit'));
        $('#EditGolongan').modal('show');
    });

    $('.modal-footer').on('click', '.editGolongan', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/editGolongan',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_gol_edit': $("#id_gol_edit").val(),
                'no_urut_gol_edit': $('#no_urut_gol_edit').val(),
                'ur_gol_edit': $('#ur_gol_edit').val(),
            },
            success: function (data) {
                $('#tblGolongan').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //hapus golongan
    $(document).on('click', '.delete-golongan', function () {
        $('.btnDelGol').removeClass('btn-success');
        $('.btnDelGol').addClass('btn-danger');
        $('.btnDelGol').addClass('delGolongan');
        $('.modal-title').text('Hapus Data Golongan SSH');
        $('.id_gol_hapus').text($(this).data('id_gol_hapus'));
        $('.form-horizontal').hide();
        $('.title').html($(this).data('ur_gol_hapus'));
        $('#HapusGolongan').modal('show');
    });

    $('.modal-footer').on('click', '.delGolongan', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/hapusGolongan',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_gol_hapus': $('.id_gol_hapus').text()
            },
            success: function (data) {
                $('.item' + $('.id_gol_hapus').text()).remove();
                $('#tblGolongan').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //tambah Kelompok
    $(document).on('click', '.add-kelompok', function () {
        $('.btnAKel').addClass('btn-success');
        $('.btnAKel').removeClass('btn-danger');
        $('.btnAKel').addClass('addKelompok');
        $('.modal-title').text('Tambah Data Kelompok SSH');
        $('.form-horizontal').show();
        $('#id_gol_kel').val(id_gol_ssh);
        document.getElementById("idgol_kel").innerHTML = nm_gol_ssh;
        $('#TambahKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.addKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/addKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_gol_kel': $('#id_gol_kel').val(),
                'no_urut_kel': $('#no_urut_kel').val(),
                'ur_kel_ssh': $('#ur_kel_ssh').val(),
            },
            success: function (data) {
                $('#tblKelompok').DataTable().ajax.reload(null, false);
                $('#tblKelompok').DataTable().page('last').draw('page');
                $('#kelompok').html();
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            },
        });
    });

    //Edit Kelompok
    $(document).on('click', '.edit-kelompok', function () {
        $('.btnEkel').addClass('btn-success');
        $('.btnEkel').removeClass('btn-danger');
        $('.btnEkel').addClass('editKelompok');
        $('.modal-title').text('Edit Data Kelompok SSH');
        $('.form-horizontal').show();
        $('#id_gol_kel_edit').val($(this).data('id_gol_kel'));
        document.getElementById("idgol_kel_edit").innerHTML = nm_gol_ssh;
        $('#id_kel_edit').val($(this).data('id_kel'));
        $('#no_urut_kel_edit').val($(this).data('no_urut_kel'));
        $('#ur_kel_edit').val($(this).data('ur_kel'));
        $('#EditKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.editKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/editKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_gol_kel_edit': $("#id_gol_kel_edit").val(),
                'id_kel_edit': $("#id_kel_edit").val(),
                'no_urut_kel_edit': $('#no_urut_kel_edit').val(),
                'ur_kel_edit': $('#ur_kel_edit').val(),
            },
            success: function (data) {
                $('#tblKelompok').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //Hapus Kelompok
    $(document).on('click', '.delete-kelompok', function () {
        $('.btnHapusKel').removeClass('btn-success');
        $('.btnHapusKel').addClass('btn-danger');
        $('.btnHapusKel').addClass('delKelompok');
        $('.modal-title').text('Hapus Data Kelompok SSH');
        $('.id_kel_hapus').text($(this).data('id_kel_hapus'));
        $('.form-horizontal').hide();
        $('.uraian').html($(this).data('ur_kel_hapus'));
        $('#HapusKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.delKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/hapusKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_kel_hapus': $('.id_kel_hapus').text()
            },
            success: function (data) {
                $('.item' + $('.id_kel_hapus').text()).remove();
                $('#tblKelompok').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //tambah SubKelompok
    $(document).on('click', '.add-subkelompok', function () {
        $('.btnAddSKel').addClass('btn-success');
        $('.btnAddSKel').removeClass('btn-danger');
        $('.btnAddSKel').addClass('addSubKelompok');
        $('.modal-title').text('Tambah Data Sub Kelompok SSH');
        $('.form-horizontal').show();
        $('#id_gol_subkel').val(id_gol_ssh);
        $('#id_kel_sub').val(id_kel_ssh);
        document.getElementById("idgol_subkel").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_sub").innerHTML = nm_kel_ssh;
        $('#TambahSubKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.addSubKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/addSubKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_kel_sub': $('#id_kel_sub').val(),
                'no_urut_sub': $('#no_urut_sub').val(),
                'ur_subkel_ssh': $('#ur_subkel_ssh').val(),
            },
            success: function (data) {
                $('#tblSubKelompok').DataTable().ajax.reload(null, false);
                $('#tblSubKelompok').DataTable().page('last').draw('page');
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            },
        });
    });

    //Edit Sub Kelompok
    $(document).on('click', '.edit-subkelompok', function () {
        $('.btnEditSKel').addClass('btn-success');
        $('.btnEditSKel').removeClass('btn-danger');
        $('.btnEditSKel').addClass('editSubKelompok');
        $('.modal-title').text('Edit Data Sub Kelompok SSH');
        $('.form-horizontal').show();
        $('#id_gol_sub_edit').val($(this).data('id_gol_sub'));
        $('#id_kel_sub_edit').val($(this).data('id_kel_sub'));
        document.getElementById("idgol_sub_edit").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_sub_edit").innerHTML = nm_kel_ssh;
        $('#id_subkel_edit').val($(this).data('id_sub'));
        $('#no_urut_sub_edit').val($(this).data('no_urut_sub'));
        $('#ur_subkel_edit').val($(this).data('ur_sub'));
        $('#EditSubKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.editSubKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/editSubKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_kel_sub': $("#id_kel_sub_edit").val(),
                'id_subkel_edit': $("#id_subkel_edit").val(),
                'no_urut_sub': $('#no_urut_sub_edit').val(),
                'ur_subkel_ssh': $('#ur_subkel_edit').val(),
            },
            success: function (data) {
                $('#tblSubKelompok').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //Hapus SubKelompok
    $(document).on('click', '.delete-subkelompok', function () {
        $('.btnHapusSKel').removeClass('btn-success');
        $('.btnHapusSKel').addClass('btn-danger');
        $('.btnHapusSKel').addClass('delSubKelompok');
        $('.modal-title').text('Hapus Data Sub Kelompok SSH');
        $('.id_subkel_hapus').text($(this).data('id_sub'));
        $('.form-horizontal').hide();
        $('.uraian').html($(this).data('ur_sub'));
        $('#HapusSubKelompok').modal('show');
    });

    $('.modal-footer').on('click', '.delSubKelompok', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/hapusSubKelompok',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_subkel_hapus': $('.id_subkel_hapus').text()
            },
            success: function (data) {
                $('.item' + $('.id_subkel_hapus').text()).remove();
                $('#tblSubKelompok').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });


    });

    //tambah Item
    $(document).on('click', '.add-item', function () {
        $('.btnAItem').addClass('btn-success');
        $('.btnAItem').removeClass('btn-danger');
        $('.btnAItem').addClass('addTarif');
        $('.modal-title').text('Tambah Data Item SSH');
        $('.form-horizontal').show();
        $('#id_gol_item').val(id_gol_ssh);
        $('#id_kel_item').val(id_kel_ssh);
        $('#id_sub_item').val(id_skel_ssh);
        document.getElementById("idgol_item").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_item").innerHTML = nm_kel_ssh;
        document.getElementById("idsub_item").innerHTML = nm_skel_ssh;
        $('#ur_item_ssh').val(null);
        $('#ket_item_ssh').val(null);
        $('#TambahItem').modal('show');
    });

    $('.modal-footer').on('click', '.addTarif', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_sub_item': $('#id_sub_item').val(),
                'no_urut_item': $('#no_urut_item').val(),
                'ur_item_ssh': $('#ur_item_ssh').val(),
                'ket_tarif_ssh': $('#ket_item_ssh').val(),
                'id_satuan': $('#id_satuan_ssh').val(),
            },
            success: function (data) {
                $('#tblTarif').DataTable().ajax.reload(null, false);
                $('#tblTarif').DataTable().page('last').draw('page');
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            },
        });
    });

    function getStatusData() {
        var xCheck = document.querySelectorAll('input[name="status_item_edit"]:checked');
        var xyz = [];
        for (var x = 0, l = xCheck.length; x < l; x++) { xyz.push(xCheck[x].value); }
        var xvalues = xyz.join('');
        return xvalues;
    }

    //Edit Item
    $(document).on('click', '.edit-tarif', function () {

        var data = $('#tblTarif').DataTable().row($(this).parents('tr')).data();

        $('.btnEditItem').addClass('btn-success');
        $('.btnEditItem').removeClass('btn-danger');
        $('.btnEditItem').addClass('editItem');
        $('.modal-title').text('Edit Data Item SSH');
        $('.form-horizontal').show();
        $('#id_gol_item_edit').val($(this).data('id_gol_item'));
        $('#id_kel_item_edit').val($(this).data('id_kel_item'));
        $('#id_sub_item_edit').val($(this).data('id_sub_item'));
        document.getElementById("idgol_item_edit").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_item_edit").innerHTML = nm_kel_ssh;
        document.getElementById("idsub_item_edit").innerHTML = nm_skel_ssh;
        $('#id_item_edit').val($(this).data('id_item'));
        $('#no_urut_item_edit').val($(this).data('no_urut_item'));
        $('#ur_item_edit').val($(this).data('ur_item'));
        $('#ket_item_ssh_edit').val(data.keterangan_tarif_ssh);
        document.frmEditItem.status_item_edit[data.status_data].checked = true;
        $('#id_satuan_edit').val($(this).data('id_satuan'));
        $('#EditItem').modal('show');
    });

    $('.modal-footer').on('click', '.editItem', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_sub_item': $("#id_sub_item_edit").val(),
                'id_item_edit': $("#id_item_edit").val(),
                'no_urut_item': $('#no_urut_item_edit').val(),
                'ur_item_ssh': $('#ur_item_edit').val(),
                'ket_tarif_ssh': $('#ket_item_ssh_edit').val(),
                'id_satuan': $('#id_satuan_edit').val(),
                'status_data': getStatusData(),
            },
            success: function (data) {
                $('#tblTarif').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //Hapus Item
    $(document).on('click', '.delete-tarif', function () {
        $('.btnHapusItem').removeClass('btn-success');
        $('.btnHapusItem').addClass('btn-danger');
        $('.btnHapusItem').addClass('delItem');
        $('.modal-title').text('Hapus Data Item SSH');
        $('.id_item_hapus').text($(this).data('id_item'));
        $('.form-horizontal').hide();
        $('.uraian').html($(this).data('ur_item'));
        $('#HapusItem').modal('show');
    });

    $('.modal-footer').on('click', '.delItem', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/hapusItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_item_hapus': $('.id_item_hapus').text()
            },
            success: function (data) {
                $('.item' + $('.id_item_hapus').text()).remove();
                $('#tblTarif').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //tambah Item
    $(document).on('click', '.add-rekening', function () {
        $('.btnARek').addClass('btn-success');
        $('.btnARek').removeClass('btn-danger');
        $('.btnARek').addClass('addRekening');
        $('.modal-title').text('Tambah Data Rekening atas Item SSH');
        $('.form-horizontal').show();
        $('#id_gol_rek').val(id_gol_ssh);
        $('#id_kel_rek').val(id_kel_ssh);
        $('#id_sub_rek').val(id_skel_ssh);
        $('#id_item_rek').val(id_item_ssh);
        document.getElementById("idgol_rek").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_rek").innerHTML = nm_kel_ssh;
        document.getElementById("idsub_rek").innerHTML = nm_skel_ssh;
        document.getElementById("iditem_rek").innerHTML = nm_item_ssh;
        $('#id_rek').val(null);
        $('#nm_rekening').val(null);
        $('#TambahRekening').modal('show');
    });

    $('.modal-footer').on('click', '.addRekening', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/addRekeningSsh',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_tarif_ssh': $('#id_item_rek').val(),
                'id_rekening': $('#id_rek').val(),
            },
            success: function (data) {
                $('#tblRekening').DataTable().ajax.reload(null, false);
                $('#tblRekening').DataTable().page('last').draw('page');
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            },
        });
    });

    //Edit Rekening
    $(document).on('click', '.edit-rekening', function () {
        $('.btnEditRek').addClass('btn-success');
        $('.btnEditRek').removeClass('btn-danger');
        $('.btnEditRek').addClass('editRekening');
        $('.modal-title').text('Edit Data Rekening Belanja Item SSH');
        $('.form-horizontal').show();
        $('#id_gol_rek_edit').val($(this).data('id_gol_item'));
        $('#id_kel_rek_edit').val($(this).data('id_kel_item'));
        $('#id_sub_rek_edit').val($(this).data('id_sub_item'));
        $('#id_item_rek_edit').val($(this).data('id_item'));
        document.getElementById("idgol_rek_edit").innerHTML = nm_gol_ssh;
        document.getElementById("idkel_rek_edit").innerHTML = nm_kel_ssh;
        document.getElementById("idsub_rek_edit").innerHTML = nm_skel_ssh;
        document.getElementById("iditem_rek_edit").innerHTML = nm_item_ssh;
        $('#id_rekening_edit').val($(this).data('id_rekening_edit'));
        $('#nm_rekening_edit').val($(this).data('kd_rekening') + " - " + $(this).data('ur_rekening'));
        $('#id_rek_edit').val($(this).data('id_rek_edit'));
        $('#EditRekening').modal('show');
    });

    $('.modal-footer').on('click', '.editRekening', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/editRekeningSsh',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_sub_item': $("#id_sub_rek_edit").val(),
                'id_tarif_ssh': $("#id_item_rek_edit").val(),
                'id_rekening': $('#id_rekening_edit').val(),
                'id_rek_edit': $('#id_rek_edit').val(),
            },
            success: function (data) {
                $('#tblRekening').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

    //Hapus Rekening
    $(document).on('click', '.delete-rekening', function () {
        $('.btnHapusRek').removeClass('btn-success');
        $('.btnHapusRek').addClass('btn-danger');
        $('.btnHapusRek').addClass('delRekening');
        $('.modal-title').text('Hapus Data Rekening Belanja Item SSH');
        $('.id_rek_hapus').text($(this).data('id_rek_hapus'));
        $('.form-horizontal').hide();
        $('.uraian').html($(this).data('ur_rekening'));
        $('#HapusRekening').modal('show');
    });

    $('.modal-footer').on('click', '.delRekening', function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './ssh/hapusRekeningSsh',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_rek_hapus': $('.id_rek_hapus').text()
            },
            success: function (data) {
                $('.item' + $('.id_rek_hapus').text()).remove();
                $('#tblRekening').DataTable().ajax.reload(null, false);
                if (data.status_pesan == 1) {
                    createPesan(data.pesan, "success");
                } else {
                    createPesan(data.pesan, "danger");
                }
            }
        });
    });

});