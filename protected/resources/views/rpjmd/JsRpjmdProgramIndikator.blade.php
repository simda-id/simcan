
{{-- <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() { --}}
    $(document).on('click', '.btnAddIndikatorProgram', function() {
        var data = tblProgram.row( $(this).parents('tr') ).data();
        $('.btnSimpanProgramIndikator').removeClass('editProgramIndikator');
        $('.btnSimpanProgramIndikator').addClass('addProgramIndikator');
        $('.modal-title').text('Data Indikator Program Daerah');
        $('.form-horizontal').show();
        $('#id_indikator_program_rpjmd_edit').val(null);
        $('#thn_id_indikator_program_edit').val(tahun_rpjmd);
        $('#id_program_rpjmd_indikator_edit').val(data.id_program_rpjmd);
        $('#no_urut_indikator_program_edit').val(1);
        $('#id_perubahan_indikator_program_edit').val(0);
        $('#ur_indikator_program_rpjmd').val(null);
        $('#kd_indikator_program_rpjmd').val(null);
        $('#indiprogram1_edit').val(0);
        $('#indiprogram2_edit').val(0);
        $('#indiprogram3_edit').val(0);
        $('#indiprogram4_edit').val(0);
        $('#indiprogram5_edit').val(0);
        $('#indiprogram_awal_edit').val(0);
        $('#indiprogram_akhir_edit').val(0);
        $('#satuan_program_indikator_edit').val(null);
        $('#ModalIndikatorProgram').modal('show');
    });

    $('.modal-footer').on('click', '.addProgramIndikator', function() {
        $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './rpjmd/addIndikatorProgram',
            data: {
                '_token': $('input[name=_token]').val(),
                'thn_id': $('#thn_id_indikator_program_edit').val(),
                'no_urut': $('#no_urut_indikator_program_edit').val(),
                'id_program_rpjmd': $('#id_program_rpjmd_indikator_edit').val(),
                'id_perubahan': $('#id_perubahan_indikator_program_edit').val(),
                'kd_indikator': $('#kd_indikator_program_rpjmd').val(),
                'uraian_indikator_program_rpjmd': $('#ur_indikator_program_rpjmd').val(),
                'tolok_ukur_indikator': $('#ur_indikator_program_rpjmd').val(),
                'angka_awal_periode': $('#indiprogram_awal_edit').val(),
                'angka_tahun1': $('#indiprogram1_edit').val(),
                'angka_tahun2': $('#indiprogram2_edit').val(),
                'angka_tahun3': $('#indiprogram3_edit').val(),
                'angka_tahun4': $('#indiprogram4_edit').val(),
                'angka_tahun5': $('#indiprogram5_edit').val(),
                'angka_akhir_periode': $('#indiprogram_akhir_edit').val(),    
            },
            success: function(data) {
                $('#tblProgram').DataTable().ajax.reload(null,false);
                if(data.status_pesan==1){
                    createPesan(data.pesan,"success");
                    } else {
                    createPesan(data.pesan,"danger"); 
                }

            }
        });
    });

    $(document).on('click', '.btnEditIndikatorProgram', function() {
    var data = tblInProgram.row( $(this).parents('tr') ).data();
        $('.btnSimpanProgramIndikator').removeClass('addProgramIndikator');
        $('.btnSimpanProgramIndikator').addClass('editProgramIndikator');
        $('.modal-title').text('Data Indikator Program Daerah');
        $('.form-horizontal').show();
        $('#id_indikator_program_rpjmd_edit').val(data.id_indikator_program_rpjmd);
        $('#thn_id_indikator_program_edit').val(data.thn_id);
        $('#id_program_rpjmd_indikator_edit').val(data.id_program_rpjmd);
        $('#no_urut_indikator_program_edit').val(data.no_urut);
        $('#id_perubahan_indikator_program_edit').val(data.id_perubahan);
        $('#ur_indikator_program_rpjmd').val(data.nm_indikator);
        $('#kd_indikator_program_rpjmd').val(data.id_indikator);
        $('#indiprogram1_edit').val(data.angka_tahun1);
        $('#indiprogram2_edit').val(data.angka_tahun2);
        $('#indiprogram3_edit').val(data.angka_tahun3);
        $('#indiprogram4_edit').val(data.angka_tahun4);
        $('#indiprogram5_edit').val(data.angka_tahun5);
        $('#indiprogram_awal_edit').val(data.angka_awal_periode);
        $('#indiprogram_akhir_edit').val(data.angka_akhir_periode);
        $('#satuan_program_indikator_edit').val(data.uraian_satuan);
        $('#ModalIndikatorProgram').modal('show');
    });

    $('.modal-footer').on('click', '.editProgramIndikator', function() {
        $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './rpjmd/editIndikatorProgram',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_indikator_program_rpjmd': $('#id_indikator_program_rpjmd_edit').val(),
                'thn_id': $('#thn_id_indikator_program_edit').val(),
                'thn_id': $('#thn_id_indikator_program_edit').val(),
                'no_urut': $('#no_urut_indikator_program_edit').val(),
                'id_program_rpjmd': $('#id_program_rpjmd_indikator_edit').val(),
                'id_perubahan': $('#id_perubahan_indikator_program_edit').val(),
                'kd_indikator': $('#kd_indikator_program_rpjmd').val(),
                'uraian_indikator_program_rpjmd': $('#ur_indikator_program_rpjmd').val(),
                'tolok_ukur_indikator': $('#ur_indikator_program_rpjmd').val(),
                'angka_awal_periode': $('#indiprogram_awal_edit').val(),
                'angka_tahun1': $('#indiprogram1_edit').val(),
                'angka_tahun2': $('#indiprogram2_edit').val(),
                'angka_tahun3': $('#indiprogram3_edit').val(),
                'angka_tahun4': $('#indiprogram4_edit').val(),
                'angka_tahun5': $('#indiprogram5_edit').val(),
                'angka_akhir_periode': $('#indiprogram_akhir_edit').val(),    
            },
            success: function(data) {
                $('#tblProgram').DataTable().ajax.reload(null,false);
                if(data.status_pesan==1){
                    createPesan(data.pesan,"success");
                    } else {
                    createPesan(data.pesan,"danger"); 
                }

            }
        });
    });

    $(document).on('click', '.btnHapusIndikatorProgram', function() {
        var data = tblInProgram.row( $(this).parents('tr') ).data();
        $('.btnDelProgramIndikator').addClass('delProgramIndikator');
        $('.modal-title').text('Hapus Referensi Indikator');
        $('.form-horizontal').hide();
        $('#id_program_indikator_hapus').val(data.id_indikator_program_rpjmd);
        $('#nm_program_indikator_hapus').html(data.nm_indikator);
        $('#HapusProgramIndikatorModal').modal('show');

    });
        
        
        
    $('.modal-footer').on('click', '.delProgramIndikator', function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        
        $.ajax({
            type: 'post',
            url: './rpjmd/delIndikatorProgram',
            data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator_program_rpjmd': $('#id_program_indikator_hapus').val(),
            },
            success: function(data) {
                $('#tblProgram').DataTable().ajax.reload(null,false);
                if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
                }
            }
        });
    });
{{-- });
</script> --}}