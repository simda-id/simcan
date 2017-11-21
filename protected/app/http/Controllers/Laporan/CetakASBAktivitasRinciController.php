<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use Response;
use Session;
use PDF;
use App\Models\RefASBCluster;
use App\Models\RefASBKomponen;
use App\Models\RefAsbKomponenRinci;
use App\Models\TrxAsbAktivitas;
use App\Models\TrxAsbKomponen;
use App\Models\TrxAsbKomponenRinci;
use App\Models\TrxAsbAktivitasKomponen;
use App\Models\RefSatuan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Services\DataTable;


class CetakASBAktivitasRinciController extends Controller
{

	public function printASBAktivitas($id_aktivitas)
  {
  	
//return $id_aktiv; 
    // set document information
    PDF::SetCreator('BPKP');
    PDF::SetAuthor('BPKP');
    PDF::SetTitle('Simd@Perencanaan');
    PDF::SetSubject('ASB Komponen');

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
    PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
    $header = array('Komponen Belanja','koef. 1','','koef. 2','','koef. 3');

    // Colors, line width and bold font
    PDF::SetFillColor(200, 200, 200);
    PDF::SetTextColor(0);
    PDF::SetDrawColor(255, 255, 255);
    PDF::SetLineWidth(0.3);

    //Header
    $v1=20;
    $v2=30;
    $akt=$id_aktivitas;
    
    $ASBAktivitas = TrxASBAktivitas::select('trx_asb_perkada.nomor_perkada','trx_asb_perkada.tahun_berlaku','trx_asb_kelompok.uraian_kelompok_asb','trx_asb_sub_kelompok.uraian_sub_kelompok_asb','trx_asb_sub_sub_kelompok.uraian_sub_sub_kelompok_asb','trx_asb_aktivitas.nm_aktivitas_asb','trx_asb_aktivitas.volume_1','rs1.uraian_satuan as satuan1','trx_asb_aktivitas.volume_2','rs2.uraian_satuan as satuan2','trx_asb_perkada.tanggal_perkada')
    ->join('ref_satuan as rs1','trx_asb_aktivitas.id_satuan_1','=','rs1.id_satuan')
    ->join('ref_satuan as rs2','trx_asb_aktivitas.id_satuan_2','=','rs2.id_satuan')
    ->join('trx_asb_sub_sub_kelompok','trx_asb_aktivitas.id_asb_sub_sub_kelompok','=','trx_asb_sub_sub_kelompok.id_asb_sub_sub_kelompok')
    ->join('trx_asb_sub_kelompok','trx_asb_sub_sub_kelompok.id_asb_sub_kelompok','=','trx_asb_sub_kelompok.id_asb_sub_kelompok')
    ->join('trx_asb_kelompok','trx_asb_sub_kelompok.id_asb_kelompok','=','trx_asb_kelompok.id_asb_kelompok')
    ->join('trx_asb_perkada','trx_asb_kelompok.id_asb_perkada','=','trx_asb_perkada.id_asb_perkada')
    ->where('trx_asb_aktivitas.id_aktivitas_asb','=',$akt)
    ->get();
    PDF::SetFont('helvetica', 'B', 5);
    foreach($ASBAktivitas as $row) {
    	PDF::Cell('153', '3', '', 0, 0, 'L', 0);
    	PDF::Cell('15', '3', 'Nomor Perkada', 0, 0, 'L', 0);
    	PDF::Cell('2', '3', ':', 0, 0, 'L', 0);
    	PDF::Cell('10', '3', $row->nomor_perkada . '  Tahun ' . $row->tahun_berlaku, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Cell('153', '3', '', 0, 0, 'L', 0);
    	PDF::Cell('15', '3', 'Tanggal Perkada', 0, 0, 'L', 0);
    	PDF::Cell('2', '3', ':', 0, 0, 'L', 0);
    	PDF::Cell('10', '3', date('d F Y', strtotime($row->tanggal_perkada)), 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Ln();
    }
    PDF::SetFont('helvetica', 'B', 10);
    PDF::Cell('180', 5, 'PEMERINTAH DAERAH SIMULASI', 'L', 0, 'C', 0);
    PDF::Ln();
    PDF::Cell('180', 5, 'ANALISIS STANDAR BIAYA AKTIVITAS KOMPONEN RINCI', 'L', 0, 'C', 0);
    PDF::Ln();
    PDF::Ln();
    PDF::SetFont('helvetica', 'B', 9);
    foreach($ASBAktivitas as $row) {
    	
    	PDF::Cell('40', '7', 'Kelompok', 0, 0, 'L', 0);
    	PDF::Cell('5', '7', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '7', $row->uraian_kelompok_asb, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Cell('40', '7', 'Sub Kelompok', 0, 0, 'L', 0);
    	PDF::Cell('5', '7', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '7', $row->uraian_sub_kelompok_asb, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Cell('40', '7', 'Sub Sub Kelompok', 0, 0, 'L', 0);
    	PDF::Cell('5', '7', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '7', $row->uraian_sub_sub_kelompok_asb, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Cell('40', '7', 'Aktivitas', 0, 0, 'L', 0);
    	PDF::Cell('5', '7', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '7', $row->nm_aktivitas_asb, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Cell('40', '8', 'Indikator Output', 0, 0, 'L', 0);
    	PDF::Cell('5', '8', ':', 0, 0, 'L', 0);
    	PDF::Cell('100', '8', $row->volume_1 .' '.$row->satuan1 .' x '.$row->volume_2 .' '.$row->satuan2, 0, 0, 'L', 0);
    	PDF::Ln();
    	PDF::Ln();
    }
    PDF::SetFont('', 'B');
    PDF::SetFont('helvetica', 'B', 8);
    PDF::SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0.1, 'color' => array(0, 0, 0)));
    // Header Column
    $wh = array(86,30,2,30,2,30);
    $w = array(80,100);
    $w1 = array(5,75,100);
    $w2 = array(5,5,76,30,5,30,5,30);
    
    $num_headers = count($header);
    for($i = 0; $i < $num_headers; ++$i) {
            PDF::Cell($wh[$i], 7, $header[$i], 0, 0, 'C', 0);
    }
    //PDF::Cell($wh[$num_headers-1], 7, $header[$num_headers-1], 'LR', 0, 'C', 1);
    PDF::Ln();
        // Color and font restoration

    PDF::SetFillColor(224, 235, 255);
    PDF::SetTextColor(0);
    PDF::SetFont('helvetica', '', 7);
        // Data
    $ASBKomponen = TrxAsbKomponen::select('nm_komponen_asb','id_komponen_asb')
    ->where('trx_asb_komponen.id_aktivitas_asb','=',$akt)
    ->get();
    foreach($ASBKomponen as $row2) {
    	PDF::Cell($w[0], 7, $row2->nm_komponen_asb, 0, 0, 'L', 0);
    	PDF::Cell($w[1], 7, '', 0, 0, 'L', 0);
    	PDF::Ln();
    	$ASBKomponenRinci = TrxAsbKomponenRinci::select ('trx_asb_komponen_rinci.id_komponen_asb','trx_asb_komponen_rinci.ket_group')
       	->where('trx_asb_komponen_rinci.id_komponen_asb','=',$row2->id_komponen_asb)
    	->distinct()
    	->get();
    	foreach($ASBKomponenRinci as $row3) {
    		PDF::Cell($w1[0], 7, '', 0, 0, 'L', 0);
    		if($row3->ket_group == null)
    		{
    		PDF::Cell($w1[1], 7, '-', 0, 0, 'L', 0);
    		}
    		else 
    		{
    			PDF::Cell($w1[1], 7, $row3->ket_group, 0, 0, 'L', 0);
    		}
    		PDF::Cell($w1[2], 7, '', 0, 0, 'L', 0);
    		PDF::Ln();
    		$ASBKomponenRinci = TrxAsbKomponenRinci::select('ref_ssh_tarif.uraian_tarif_ssh','trx_asb_komponen_rinci.koefisien1','rs1.uraian_satuan as satuan1','trx_asb_komponen_rinci.koefisien2','rs2.uraian_satuan as satuan2','trx_asb_komponen_rinci.koefisien3','rs3.uraian_satuan as satuan3')
    		->join('trx_asb_komponen','trx_asb_komponen_rinci.id_komponen_asb','=','trx_asb_komponen.id_komponen_asb')
    		->join('ref_satuan as rs1','trx_asb_komponen_rinci.id_satuan1','=','rs1.id_satuan')
    		->join('ref_satuan as rs2','trx_asb_komponen_rinci.id_satuan2','=','rs2.id_satuan')
    		->join('ref_satuan as rs3','trx_asb_komponen_rinci.id_satuan3','=','rs3.id_satuan')
    		->join('ref_ssh_tarif','trx_asb_komponen_rinci.id_tarif_ssh','=','ref_ssh_tarif.id_tarif_ssh')
    		->where('trx_asb_komponen.id_komponen_asb','=',$row3->id_komponen_asb)
    		->where('trx_asb_komponen_rinci.ket_group','=',$row3->ket_group)
    		->get();
    		foreach($ASBKomponenRinci as $row4) {
    			PDF::Cell($w2[0], 7, '', 0, 'L', 0, 0);
    			PDF::MultiCell($w2[1], 7, '', 0, 'L', 0, 0);
    			PDF::MultiCell($w2[2], 7, $row4->uraian_tarif_ssh, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[3], 7, number_format($row4->koefisien1,2,',','.').' '.$row4->satuan1, 0, 'C', 0, 0);
    			PDF::MultiCell($w2[4], 7, 'x', 0, 'L', 0, 0);
    			PDF::MultiCell($w2[5], 7, number_format($row4->koefisien2,2,',','.').' '.$row4->satuan2, 0, 'C', 0, 0);
    			PDF::MultiCell($w2[6], 7, 'x', 0, 'L', 0, 0);
    			PDF::MultiCell($w2[7], 7, number_format($row4->koefisien3,2,',','.').' '.$row4->satuan3, 0, 'C', 0, 0);
    			PDF::Ln();
    		}
    	}
    	
    }
     $ASBKomponenRinci1 = DB::table('trx_asb_komponen_rinci')
    ->select(DB::raw('CAST(sum(IFNULL(trx_asb_komponen_rinci.koefisien1,1)*IFNULL(trx_asb_komponen_rinci.koefisien2,1)*IFNULL(trx_asb_komponen_rinci.koefisien3,1)*ref_ssh_perkada_tarif.jml_rupiah) as DECIMAL(10,0)) as koef,"V1" as var'))
    ->join('trx_asb_komponen','trx_asb_komponen_rinci.id_komponen_asb','=','trx_asb_komponen.id_komponen_asb')
    ->join('trx_asb_aktivitas','trx_asb_komponen.id_aktivitas_asb','=','trx_asb_aktivitas.id_aktivitas_asb')
    ->join('ref_ssh_perkada_tarif','trx_asb_komponen_rinci.id_tarif_ssh','=','ref_ssh_perkada_tarif.id_tarif_ssh')
    ->where('trx_asb_komponen_rinci.jenis_biaya','=',3)
    ->where('trx_asb_aktivitas.id_aktivitas_asb','=',$akt)
    ->whereRaw('((`trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan2` <> trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan3` <> trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan1` <> trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan3` <> trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan2` <> trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan1` <> trx_asb_aktivitas.id_satuan_2))
      ')
    ->groupBy('var')
    ->get();
     
    $ASBKomponenRinci2 = DB::table('trx_asb_komponen_rinci')
    ->select(DB::raw('CAST(IFNULL(sum(IFNULL(trx_asb_komponen_rinci.koefisien1,1)*IFNULL(trx_asb_komponen_rinci.koefisien2,1)*IFNULL(trx_asb_komponen_rinci.koefisien3,1)*ref_ssh_perkada_tarif.jml_rupiah),0) as DECIMAL(10,0)) as koef,"V1" as var'))
    ->join('trx_asb_komponen','trx_asb_komponen_rinci.id_komponen_asb','=','trx_asb_komponen.id_komponen_asb')
    ->join('trx_asb_aktivitas','trx_asb_komponen.id_aktivitas_asb','=','trx_asb_aktivitas.id_aktivitas_asb')
    ->join('ref_ssh_perkada_tarif','trx_asb_komponen_rinci.id_tarif_ssh','=','ref_ssh_perkada_tarif.id_tarif_ssh')
    ->where('trx_asb_komponen_rinci.jenis_biaya','=',3)
    ->where('trx_asb_aktivitas.id_aktivitas_asb','=',$akt)
    ->whereRaw('((`trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan2` <> trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan3` <> trx_asb_aktivitas.id_satuan_1)
				or (`trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan1` <> trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan3` <> trx_asb_aktivitas.id_satuan_1)
				or (`trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_2 and `trx_asb_komponen_rinci`.`id_satuan2` <> trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan1` <> trx_asb_aktivitas.id_satuan_1))
			')
    ->groupBy('var')
    ->get();
    
    $ASBKomponenRinci4 = DB::table('trx_asb_komponen_rinci')
    ->select(DB::raw('CAST(IFNULL(sum(IFNULL(trx_asb_komponen_rinci.koefisien1,1)*IFNULL(trx_asb_komponen_rinci.koefisien2,1)*IFNULL(trx_asb_komponen_rinci.koefisien3,1)*ref_ssh_perkada_tarif.jml_rupiah),0) as DECIMAL(10,0)) as koef,"V1" as var'))
    ->join('trx_asb_komponen','trx_asb_komponen_rinci.id_komponen_asb','=','trx_asb_komponen.id_komponen_asb')
    ->join('trx_asb_aktivitas','trx_asb_komponen.id_aktivitas_asb','=','trx_asb_aktivitas.id_aktivitas_asb')
    ->join('ref_ssh_perkada_tarif','trx_asb_komponen_rinci.id_tarif_ssh','=','ref_ssh_perkada_tarif.id_tarif_ssh')
    ->where('trx_asb_komponen_rinci.jenis_biaya','=',3)
    ->where('trx_asb_aktivitas.id_aktivitas_asb','=',$akt)
    ->whereRaw('((`trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_2)
				or(`trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan1` = trx_asb_aktivitas.id_satuan_2)
				or (`trx_asb_komponen_rinci`.`id_satuan3` = trx_asb_aktivitas.id_satuan_1 and `trx_asb_komponen_rinci`.`id_satuan2` = trx_asb_aktivitas.id_satuan_2))
			')
			->groupBy('var')
			->get();
    
    $ASBKomponenRinci3 = DB::table('trx_asb_komponen_rinci')
    ->select(DB::raw('CAST(IFNULL(sum(IFNULL(trx_asb_komponen_rinci.koefisien1,1)*IFNULL(trx_asb_komponen_rinci.koefisien2,1)*IFNULL(trx_asb_komponen_rinci.koefisien3,1)*ref_ssh_perkada_tarif.jml_rupiah),0) as DECIMAL(10,0)) as koef,"V1" as var'))
    ->join('trx_asb_komponen','trx_asb_komponen_rinci.id_komponen_asb','=','trx_asb_komponen.id_komponen_asb')
    ->join('trx_asb_aktivitas','trx_asb_komponen.id_aktivitas_asb','=','trx_asb_aktivitas.id_aktivitas_asb')
    ->join('ref_ssh_perkada_tarif','trx_asb_komponen_rinci.id_tarif_ssh','=','ref_ssh_perkada_tarif.id_tarif_ssh')
    ->where('trx_asb_komponen_rinci.jenis_biaya','=',1)
    ->where('trx_asb_aktivitas.id_aktivitas_asb','=',$akt)
    ->groupBy('var')
	->get();
    
   
    //return count($ASBKomponenRinci2);
    PDF::SetFont('helvetica', 'B', 8);		
    
    PDF::Cell(array_sum($w), 0, '', 'T');
    PDF::Ln();
    PDF::Cell('153', '3', '', 0, 0, 'L', 0);
    PDF::Cell(30, 7, 'Rumus Umum ASB :', 0, 'R', 0, 0);
    PDF::Ln();
    
    if(count($ASBKomponenRinci1)==0)
    {
    	$rincikoef1=0;
   		$rincivar1=".V1";
    	
    }
    else 
    {
    	$rincikoef1=$ASBKomponenRinci1[0]->koef;
    	$rincivar1=".V1";
    }
    if(count($ASBKomponenRinci2)==0)
    {
    	$rincikoef2=0;
    	$rincivar2=".V2";
    	
    }
    else
    {
    	$rincikoef2=$ASBKomponenRinci2[0]->koef;
    	$rincivar2=".V2";
    }
    if(count($ASBKomponenRinci3)==0)
    {
    	$rincikoef3=0;
    	
    	
    }
    else
    {
    	$rincikoef3=$ASBKomponenRinci3[0]->koef;
    	
    }
    
    if(count($ASBKomponenRinci4)==0)
    {
    	$rincikoef4=0;
    	$rincivar4=".V1V2";
    }
    else
    {
    	$rincikoef4=$ASBKomponenRinci4[0]->koef;
    	$rincivar4=".V1V2";
    }
    
    PDF::Cell('83', '3', '', 0, 0, 'L', 0);
    PDF::Cell(80, 7, 'Y = '. number_format($rincikoef1, 2, ',', '.').''.$rincivar1.' + '.number_format($rincikoef2, 2, ',','.').$rincivar2.' + ' .number_format($rincikoef4, 2, ',', '.').''.$rincivar4.' + '.number_format($rincikoef3, 2, ',','.'), 0, 'R', 0, 0);
    PDF::Cell('20', '3', '', 0, 0, 'L', 0);
    PDF::Ln();
    $nilaiV1=$rincikoef1*$v1;
    $nilaiV2=$rincikoef2*$v2;
    $nilaiV1V2=$rincikoef4*$v1*$v2;
    $nilaiTotal=$nilaiV1+$nilaiV2+$nilaiV1V2+$rincikoef3;
    PDF::Cell('163', '3', '', 0, 0, 'L', 0);
    PDF::Cell(20, 7, 'Nilai ASB :', 0, 'R', 0, 0);
    PDF::Ln();
    
    PDF::Cell('83', '3', '', 0, 0, 'L', 0);
    PDF::Cell(100, 7, 'Y = '. number_format($nilaiV1, 2, ',', '.').' + '.number_format($nilaiV2, 2, ',','.').' + ' .number_format($nilaiV1V2, 2, ',', '.').' + '.number_format($rincikoef3, 2, ',','.').' = '.number_format($nilaiTotal, 2, ',','.'), 0, 'R', 0, 0);
    PDF::Ln();
    
    // ---------------------------------------------------------

    // close and output PDF document
    PDF::Output('ASBAktivitasKomponenRinci2.pdf', 'I');
  }

}
