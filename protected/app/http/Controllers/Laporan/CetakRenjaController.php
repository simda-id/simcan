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
use DB;
use App\Models\RefUnit;
use App\Models\TrxRenjaRancangan;
use App\Models\TrxRenjaRancanganProgram;
use App\Models\TrxRenjaRancanganProgramIndikator;
use App\Models\RefSshRekening;
use App\Models\RefRek5;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Services\DataTable;


class CetakRenjaController extends Controller
{

	public function KompilasiProgramdanPaguRenja($id_unit)
  {
		
  	$countrow=0;
  	$totalrow=18;
		if($id_unit<1)
		{$Unit = DB::select('select distinct a.nm_unit,a.id_unit from ref_unit a inner join
trx_renja_rancangan_program b
on a.id_unit=b.id_unit  ');}
		else 
		{$Unit = DB::select('select distinct a.nm_unit,a.id_unit from ref_unit a inner join
trx_renja_rancangan_program b
on a.id_unit=b.id_unit where a.id_unit='.$id_unit);}
		

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
    PDF::SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);

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
    PDF::AddPage('L');

    // column titles
    $header = array('SKPD/Program','Uraian Indikator','Tolak Ukur','Target Renstra','Target Renja','Status Indikator','Pagu Renstra','Pagu Program','Status Program');

    // Colors, line width and bold font
    PDF::SetFillColor(200, 200, 200);
    PDF::SetTextColor(0);
    PDF::SetDrawColor(255, 255, 255);
    PDF::SetLineWidth(0);
    PDF::SetFont('helvetica', 'B', 10);

    //Header
    PDF::Cell('225', 5, 'PEMERINTAH DAERAH KABUPATEN PURWOREJO', 1, 0, 'C', 0);
    PDF::Ln();
    $countrow++;
    PDF::Cell('225', 5, 'KOMPILASI PROGRAM RENJA', 1, 0, 'C', 0);
    PDF::Ln();
    $countrow++;
    PDF::SetFont('', 'B');
    PDF::SetFont('helvetica', 'B', 6);
    
    // Header Column
    
    $wh = array(45,30,30,20,20,20,20,20,20);
    $w = array(225);
    $w1 = array(5,40,120,20,20,20);
    $w2 = array(45,30,30,20,20,20,60);
    
    $num_headers = count($header);
    for($i = 0; $i < $num_headers; ++$i) {
            PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
    }
    PDF::Ln();
    $countrow++;
        // Color and font restoration

    PDF::SetFillColor(224, 235, 255);
    PDF::SetTextColor(0);
    PDF::SetFont('helvetica', '', 6);
        // Data
    $fill = 0;
    foreach($Unit as $row) {
    	PDF::MultiCell($w[0], 10, $row->nm_unit, 0, 'L', 0, 0);
    	PDF::Ln();
    	$countrow++;
    	if($countrow>=$totalrow)
    	{
    		PDF::AddPage('L');
    		$countrow=0;
    		for($i = 0; $i < $num_headers; ++$i) {
    			PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
    		}
    		PDF::Ln();
    		$countrow++;
    	}
    	//$fill=!$fill;
    	$program = DB::select('SELECT c.nm_unit,d.uraian_program_renstra,d.id_renja_program,
sum(d.pagu_tahun_kegiatan) as pagu_program,
sum(d.pagu_tahun_renstra) as pagu_renstra,
case a.status_data when 1 then "Telah direview" else "Belum direview" end as status_program
from trx_renja_rancangan_program a
inner JOIN trx_renja_rancangan d
on a.id_renja_program=d.id_renja_program
inner join ref_unit c
on a.id_unit=c.id_unit
where c.id_unit='.$row->id_unit.'
group by c.nm_unit,d.uraian_program_renstra,d.id_renja_program,a.status_data');
    	foreach($program as $row2) {
    		PDF::MultiCell($w1[0], 10, '', 0, 'L', 0, 0);
    		PDF::MultiCell($w1[1], 10, $row2->uraian_program_renstra, 0, 'L', 0, 0);
    		PDF::MultiCell($w1[2], 10, '', 0, 'L', 0, 0);
    		PDF::MultiCell($w1[3], 10, number_format($row2->pagu_renstra,2,',','.'), 0, 'L', 0, 0);
    		PDF::MultiCell($w1[4], 10, number_format($row2->pagu_program,2,',','.'), 0, 'L', 0, 0);
    		PDF::MultiCell($w1[5], 10, $row2->status_program, 0, 'L', 0, 0);
    		PDF::Ln();
    		$countrow++;
    		if($countrow>=$totalrow)
    		{
    			PDF::AddPage('L');
    			$countrow=0;
    			for($i = 0; $i < $num_headers; ++$i) {
    				PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
    			}
    			PDF::Ln();
    			$countrow++;
    		}
    		$indikator = DB::select('select c.nm_unit,a.uraian_program_renstra,b.uraian_indikator_program_renja,b.tolok_ukur_indikator,
b.target_renstra,b.target_renja,case b.status_data when 1 then "Telah direview" else "Belum direview" end as status_indikator
from trx_renja_rancangan_program a
INNER JOIN trx_renja_rancangan_program_indikator b
on a.id_renja_program=b.id_renja_program
inner join ref_unit c
on a.id_unit=c.id_unit
where c.id_unit='. $row->id_unit .' and a.id_renja_program='. $row2->id_renja_program);
    		
			foreach($indikator as $row3) {
    			PDF::MultiCell($w2[0], 10, '', 0, 'L', 0, 0);
    			PDF::MultiCell($w2[1], 10, $row3->uraian_indikator_program_renja, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[2], 10, $row3->tolok_ukur_indikator, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[3], 10, $row3->target_renstra, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[4], 10, $row3->target_renja, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[5], 10, $row3->status_indikator, 0, 'L', 0, 0);
    			PDF::MultiCell($w2[6], 10, '', 0, 'L', 0, 0);
    			PDF::Ln();
    			$countrow++;
    			if($countrow>=$totalrow)
    			{
    				PDF::AddPage('L');
    				$countrow=0;
    				for($i = 0; $i < $num_headers; ++$i) {
    					PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
    				}
    				PDF::Ln();
    				$countrow++;
    			}
    			//$fill=!$fill;
    		}
    		//$fill=!$fill;
    	}
        }
    PDF::Cell(array_sum($w), 0, '', 'T');

    // ---------------------------------------------------------

    // close and output PDF document
    PDF::Output('KompilasiRenja.pdf', 'I');
  }

  public function KompilasiKegiatandanPaguRenja($id_unit)
  {
  	
  	$countrow=0;
  	$totalrow=18;
  	if($id_unit<1)
  	{$Unit = DB::select('select distinct a.nm_unit,a.id_unit from ref_unit a inner join
trx_renja_rancangan_program b
on a.id_unit=b.id_unit  ');}
  	else
  	{$Unit = DB::select('select distinct a.nm_unit,a.id_unit from ref_unit a inner join
trx_renja_rancangan_program b
on a.id_unit=b.id_unit where b.id_unit='.$id_unit);}
  	
  	
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
  	PDF::SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
  	
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
  	PDF::AddPage('L');
  	
  	// column titles
  	$header = array('SKPD/Program/Kegiatan','Uraian Indikator','Tolak Ukur','Target Renstra','Target Renja','Status Indikator','Pagu Renstra Program/Kegiatan','Pagu Program/Kegiatan','Status Program/Kegiatan');
  	
  	// Colors, line width and bold font
  	PDF::SetFillColor(200, 200, 200);
  	PDF::SetTextColor(0);
  	PDF::SetDrawColor(255, 255, 255);
  	PDF::SetLineWidth(0);
  	PDF::SetFont('helvetica', 'B', 10);
  	
  	//Header
  	PDF::Cell('245', 5, 'PEMERINTAH DAERAH KABUPATEN PURWOREJO', 1, 0, 'C', 0);
  	PDF::Ln();
  	$countrow++;
  	PDF::Cell('245', 5, 'KOMPILASI KEGIATAN RENJA', 1, 0, 'C', 0);
  	PDF::Ln();
  	$countrow++;
  	PDF::SetFont('', 'B');
  	PDF::SetFont('helvetica', 'B', 6);
  	
  	// Header Column
  	
  	$wh = array(50,30,30,20,20,20,25,25,25);
  	$w = array(245);
  	$w1 = array(5,165,25,25,25);
  	$w2 = array(10,160,25,25,25);
  	$w3 = array(50,30,30,20,20,20,75);
  	$num_headers = count($header);
  	for($i = 0; $i < $num_headers; ++$i) {
  		//PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
  		PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
  	}
  	PDF::Ln();
  	$countrow++;
  	// Color and font restoration
  	
  	PDF::SetFillColor(224, 235, 255);
  	PDF::SetTextColor(0);
  	PDF::SetFont('helvetica', '', 6);
  	// Data
  	$fill = 0;
  	foreach($Unit as $row) {
  		PDF::SetFont('helvetica', 'B', 6);
  		PDF::MultiCell($w[0], 7, $row->nm_unit, 0, 'L', 0, 0);
  		PDF::Ln();
  		$countrow++;
  		if($countrow>=$totalrow)
  		{
  			PDF::AddPage('L');
  			$countrow=0;
  			for($i = 0; $i < $num_headers; ++$i) {
  				PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
  			}
  			PDF::Ln();
  			$countrow++;
  		}
  		//$fill=!$fill;
  		$program = DB::select('SELECT c.nm_unit,d.uraian_program_renstra,d.id_renja_program,
sum(d.pagu_tahun_kegiatan) as pagu_program,
sum(d.pagu_tahun_renstra) as pagu_renstra,
case a.status_data when 1 then "Telah direview" else "Belum direview" end as status_program
from trx_renja_rancangan_program a
inner JOIN trx_renja_rancangan d
on a.id_renja_program=d.id_renja_program
inner join ref_unit c
on a.id_unit=c.id_unit
where c.id_unit='.$row->id_unit.'
group by c.nm_unit,d.uraian_program_renstra,d.id_renja_program,a.status_data');
  		foreach($program as $row2) {
  			PDF::SetFont('helvetica', 'B', 6);
  			PDF::MultiCell($w1[0], 7, '', 0, 'L', 0, 0);
  			PDF::MultiCell($w1[1], 7, $row2->uraian_program_renstra, 0, 'L', 0, 0);
  			PDF::MultiCell($w1[2], 7, number_format($row2->pagu_renstra,2,',','.'), 0, 'L', 0, 0);
  			PDF::MultiCell($w1[3], 7, number_format($row2->pagu_program,2,',','.'), 0, 'L', 0, 0);
  			PDF::MultiCell($w1[4], 7, $row2->status_program, 0, 'L', 0, 0);
  			
  			PDF::Ln();
  			$countrow++;
  			if($countrow>=$totalrow)
  			{
  				PDF::AddPage('L');
  				$countrow=0;
  				for($i = 0; $i < $num_headers; ++$i) {
  					PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
  				}
  				PDF::Ln();
  				$countrow++;
  			}
  			$kegiatan = DB::select('select  a.id_renja_program,b.id_renja,a.uraian_program_renstra,b.uraian_kegiatan_renstra,
sum(b.pagu_tahun_kegiatan) as pagu_kegiatan,
sum(b.pagu_tahun_renstra) as pagu_renstra,
case b.status_data when 1 then "Telah direview" else "Belum direview" end as status_kegiatan
 from trx_renja_rancangan_program a
inner join trx_renja_rancangan b
on a.id_renja_program=b.id_renja_program
where b.id_unit='. $row->id_unit .' and a.id_renja_program='. $row2->id_renja_program
.' group by a.id_renja_program,b.id_renja,a.uraian_program_renstra,b.uraian_kegiatan_renstra,b.status_data');
  			
  			foreach($kegiatan as $row3) {
  				PDF::SetFont('helvetica', '', 6);
  				PDF::MultiCell($w2[0], 7, '', 0, 'L', 0, 0);
  				PDF::MultiCell($w2[1], 7, $row3->uraian_kegiatan_renstra, 0, 'L', 0, 0);
  				PDF::MultiCell($w2[2], 7, number_format($row3->pagu_renstra,2,',','.'), 0, 'L', 0, 0);
  				PDF::MultiCell($w2[3], 7, number_format($row3->pagu_kegiatan,2,',','.'), 0, 'L', 0, 0);
  				PDF::MultiCell($w2[4], 7, $row3->status_kegiatan, 0, 'L', 0, 0);
  				
  				
  				PDF::Ln();
  				$countrow++;
  				if($countrow>=$totalrow)
  				{
  					PDF::AddPage('L');
  					$countrow=0;
  					for($i = 0; $i < $num_headers; ++$i) {
  						PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
  					}
  					PDF::Ln();
  					$countrow++;
  				}
  				$indikator = DB::select('select  distinct d.uraian_kegiatan_renstra,b.uraian_indikator_kegiatan_renja,
b.tolok_ukur_indikator,b.angka_renstra,b.angka_tahun,
case b.status_data when 1 then "Telah direview" else "Belum direview" end as status_indikator
from  trx_renja_rancangan d
inner JOIN trx_renja_rancangan_indikator b
on d.id_renja=b.id_renja
where d.id_unit='. $row->id_unit .' and d.id_renja_program='. $row2->id_renja_program.' and d.id_renja='.$row3->id_renja);
  				
  				foreach($indikator as $row4) {
  					PDF::SetFont('helvetica', '', 6);
  					PDF::MultiCell($w3[0], 10, '', 0, 'L', 0, 0);
  					PDF::MultiCell($w3[1], 10, $row4->uraian_indikator_kegiatan_renja, 0, 'L', 0, 0);
  					PDF::MultiCell($w3[2], 10, $row4->tolok_ukur_indikator, 0, 'L', 0, 0);
  					PDF::MultiCell($w3[3], 10, $row4->angka_renstra, 0, 'L', 0, 0);
  					PDF::MultiCell($w3[4], 10, $row4->angka_tahun, 0, 'L', 0, 0);
  					PDF::MultiCell($w3[5], 10, $row4->status_indikator, 0, 'L', 0, 0);
  					PDF::MultiCell($w3[6], 10, '', 0, 'L', 0, 0);
  					PDF::Ln();
  					$countrow++;
  					if($countrow>=$totalrow)
  					{
  						PDF::AddPage('L');
  						$countrow=0;
  						for($i = 0; $i < $num_headers; ++$i) {
  							PDF::MultiCell($wh[$i], 10, $header[$i], 0, 'C', 1, 0);
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
  	PDF::Output('KompilasiKegRenja.pdf', 'I');
  }
  
  
}

/*
 * route
 * Route::get('/PrintKompilasiProgramdanPaguRenja/{id_unit}','Laporan\CetakRenjaController@KompilasiProgramdanPaguRenja');
Route::get('/PrintKompilasiKegiatandanPaguRenja/{id_unit}','Laporan\CetakRenjaController@KompilasiKegiatandanPaguRenja');

 * 
 * 
 * JS
 * $(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {

    location.replace('../PrintKompilasiProgramdanPaguRenja/'+ $('#id_unit').val());
    
  });
$(document).on('click', '.btnPrintKompilasiKegiatandanPaguRenja', function() {

    location.replace('../PrintKompilasiKegiatandanPaguRenja/'+ $('#id_unit').val());
    
  });

 *
 *
 *
 *VIEW
 *  <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun Renstra :</label>
                        <div class="col-sm-5">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                <div class="printPrintKompilasiProgramdanPagu">
              <p><a class="btnPrintKompilasiProgramdanPagu btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Kompilasi Program dan Pagu</a></p>
            </div>
            <div class="PrintKompilasiKegiatandanPaguRenja">
              <p><a class="btnPrintKompilasiKegiatandanPaguRenja btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Kompilasi Kegiatan dan Pagu</a></p>
            </div>
            
                </form>
 
 
 * /
 */

