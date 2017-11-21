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


class CetakSshPerkadaTarifController extends Controller
{

	public function printSshPerkadaTarif()
  {
  	$sshGolongan = RefSshGolongan::select('id_golongan_ssh','uraian_golongan_ssh')
  	// ->where('id_golongan_ssh','<',30)
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
    PDF::SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

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
    $countrow=0;
    $totalrow=39;

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
    $countrow++;
    PDF::Cell('150', 5, 'STANDAR SATUAN HARGA TARIF', 1, 0, 'C', 0);
    PDF::Ln();
    $countrow++;
    PDF::SetFont('', 'B');
    PDF::SetFont('helvetica', 'B', 6);
    
    // Header Column
    $wh = array(34,82,30,30,30,30);
    $w = array(7,7,10,10,8,8,8,58,30,30,30,30);
    $num_headers = count($header);
    for($i = 0; $i < $num_headers; ++$i) {
            PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    }
    PDF::Ln();
    $countrow++;
        // Color and font restoration

    PDF::SetFillColor(224, 235, 255);
    PDF::SetTextColor(0);
    PDF::SetFont('helvetica', '', 6);
        // Data
    $fill = 0;
    foreach($sshGolongan as $row) {
    	PDF::Cell($w[0], 6, $row->id_golongan_ssh, 'LR', 0, 'C', $fill);
    	PDF::Cell($w[1], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[2], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[3], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[4], 6, $row->uraian_golongan_ssh, 'L', 0, 'L', $fill);
    	PDF::Cell($w[5], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[6], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[7], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[8], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[9], 6, '', 'L', 0, 'L', $fill);
    	PDF::Cell($w[10], 6, '', 'L', 0, 'L', $fill);
    	
    	PDF::Ln();
    	$countrow++;
    	if($countrow>=$totalrow)
    	{
    		PDF::AddPage('P');
    		$countrow=0;
    		for($i = 0; $i < $num_headers; ++$i) {
    			PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    		}
    		PDF::Ln();
    		$countrow++;
    	}
    	//$fill=!$fill;
    	$sshKelompok = RefSshKelompok::select('id_golongan_ssh','id_kelompok_ssh','uraian_kelompok_ssh')
    	->where('id_golongan_ssh','=',$row->id_golongan_ssh)
    	->get();
    	foreach($sshKelompok as $row2) {
    		PDF::Cell($w[0], 6, $row2->id_golongan_ssh, 'LR', 0, 'C', $fill);
    		PDF::Cell($w[1], 6, $row2->id_kelompok_ssh, 'L', 0, 'L', $fill);
    		PDF::Cell($w[2], 6, '', 'L', 0, 'L', $fill);
    		PDF::Cell($w[3], 6, '', 'L', 0, 'L', $fill);
    		PDF::Cell($w[4], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Cell($w[5], 6, $row2->uraian_kelompok_ssh, 'L', 0, 'L', $fill);
    		PDF::Cell($w[6], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Cell($w[7], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Cell($w[8], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Cell($w[9], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Cell($w[10], 6,'' , 'L', 0, 'L', $fill);
    		PDF::Ln();
    		$countrow++;
    		if($countrow>=$totalrow)
    		{
    			PDF::AddPage('P');
    			$countrow=0;
    			for($i = 0; $i < $num_headers; ++$i) {
    				PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    			}
    			PDF::Ln();
    			$countrow++;
    		}
    		$sshSubKelompok = RefSshSubKelompok::select('id_kelompok_ssh','id_sub_kelompok_ssh','uraian_sub_kelompok_ssh')
    		->where('id_kelompok_ssh','=',$row2->id_kelompok_ssh)
    		->get();
    		foreach($sshSubKelompok as $row3) {
    			PDF::Cell($w[0], 6, $row2->id_golongan_ssh, 'LR', 0, 'C', $fill);
    			PDF::Cell($w[1], 6, $row3->id_kelompok_ssh, 'L', 0, 'L', $fill);
    			PDF::Cell($w[2], 6, $row3->id_sub_kelompok_ssh, 'L', 0, 'L', $fill);
    			PDF::Cell($w[3], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[4], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[5], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[6], 6, $row3->uraian_sub_kelompok_ssh, 'L', 0, 'L', $fill);
    			PDF::Cell($w[7], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[8], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[9], 6, '', 'L', 0, 'L', $fill);
    			PDF::Cell($w[10], 6, '', 'L', 0, 'L', $fill);
    			PDF::Ln();
    			$countrow++;
    			if($countrow>=$totalrow)
    			{
    				PDF::AddPage('P');
    				$countrow=0;
    				for($i = 0; $i < $num_headers; ++$i) {
    					PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    				}
    				PDF::Ln();
    				$countrow++;
    			}
    			$SshPerkadaTarif = RefSshPerkadaTarif::select('ref_ssh_perkada_tarif.id_tarif_perkada','ref_ssh_tarif.id_sub_kelompok_ssh','ref_ssh_tarif.uraian_tarif_ssh','ref_ssh_tarif.uraian_tarif_ssh','ref_ssh_rekening.id_rekening','ref_rek_5.kd_rek_1','ref_rek_5.kd_rek_2','ref_rek_5.kd_rek_3','ref_rek_5.kd_rek_4','ref_rek_5.kd_rek_5','ref_rek_5.nama_kd_rek_5','ref_satuan.uraian_satuan','ref_ssh_perkada_tarif.jml_rupiah')
    			->leftjoin('ref_ssh_tarif','ref_ssh_perkada_tarif.id_tarif_ssh','=','ref_ssh_tarif.id_tarif_ssh')
    			->leftjoin('ref_ssh_rekening','ref_ssh_tarif.id_tarif_ssh','=','ref_ssh_rekening.id_tarif_ssh')
    			->leftjoin('ref_rek_5','ref_ssh_rekening.id_rekening','=','ref_rek_5.id_rekening')
    			->leftjoin('ref_satuan','ref_ssh_tarif.id_satuan','=','ref_satuan.id_satuan')
    			->distinct()
    			->where('ref_ssh_tarif.id_sub_kelompok_ssh','=',$row3->id_sub_kelompok_ssh)
    			->get();
    			foreach($SshPerkadaTarif as $row4) {
    				PDF::MultiCell($w[0], 6, $row2->id_golongan_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[1], 6, $row3->id_kelompok_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[2], 6, $row3->id_sub_kelompok_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[3], 6, $row4->id_tarif_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[4], 6, '', 0, 'L', 0, 0);
    				PDF::MultiCell($w[5], 6, '', 0, 'L', 0, 0);
    				PDF::MultiCell($w[6], 6, '', 0, 'L', 0, 0);
    				PDF::MultiCell($w[7], 6, $row4->uraian_tarif_ssh, 0, 'L', 0, 0);
    				PDF::MultiCell($w[8], 6, $row4->uraian_satuan, 0, 'L', 0, 0);
    				PDF::MultiCell($w[9], 6, number_format($row4->jml_rupiah, 2, ',', '.'), 0, 'L', 0, 0);
    				PDF::MultiCell($w[10], 6, $row4->kd_rek_1 . '.' . $row4->kd_rek_2. '.' . $row4->kd_rek_3. '.' . $row4->kd_rek_4. '.' . $row4->kd_rek_5, 0, 'L', 0, 0);
    				PDF::Ln();
    				$countrow++;
    				if($countrow>=$totalrow)
    				{
    					PDF::AddPage('P');
    					$countrow=0;
    					for($i = 0; $i < $num_headers; ++$i) {
    						PDF::Cell($wh[$i], 7, $header[$i], 1, 0, 'C', 1);
    					}
    					PDF::Ln();
    					$countrow++;
    				}
    				//$fill=!$fill;
    			}
    			//$fill=!$fill;
    		}
    		//$fill=!$fill;
    	}
        }
    PDF::Cell(array_sum($w), 0, '', 'T');

    // ---------------------------------------------------------

    // close and output PDF document
    PDF::Output('PerkadaTarifSSH.pdf', 'I');
  }

}

