<div id="EditProgram" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmEditProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_rkpd_ranwal_program" name="id_rkpd_ranwal_program">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id">No Urut</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number no_prog" name="no_urut_program" id="no_urut_program" disabled>
                  </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id">Jenis Program RKPD</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="jns_belanja" id="jns_belanja">
                      <option value="0">Belanja Langsung</option>
                      <option value="1">Pendapatan</option>
                      <option value="2">Belanja Tidak Langsung</option>
                      <option value="3">Penerimaan Pembiayaan</option>
                      <option value="4">Pengeluaran Pembiayaan</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group urProgramRPJMD">
                    <label class="control-label col-sm-2" for="title">Uraian Program RPJMD</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_rpjmd" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="thn_id_rpjmd" name="thn_id_rpjmd">
                    <input type="hidden" id="id_visi_rpjmd" name="id_visi_rpjmd">
                    <input type="hidden" id="id_misi_rpjmd" name="id_misi_rpjmd">
                    <input type="hidden" id="id_tujuan_rpjmd" name="id_tujuan_rpjmd">
                    <input type="hidden" id="id_sasaran_rpjmd" name="id_sasaran_rpjmd">
                    <input type="hidden" id="id_program_rpjmd" name="id_program_rpjmd">
                    <a class="btn btn-primary btnCariProgram" id="btnCariProgram" name="btnCariProgram" data-placement="left" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Daftar Indikator yang telah terdapat dalam referensi indikator"><i class="fa fa-search fa-fw fa-lg"></i></a>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Uraian Program RKPD</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_prog" name="ur_program_rkpd" id="ur_program_rkpd" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_rpjmd_program" class="col-sm-2 control-label" align='left'>Pagu RPJMD</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" id="pagu_rpjmd_program" name="pagu_rpjmd_program" disabled >
                  </div>
                  <label for="pagu_opd_program" class="col-sm-1 control-label" align='left'>Pagu OPD</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" id="pagu_opd_program" name="pagu_opd_program" disabled >
                  </div>
                  <label for="pagu_rkpd_program" class="col-sm-1 control-label" align='left'>Pagu RKPD</label>
                  <div class="col-sm-2">
                      <input type="text" class="form-control number" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Diisi dengan jumlah pagu yang akan dianggarkan pada tahun berjalan, jumlahnya bisa lebih besar maupun lebih kecil dari pagu di RPJMD">
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatus">
                  <label for="status_pelaksanaan_program" class="col-sm-2 control-label" align='left'>Status Pelaksanaan</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Tepat Waktu: dilaksanakan pada tahun sesuai RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Dimajukan: dilaksanakan lebih cepat dari rencana RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="1">Dimajukan
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Ditunda: dilaksanakan mundur dari tahun rencana RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="2">Ditunda
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Dibatalkan: Tidak akan dilaksanakan dalam siklus RKPD berjalan;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Tanpa Anggaran: pada tahun berjalan memang tidak dianggarkan dalam RPJMD;">
                        <input type="radio" class="skegiatan hidden" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="5">Tanpa Anggaran
                      </label>
                      <label class="radio-inline" id="status_pelaksanaan4">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="4">Baru
                      </label>
                      
                  </div>
                </div>
                <div class="form-group KetPelaksanaan">
                  <label for="keterangan_status_program" class="col-sm-2 control-label" align='left'>Keterangan Pelaksanaan</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_program" name="keterangan_status_program" id="keterangan_status_program" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusUsulan hidden"> 
                  <label for="status_data_program" class="col-sm-2 control-label" align='left'>Status Usulan</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="0">Draft
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="1">Final
                    </label>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button class="btn btn-sm btn-danger btnHapus"><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnProgram" data-dismiss="modal"><span class="btn-label"><i id="footer_action_button" class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<!--Modal Aktivitas-->
  <div id="HapusProgram" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_program_hapus" name="id_program_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Program RKPD : <strong><span class="ur_program_del"></span></strong> yang merupakan penambahan program baru ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" class="btn btn-labeled btn-danger btnDelProgram" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
