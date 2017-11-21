<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use Response;
use Session;
use PDF;
use App\Models\RefSshGolongan;
use App\Models\RefSshKelompok;
use App\Models\RefSshSubKelompok;
use App\Models\RefSshPerkadaTarif;
use App\Models\RefSshRekening;
use App\Models\RefRek5;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Services\DataTable;


class CetakSshPerkadaTarifSubKelController extends Controller
{

	public function printSshPerkadaTarif($id_sub_kel)
  {
  	$sshGolongan = RefSshGolongan::select('ref_ssh_golongan.id_golongan_ssh','ref_ssh_golongan.uraian_golongan_ssh','ref_ssh_kelompok.id_kelompok_ssh','ref_ssh_kelompok.uraian_kelompok_ssh','ref_ssh_sub_kelompok.id_sub_kelompok_ssh','ref_ssh_sub_kelompok.uraian_sub_kelompok_ssh')
  					->join('ref_ssh_kelompok','ref_ssh_golongan.id_golongan_ssh','=','ref_ssh_kelompok.id_golongan_ssh')
  					->join('ref_ssh_sub_kelompok','ref_ssh_kelompok.id_kelompok_ssh','=','ref_ssh_sub_kelompok.id_kelompok_ssh')
  					->where('ref_ssh_sub_kelompok.id_sub_kelompok_ssh','=',$id_sub_kel)
                    ->get();

    // set document information
    PDF::SetCreator('BPKP');
    PDF::SetAuthor('BPKP');
    PDF::SetTitle('Simd@Perencanaan');
    PDF::SetSubject('SSH Kelompok');

    // set default header data
    PDF::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

    // set header and footer fonts
    PDF::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    PDF::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    PDF::SetHeaderMargin(PDF_MARGIN_HEADER);
    PDF::SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    //PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    // PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    // if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    //     require_once(dirname(__FILE__).'/lang/eng.php');
    //     $pdf->setLanguageArray($l);
    // }

    // ---------------------------------------------------------

    // set font
    PDF::SetFont('helvetica', '', 6);

    // add a page
    PDF::AddPage('P');

    // column titles
    $header = array('Kode','Uraian','Satuan','Harga','KD Belanja');

    // Colors, line width and bold font
    PDF::SetFillColor(200, 200, 200);
    PDF::SetTextColor(0);
    PDF::SetDrawColor(255, 255, 255);
    PDF::SetLineWidth(0);
    PDF::SetFont('helvetica', 'B', 10);

    //Header
    PDF::Cell('150', 5, 'PEMERINTAH DAERAH SIMULASI', 1, 0, 'C', 0);
    PDF::Ln();
    PDF::Cell('150', 5, 'STANDAR SATUAN HARGA TARIF', 1, 0, 'C', 0);
    PDF::Ln();
    PDF::SetFont('', 'B');
    PDF::SetFont('helvetica', 'B', 6);
    
    // Header Column
    $wh = array(34,58,30,30,30,30);
    $w = array(7,7,10,10,58,30,30,30,30);
  
        // Color and font restoration

    PDF::SetFillColor(224, 235, 255);
    PDF::SetTextColor(0);
    PDF::SetFont('helvetica', '', 6);
        // Data
    $fill = 0;
    $count=0;
    foreach($sshGolongan as $row) {
    	PDF::Cell('40', '5', 'Golongan SSH', 0, 0, 'L', 0);
    	PDF::Cell('5', '5', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '5', $row->uraian_golongan_ssh, 0, 0, 'L', 0);
    	PDF::Ln();
    	$count++;
    	PDF::Cell('40', '5', 'Kelompok SSH', 0, 0, 'L', 0);
    	PDF::Cell('5', '5', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '5', $row->uraian_kelompok_ssh, 0, 0, 'L', 0);
    	PDF::Ln();
    	$count++;
    	PDF::Cell('40', '5', 'Sub Kelompok SSH', 0, 0, 'L', 0);
    	PDF::Cell('5', '5', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '5', $row->uraian_sub_kelompok_ssh, 0, 0, 'L', 0);
    	PDF::Ln();
    	$count++;
    	$num_headers = count($header);
    	for($i = 0; $i < $num_headers; ++$i) {
    		PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    	}
    	PDF::Ln();
    	$count++;
    	//$fill=!$fill;
    	$SshPerkadaTarif = RefSshPerkadaTarif::select('ref_ssh_perkada_tarif.id_tarif_perkada','ref_ssh_tarif.id_sub_kelompok_ssh','ref_ssh_tarif.id_tarif_ssh','ref_ssh_tarif.uraian_tarif_ssh','ref_ssh_rekening.id_rekening','ref_rek_5.kd_rek_1','ref_rek_5.kd_rek_2','ref_rek_5.kd_rek_3','ref_rek_5.kd_rek_4','ref_rek_5.kd_rek_5','ref_rek_5.nama_kd_rek_5','ref_satuan.uraian_satuan','ref_ssh_perkada_tarif.jml_rupiah')
    			->leftjoin('ref_ssh_tarif','ref_ssh_perkada_tarif.id_tarif_ssh','=','ref_ssh_tarif.id_tarif_ssh')
    			->leftjoin('ref_ssh_rekening','ref_ssh_tarif.id_tarif_ssh','=','ref_ssh_rekening.id_tarif_ssh')
    			->leftjoin('ref_rek_5','ref_ssh_rekening.id_rekening','=','ref_rek_5.id_rekening')
    			->leftjoin('ref_satuan','ref_ssh_tarif.id_satuan','=','ref_satuan.id_satuan')
    			->distinct()
    			->where('ref_ssh_tarif.id_sub_kelompok_ssh','=',$row->id_sub_kelompok_ssh)
    			->get();
    			foreach($SshPerkadaTarif as $row2) {
    				PDF::MultiCell($w[0], 6, $row->id_golongan_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[1], 6, $row->id_kelompok_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[2], 6, $row->id_sub_kelompok_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[3], 6, $row2->id_tarif_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[4], 6, $row2->uraian_tarif_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[5], 6, $row2->uraian_satuan, 0, 'L', 0, 0);
    				PDF::MultiCell($w[6], 6, number_format($row2->jml_rupiah, 2, ',', '.'), 0, 'R', 0, 0);
    				PDF::MultiCell($w[7], 6, $row2->kd_rek_1 . '.' . $row2->kd_rek_2. '.' . $row2->kd_rek_3. '.' . $row2->kd_rek_4. '.' . $row2->kd_rek_5, 0, 'L', 0, 0);
    				PDF::Ln();
    				$count++;
    				if($count>39)
    				{
    					$count=0;
    					PDF::AddPage('P');
    					$num_headers = count($header);
    					for($i = 0; $i < $num_headers; ++$i) {
    						PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    					}
    					PDF::Ln();
    					$count++;
    					
    				}
    			}
        }
    

    // ---------------------------------------------------------

    // close and output PDF document
    PDF::Output('PerkadaTarifSSH.pdf', 'I');
  }

}

