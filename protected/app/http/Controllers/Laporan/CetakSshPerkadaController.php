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
use App\Models\RefSshTarif;
use App\Models\RefSshRekening;
use App\Models\RefSshPerkada;
use App\Models\RefRek5;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Services\DataTable;


class CetakSshPerkadaController extends Controller
{
	
	public function printSshPerkada()
	{
		$sshperkada = RefSshPerkada::select('id_perkada','nomor_perkada','tanggal_perkada','tahun_berlaku','uraian_perkada','flag')
		->get();
		
		// set document information
		PDF::SetCreator('BPKP');
		PDF::SetAuthor('BPKP');
		PDF::SetTitle('Simd@Perencanaan');
		PDF::SetSubject('SSH Perkada');
		
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
		PDF::AddPage();
		
		// column titles
		$header = array('No.','Nomor Perkada','Tanggal Perkada','Berlaku', 'Status');
		
		// Colors, line width and bold font
		PDF::SetFillColor(200, 200, 200);
		PDF::SetTextColor(0);
		PDF::SetDrawColor(255, 255, 255);
		PDF::SetLineWidth(0.1);
		PDF::SetFont('helvetica', 'B', 10);
		
		//Header
		PDF::Cell('150', 5, 'PEMERINTAH DAERAH SIMULASI', 1, 0, 'C', 0);
		PDF::Ln();
		PDF::Cell('150', 5, 'STANDAR SATUAN HARGA PERKADA', 1, 0, 'C', 0);
		PDF::Ln();
		PDF::SetFont('', 'B');
		PDF::SetFont('helvetica', 'B', 6);
		PDF::SetDrawColor(0, 0, 0);
		PDF::SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(0, 0, 0)));
		// Header Column
		$w = array(10,30,50,20,50);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			PDF::Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		PDF::Ln();
		// Color and font restoration
		
		PDF::SetFillColor(224, 235, 255);
		PDF::SetTextColor(0);
		PDF::SetFont('helvetica', '', 6);
		// Data
		$fill = 0;
		foreach($sshperkada as $row) {
			PDF::Cell($w[0], 6, $row->id_perkada, 1, 0, 'C', $fill);
			PDF::Cell($w[1], 6, $row->nomor_perkada, 1, 0, 'L', $fill);
			PDF::Cell($w[2], 6, $row->tanggal_perkada, 1, 0, 'L', $fill);
			PDF::Cell($w[3], 6, $row->tahun_berlaku, 1, 0, 'L', $fill);
			PDF::Cell($w[4], 6, $row->uraian_perkada, 1, 0, 'L', $fill);
			PDF::Ln();
			
		}
		PDF::Cell(array_sum($w), 0, '', 'T');
		
		// ---------------------------------------------------------
		
		// close and output PDF document
		PDF::Output('PerkadaSSH.pdf', 'I');
	}
	
}
