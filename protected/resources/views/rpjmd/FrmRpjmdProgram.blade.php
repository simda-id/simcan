<div id="Editprogram" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" class="form-control" id="id_program_rpjmd_edit" name="id_program_rpjmd_edit" readonly>
          <input type="hidden" class="form-control" id="id_sasaran_rpjmd_program_edit" name="id_sasaran_rpjmd_edit"
            readonly>
          <div class="form-group">
            <label for="id_sasaran_rpjmd_edit" class="col-sm-3 control-label" align='left'>No Sasaran RPJMD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="id_sasaran_program_edit" name="id_sasaran_program_edit"
                readonly style="text-align:center;">
            </div>
            <label for="jns_program" class="col-sm-2 control-label" align='left'>Jenis Pendanaan :</label>
            <div class="col-sm-4">
              <select class="form-control select2 jns_program" name="jns_program" id="jns_program">
                <option value="0">-NA-</option>
                <option value="1">-NA-</option>
                <option value="2">Pendapatan</option>
                <option value="3">Penerimaan Pembiayaan</option>
                <option value="4">Pengeluaran Pembiayaan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control number" id="no_urut_program_edit" name="no_urut_program_edit"
                  required="required" style="text-align:center;">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="id_perubahan_program_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control number" id="id_perubahan_program_edit"
                  name="id_perubahan_program_edit" required="required" style="text-align:center;">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_program_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian Program Daerah
              :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" rows="5" id="ur_program_rpjmd_edit"
                name="ur_program_rpjmd_edit" required="required"></textarea>
            </div>
          </div>
          <label class="col-sm-12" style="text-align: left;">Rincian Pagu Program RPJMD :</label>
          <br>
          <table id="tblPaguProgram" class="table table-bordered" cellspacing="0" width="100%">
            <thead style="background: #428bca; color: #fff">
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">Uraian</th>
                <th width="19%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                <th width="19%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                <th width="19%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                <th width="19%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                <th width="19%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">RPJMD</th>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control" id="pagu1_edit" name="pagu1_edit"
                    style="text-align: right; vertical-align:middle">
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu2_edit" name="pagu2_edit"
                    style="text-align: right; vertical-align:middle">
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu3_edit" name="pagu3_edit"
                    style="text-align: right; vertical-align:middle">
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu4_edit" name="pagu4_edit"
                    style="text-align: right; vertical-align:middle">
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu5_edit" name="pagu5_edit"
                    style="text-align: right; vertical-align:middle">
                </td>
              </tr>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">Renstra</th>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu1_opd" name="pagu1_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu2_opd" name="pagu2_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu3_opd" name="pagu3_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu4_opd" name="pagu4_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
                <td width="19%" style="text-align: center; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu5_opd" name="pagu5_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: right; vertical-align:middle; font-weight: bold;">Pagu Total RPJMD
                </td>
                <td colspan="2" style="text-align: right; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu_total_edit" name="pagu_total_edit"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: right; vertical-align:middle; font-weight: bold;">Pagu Total Renstra
                </td>
                <td colspan="2" style="text-align: right; vertical-align:middle">
                  <input type="text" class="form-control number" id="pagu_total_opd" name="pagu_total_opd"
                    style="text-align: right; vertical-align:middle" disabled readonly>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button type="button" id="btnDelProgram" class="btn btn-labeled btn-danger btnDelProgram"><span
                class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success actionBtn_program btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or hidden"></div>
              <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>