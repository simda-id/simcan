<?php
namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use Excel;
use PHPExcel_IOFactory;
use DB;
use Response;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Services\DataTable;
use App\Models\RefPemda;
use App\Models\RefUnit;
use App\Models\RefIndikator;
use App\Models\RefUrusan;
use App\Models\RefBidang;
use App\Models\TrxRpjmdDokumen;
use App\Models\TrxRpjmdVisi;
use App\Models\TrxRpjmdMisi;
use App\Models\TrxRpjmdTujuan;
use App\Models\TrxRpjmdSasaran;
use App\Models\TrxRpjmdKebijakan;
use App\Models\TrxRpjmdStrategi;
use App\Models\TrxRpjmdProgram;
use App\Models\TrxRpjmdProgramIndikator;
use App\Models\TrxRpjmdProgramUrusan;
use App\Models\TrxRpjmdProgramPelaksana;

class CetakRpjmdController extends Controller
{
	public function index()
	{
		
		$dataperdarpjmd=TrxRpjmdDokumen::select('id_rpjmd','thn_dasar','tahun_1','tahun_2','tahun_3','tahun_4','tahun_5','no_perda','tgl_perda','id_revisi','id_status_dokumen')
		->where('id_status_dokumen','=','1')
		->get();
		
		return view('rpjmd.index')->with(compact('dataperdarpjmd'));
		
	}
	
public function perumusanAKPembangunan(){
	
	
	Excel::create('PerumusanAKPembangunan', function($excel) {
		// Set the title
		$excel->setTitle('Perumusan Arah Kebijakan Pembangunan');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Perumusan Arah Kebijakan Pembangunan');
		
		$excel->sheet('sheet1', function($sheet) {
			
			
			
			$RPJMDVisi=DB::select('SELECT a.no_urut as no_visi,
a.uraian_visi_rpjmd,
b.no_urut AS no_misi,
b.uraian_misi_rpjmd,
c.no_urut AS no_tujuan,
c.uraian_tujuan_rpjmd,
d.no_urut AS no_sasaran,
d.uraian_sasaran_rpjmd,
e.no_urut AS no_kebijakan,
e.uraian_kebijakan_rpjmd,
f.no_urut AS no_strategi,
f.uraian_strategi_rpjmd,
CONCAT(a.no_urut, ".",b.no_urut) AS no_gab_misi,
CONCAT(a.no_urut, ".",b.no_urut, ".", c.no_urut) AS no_gab_tujuan,
CONCAT(a.no_urut, ".",b.no_urut,".",c.no_urut,".",d.no_urut) AS no_gab_sasaran,
CONCAT(a.no_urut, ".",b.no_urut,".",c.no_urut,".",d.no_urut,".",e.no_urut) AS no_gab_kebijakan,
CONCAT(a.no_urut, ".",b.no_urut,".",c.no_urut,".",d.no_urut,".",f.no_urut) AS no_gab_strategi
FROM trx_rpjmd_visi a
inner join trx_rpjmd_misi b
on a.id_visi_rpjmd=b.id_visi_rpjmd
inner join trx_rpjmd_tujuan c
on b.id_misi_rpjmd=c.id_misi_rpjmd
inner join trx_rpjmd_sasaran d
on c.id_tujuan_rpjmd=d.id_tujuan_rpjmd
LEFT OUTER JOIN  trx_rpjmd_kebijakan e
on d.id_sasaran_rpjmd=e.id_sasaran_rpjmd
LEFT OUTER JOIN trx_rpjmd_strategi f
on d.id_sasaran_rpjmd=f.id_sasaran_rpjmd');
	foreach($RPJMDVisi as $row) {
		
		$data[] = array(
				$row->no_gab_tujuan,
				$row->uraian_tujuan_rpjmd,
				$row->no_gab_sasaran,
				$row->uraian_sasaran_rpjmd,
				$row->no_gab_kebijakan,
				$row->uraian_kebijakan_rpjmd,
				$row->no_gab_strategi,
				$row->uraian_strategi_rpjmd,
		);
		
	}
	
	$sheet->prependRow(3, array(
			'Pemerintah Kabupaten Purworejo'
	));
	$sheet->prependRow(4, array(
			'Perumusan Arah Kebijakan Pembangunan'
	));
	$sheet->prependRow(6, array(
			'Tujuan','','Sasaran', '','Arah Kebjakan','','Strategi',''
	));
	$sheet->fromArray($data, null, 'A7', false, false);
	$sheet->cells('A6:H6', function($cells) {
		$cells->setBackground('#AAAAFF');
		
	});
		$sheet->cells('A3:H4', function($cells) {
			$cells->setFont(array(
					'family'     => 'Calibri',
					'size'       => '16',
					'bold'       =>  true
			));
		});
			$sheet->getStyle('B1:B' . $sheet->getHighestRow())
			->getAlignment()->setWrapText(true);
			$sheet->getStyle('D1:D' . $sheet->getHighestRow())
			->getAlignment()->setWrapText(true);
			$sheet->getStyle('F1:F' . $sheet->getHighestRow())
			->getAlignment()->setWrapText(true);
			$sheet->getStyle('H1:H' . $sheet->getHighestRow())
			->getAlignment()->setWrapText(true);
			
			
			$sheet->setAutoSize(false);
			$sheet->setAutoSize(array(
					'B','D','F','H'
			));
			$sheet->mergeCells('A3:H3');
			$sheet->mergeCells('A4:H4');
			$sheet->mergeCells('A6:B6');
			$sheet->mergeCells('C6:D6');
			$sheet->mergeCells('E6:F6');
			$sheet->mergeCells('G6:H6');
			$sheet->cells('A3:H6', function($cells) {
				$cells->setAlignment('center');
			});
				$sheet->cells('A7:H10000', function($cells) {
					$cells->setValignment('top');
				});
					
					$sheet->setWidth('A', 10);
					$sheet->setWidth('B', 60);
					$sheet->setWidth('C', 10);
					$sheet->setWidth('D', 60);
					$sheet->setWidth('E', 10);
					$sheet->setWidth('F', 60);
					$sheet->setWidth('G', 10);
					$sheet->setWidth('H', 60);
					$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
						$protection->setSort(true);
						$protection->setSheet(true);
					});
		});
	})->export('xlsx');
	return index();
}

public function perumusanProgramPrioritasPemda(){
	
	
	Excel::create('PerumusanProgramPrioritasPemda', function($excel) {
		// Set the title
		$excel->setTitle('Perumusan Program Prioritas Pemerintah Daerah');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Perumusan Program Prioritas Pemerintah Daerah');
		
		$excel->sheet('sheet1', function($sheet) {
			
			$sheet->setColumnFormat(array(
					'E' => '0.00',
					'F' => '0.00',
					'G' => '0.00',
					'H' => '0.00',
					'I' => '0.00',
			));
			
			$RPJMDProgram= DB::select('select DISTINCT uraian_strategi_rpjmd, uraian_kebijakan_rpjmd,
uraian_program_rpjmd,uraian_indikator_program_rpjmd,
pagu_tahun1,pagu_tahun2,pagu_tahun3,pagu_tahun4,
pagu_tahun5
from trx_rpjmd_sasaran a
INNER join trx_rpjmd_kebijakan b
on a.id_sasaran_rpjmd=b.id_kebijakan_rpjmd
INNER JOIN trx_rpjmd_strategi c
on a.id_sasaran_rpjmd=c.id_sasaran_rpjmd
INNER JOIN trx_rpjmd_program d
on a.id_sasaran_rpjmd=d.id_sasaran_rpjmd
INNER JOIN trx_rpjmd_program_indikator e
on d.id_program_rpjmd=e.id_program_rpjmd');
			foreach($RPJMDProgram as $row) {
				
				$data[] = array(
						$row->uraian_strategi_rpjmd,
						$row->uraian_kebijakan_rpjmd,
						$row->uraian_program_rpjmd,
						$row->uraian_indikator_program_rpjmd,
						number_format($row->pagu_tahun1,2,',','.'),
						number_format($row->pagu_tahun2,2,',','.'),
						number_format($row->pagu_tahun3,2,',','.'),
						number_format($row->pagu_tahun4,2,',','.'),
						number_format($row->pagu_tahun5,2,',','.'),
						
				);
			}
			$sheet->prependRow(4, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(5, array(
					'Perumusan Program Prioritas Pemerintah Daerah'
			));
			$sheet->prependRow(7, array(
					'Strategi','Kebijakan Umum','Program Pembangunan Daerah', 'Indikator Kinerja','Tahun1','Tahun2','Tahun3','Tahun4','Tahun5'
			));
			$sheet->fromArray($data, null, 'A8', false, false);
			$sheet->cells('A7:I7', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('A8:A' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				$sheet->getStyle('B8:B' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				$sheet->getStyle('C8:C' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				$sheet->getStyle('D8:D' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				$sheet->setAutoSize(false);
				$sheet->setAutoSize(array(
						'A','B','C','D'
				));
				
				$sheet->cells('A4:H5', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A4:H7', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A4:H4');
						$sheet->mergeCells('A5:H5');
						
						$sheet->cells('A4:I7', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A8:I10000', function($cells) {
								$cells->setValignment('top');
							});
								
								$sheet->setWidth('A', 50);
								$sheet->setWidth('B', 50);
								$sheet->setWidth('C', 50);
								$sheet->setWidth('D', 50);
								$sheet->setWidth('E', 20);
								$sheet->setWidth('F', 20);
								$sheet->setWidth('G', 20);
								$sheet->setWidth('H', 20);
								$sheet->setWidth('I', 20);
								$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
									$protection->setSort(true);
									$protection->setSheet(true);
								});
		});
	})->export('xlsx');
	return index();
}

public function ProyeksiPendapatan(){
	
	
	Excel::create('ProyeksiPendapatanPemda', function($excel) {
		// Set the title
		$excel->setTitle('Proyeksi Pendapatan Pemerintah Daerah');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Proyeksi Pendapatan Pemerintah Daerah');
		
		$excel->sheet('sheet1', function($sheet) {
			
			
			$RKPDTujuanSasaran= DB::select('select d.no_urut as no_tujuan,c.no_urut as no_sasaran,c.id_sasaran_rpjmd,c.uraian_sasaran_rpjmd
from trx_rpjmd_sasaran c
inner join trx_rpjmd_tujuan d
on c.id_tujuan_rpjmd=d.id_tujuan_rpjmd
INNER JOIN trx_rpjmd_misi e
on d.id_misi_rpjmd=e.id_misi_rpjmd
where e.no_urut=98
union ALL
select d.no_urut as no_tujuan,c.no_urut as no_misi,c.id_sasaran_rpjmd,uraian_sasaran_rpjmd from trx_rpjmd_sasaran c
inner join trx_rpjmd_tujuan d
on c.id_tujuan_rpjmd=d.id_tujuan_rpjmd
INNER JOIN trx_rpjmd_misi e
on d.id_misi_rpjmd=e.id_misi_rpjmd
where e.no_urut=99
union ALL
select d.no_urut as no_tujuan,c.no_urut as no_misi,c.id_sasaran_rpjmd,uraian_sasaran_rpjmd from trx_rpjmd_sasaran c
inner join trx_rpjmd_tujuan d
on c.id_tujuan_rpjmd=d.id_tujuan_rpjmd
INNER JOIN trx_rpjmd_misi e
on d.id_misi_rpjmd=e.id_misi_rpjmd
where e.no_urut not in (98,99)');
			foreach($RKPDTujuanSasaran as $row) {
				$data[] = array(
						$row->no_tujuan.'.'.$row->no_sasaran,
						$row->uraian_sasaran_rpjmd,
				);
				
				$RKPDProgram= DB::select('select a.no_urut as no_program,a.uraian_program_rpjmd,0 as nmin3,0 as nmin2,0 as nmin1, pagu_ranwal,
case g.tahun_5-a.tahun_rkpd
when 4 then b.pagu_tahun2
when 3 then b.pagu_tahun3
when 2 then b.pagu_tahun4
when 1 then b.pagu_tahun5
end as pagu_n1
 from trx_rkpd_ranwal a
inner join trx_rpjmd_program b
on a.id_program_rpjmd = b.id_program_rpjmd
inner join trx_rpjmd_sasaran c
on b.id_sasaran_rpjmd=c.id_sasaran_rpjmd
inner join trx_rpjmd_tujuan d
on c.id_tujuan_rpjmd=d.id_tujuan_rpjmd
INNER JOIN trx_rpjmd_misi e
on d.id_misi_rpjmd=e.id_misi_rpjmd
inner join trx_rpjmd_visi f
on e.id_visi_rpjmd=f.id_visi_rpjmd
inner join trx_rpjmd_dokumen g
on f.id_rpjmd=g.id_rpjmd
where c.id_sasaran_rpjmd = '.$row->id_sasaran_rpjmd.'
');
				foreach($RKPDProgram as $row2) {
					
					$data[] = array(
							$row->no_tujuan.'.'.$row->no_sasaran.'.'.$row2->no_program,
							'',
							$row2->uraian_program_rpjmd,
							number_format($row2->nmin3,2,',','.'),
							number_format($row2->nmin2,2,',','.'),
							number_format($row2->nmin1,2,',','.'),
							number_format($row2->pagu_ranwal,2,',','.'),
							number_format($row2->pagu_n1,2,',','.'),
					);
					
				}
			}
			$sheet->prependRow(2, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(3, array(
					'Realisasi dan Proyeksi/Target Pendapatan Pemerintah Daerah'
			));
			$sheet->prependRow(5, array(
					'No','Uraian','','Jumlah','','','',''));
			$sheet->prependRow(6, array(
					'','','','Realisasi Tahun (n-3)','Realisasi Tahun (n-2)', 'Tahun Berjalan (n-1)','Proyeksi/Target Tahun Rencana (n)','Proyeksi/Target Tahun Rencana (n)'));
			
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A5:H6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('C7:C' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				$sheet->getStyle('D6:H6' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				$sheet->cells('A2:H3', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A2:H6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A2:H2');
						$sheet->mergeCells('A3:H3');
						$sheet->mergeCells('A5:A6');
						$sheet->mergeCells('B5:C6');
						$sheet->mergeCells('D5:H5');
						
						
						$sheet->cells('A2:H6', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A5:H6', function($cells) {
								$cells->setValignment('center');
							});
								$sheet->cells('A7:H10000', function($cells) {
									$cells->setValignment('top');
								});
									
									$sheet->setWidth('A', 20);
									$sheet->setWidth('B', 3);
									$sheet->setWidth('C', 50);
									$sheet->setWidth('D', 20);
									$sheet->setWidth('E', 20);
									$sheet->setWidth('F', 20);
									$sheet->setWidth('G', 20);
									$sheet->setWidth('H', 20);
									
									$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
										$protection->setSort(true);
										$protection->setSheet(true);
									});
		});
	})->export('xlsx');
	return index();
}

public function KompilasiProgramdanPagu(){
	
	
	Excel::create('KompilasiProgramdanPaguSKPD', function($excel) {
		// Set the title
		$excel->setTitle('Kompilasi Program dan Pagu SKPD');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Kompilasi Program dan Pagu SKPD');
		
		$excel->sheet('sheet1', function($sheet) {
			
			
			$RKPDSKPD= DB::select('select DISTINCT e.id_unit,e.nm_unit,sum(a.total_pagu) as sub_total
				from trx_rpjmd_program a
				inner join trx_rpjmd_program_urusan b
				on a.id_program_rpjmd=b.id_program_rpjmd
				inner join trx_rpjmd_program_indikator c
				on a.id_program_rpjmd=c.id_program_rpjmd
				inner join trx_rpjmd_program_pelaksana d
				on b.id_urbid_rpjmd=d.id_urbid_rpjmd
				inner join ref_unit e
				on d.id_unit=e.id_unit
				Group By e.id_unit,e.nm_unit
				');
			$i=1;
			$prog=0;
			$strProg='';
			$pagu=0;
			
			foreach($RKPDSKPD as $row) {
				
				$RKPDProgram= DB::select('select DISTINCT a.id_program_rpjmd,a.uraian_program_rpjmd,a.total_pagu
				from trx_rpjmd_program a
				inner join trx_rpjmd_program_urusan b
				on a.id_program_rpjmd=b.id_program_rpjmd
				inner join trx_rpjmd_program_indikator c
				on a.id_program_rpjmd=c.id_program_rpjmd
				inner join trx_rpjmd_program_pelaksana d
				on b.id_urbid_rpjmd=d.id_urbid_rpjmd
				inner join ref_unit e
				on d.id_unit=e.id_unit
				where e.id_unit = '.$row->id_unit);
				$data[] = array(
						$i,
						$row->nm_unit,
						'',
						'',
						'',
						number_format($row->sub_total,2,',','.'),
						
				);
				
				
				
				foreach($RKPDProgram as $row2) {
					$RKPDIndikator= DB::select('select DISTINCT c.id_indikator, c.uraian_indikator_program_rpjmd,c.tolok_ukur_indikator
					from trx_rpjmd_program a
					inner join trx_rpjmd_program_urusan b
					on a.id_program_rpjmd=b.id_program_rpjmd
					inner join trx_rpjmd_program_indikator c
					on a.id_program_rpjmd=c.id_program_rpjmd
					inner join trx_rpjmd_program_pelaksana d
					on b.id_urbid_rpjmd=d.id_urbid_rpjmd
					inner join ref_unit e
					on d.id_unit=e.id_unit
					where a.id_program_rpjmd = '.$row2->id_program_rpjmd.' and e.id_unit = '.$row->id_unit  );
					
					$prog=0;
					
					foreach($RKPDIndikator as $row3) {
						
						$strProg='';
						$pagu=0;
						
						if($prog<1)
						{
							$strProg=$row2->uraian_program_rpjmd;
							$pagu=number_format($row2->total_pagu,2,',','.');
							
						}
						
						$data[] = array(
								'',
								'',
								$strProg,
								$row3->uraian_indikator_program_rpjmd,
								$row3->tolok_ukur_indikator,
								$pagu,
								
						);
						
						
						$prog++;
					}
				}
				$i++;
			}
			
			$sheet->prependRow(2, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(3, array(
					'Kompilasi Program dan Pagu Indikatif Tiap SKPD'
			));
			$sheet->prependRow(5, array(
					'No','SKPD','Program','Kinerja','','Pagu Indikatif'));
			$sheet->prependRow(6, array(
					'','','','Indikator','Target', ''));
			
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A5:F6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('B7:E' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				$sheet->cells('A2:F3', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A2:F6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A2:F2');
						$sheet->mergeCells('A3:F3');
						$sheet->mergeCells('A5:A6');
						$sheet->mergeCells('B5:B6');
						$sheet->mergeCells('C5:C6');
						$sheet->mergeCells('D5:E5');
						$sheet->mergeCells('F5:F6');
						
						$sheet->cells('A2:F6', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A5:F6', function($cells) {
								$cells->setValignment('center');
							});
								$sheet->cells('A7:F10000', function($cells) {
									$cells->setValignment('top');
								});
									$sheet->setBorder('A5:F10000', 'thin');
									$sheet->setFreeze('A7');
									
									$sheet->setWidth('A', 3);
									$sheet->setWidth('B', 30);
									$sheet->setWidth('C', 30);
									$sheet->setWidth('D', 30);
									$sheet->setWidth('E', 30);
									$sheet->setWidth('F', 20);
									
									$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
										$protection->setSort(true);
										$protection->setSheet(true);
									});
		});
	})->export('xlsx');
	return index();
}

public function ReviewRanwalRKPD(){
	
	
	Excel::create('ReviewRanwalRKPD', function($excel) {
		// Set the title
		$excel->setTitle('Review Rancangan Awal RKPD');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Review Rancangan Awal RKPD');
		
		$excel->sheet('sheet1', function($sheet) {
			
			$tahun='2018';
			$skpd=19;
			
			$i=1;
			$prog=0;
			$strProg='';
			$pagu=0;
			$thn='';
			$unit='';
			
			
			$RKPDProgram= DB::select('select DISTINCT a.id_rkpd_ranwal,a.uraian_program_rpjmd,a.pagu_ranwal
from trx_rkpd_ranwal a
inner join trx_rkpd_ranwal_urusan b
on a.id_rkpd_ranwal=b.id_rkpd_ranwal and a.tahun_rkpd=b.tahun_rkpd
inner join trx_rkpd_ranwal_indikator c
on a.id_rkpd_ranwal=c.id_rkpd_ranwal and a.tahun_rkpd=c.tahun_rkpd
inner join trx_rkpd_ranwal_pelaksana d
on a.id_rkpd_ranwal=d.id_rkpd_ranwal and a.tahun_rkpd=d.tahun_rkpd
inner join ref_unit e
on d.id_unit=e.id_unit
where e.id_unit = '.$skpd.' and a.tahun_rkpd= '.$tahun);
			
			foreach($RKPDProgram as $row2) {
				$RKPDIndikator= DB::select('select distinct c.id_indikator_program_rkpd, c.uraian_indikator_program_rkpd,c.tolok_ukur_indikator,e.nm_unit,a.tahun_rkpd
from trx_rkpd_ranwal a
inner join trx_rkpd_ranwal_urusan b
on a.id_rkpd_ranwal=b.id_rkpd_ranwal and a.tahun_rkpd=b.tahun_rkpd
inner join trx_rkpd_ranwal_indikator c
on a.id_rkpd_ranwal=c.id_rkpd_ranwal and a.tahun_rkpd=c.tahun_rkpd
inner join trx_rkpd_ranwal_pelaksana d
on a.id_rkpd_ranwal=d.id_rkpd_ranwal and a.tahun_rkpd=d.tahun_rkpd
inner join ref_unit e
on d.id_unit=e.id_unit
where a.id_rkpd_ranwal = '.$row2->id_rkpd_ranwal.' and e.id_unit = '.$skpd.' and a.tahun_rkpd= '.$tahun  );
				
				$prog=0;
				
				foreach($RKPDIndikator as $row3) {
					
					$strProg='';
					$pagu=0;
					$count=0;
					
					if($prog<1)
					{
						$strProg=$row2->uraian_program_rpjmd;
						$pagu=number_format($row2->pagu_ranwal,2,',','.');
						$thn=$row3->tahun_rkpd;
						$unit=$row3->nm_unit;
						$count=$i;
					}
					
					$data[] = array(
							$count,
							$strProg,
							'',
							$row3->uraian_indikator_program_rkpd,
							$row3->tolok_ukur_indikator,
							$pagu,
							'',
							'',
							'',
							'',
							'',
							
					);
					
					
					$prog++;
				}
				$i++;
			}
			
			
			$sheet->prependRow(1, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(2, array(
					'Review terhadap Rancangan Awal RKPD Tahun '.$thn
			));
			$sheet->prependRow(3, array(
					$unit
			));
			$sheet->prependRow(5, array(
					'No','Rancangan Awal RKPD','','','','','Hasil Analisis Kebutuhan','','','','' ,'Catatan Penting'));
			$sheet->prependRow(6, array(
					'','Program','Lokasi','Indikator','Capaian Target','Pagu Indikatif(Ribuan)','Program','Lokasi','Indikator','Capaian Target','Pagu Indikatif(Ribuan)',''));
			
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A5:L6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('B7:L' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				
				$sheet->cells('A1:L3', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A2:L6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A1:L1');
						$sheet->mergeCells('A2:L2');
						$sheet->mergeCells('A3:L3');
						$sheet->mergeCells('A5:A6');
						$sheet->mergeCells('B5:F5');
						$sheet->mergeCells('G5:K5');
						$sheet->mergeCells('L5:L6');
						$sheet->cells('A1:L6', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A5:L6', function($cells) {
								$cells->setValignment('center');
							});
								$sheet->cells('A7:L10000', function($cells) {
									$cells->setValignment('top');
								});
									$sheet->setBorder('A5:L10000', 'thin');
									$sheet->setFreeze('A7');
									
									$sheet->setWidth('A', 3);
									$sheet->setWidth('B', 30);
									$sheet->setWidth('C', 30);
									$sheet->setWidth('D', 30);
									$sheet->setWidth('E', 30);
									$sheet->setWidth('F', 20);
									$sheet->setWidth('G', 30);
									$sheet->setWidth('H', 30);
									$sheet->setWidth('I', 30);
									$sheet->setWidth('J', 30);
									$sheet->setWidth('K', 20);
									$sheet->setWidth('L', 30);
									
									$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
										$protection->setSort(true);
										$protection->setSheet(true);
									});
		});
	})->export('xlsx');
	return index();
}

public function RumusanProgKeg(){
	
	
	Excel::create('RumusanKebutuhanReviewRanwalRKPD', function($excel) {
		// Set the title
		$excel->setTitle('Rumusan Kebutuhan Program dan Kegiatan Hasil Review Rancangan Awal RKPD');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Rumusan Kebutuhan Program dan Kegiatan Hasil Review Rancangan Awal RKPD');
		
		$excel->sheet('sheet1', function($sheet) {
			
			$tahun='2018';
			$skpd=19;
			
			$i=1;
			$prog=0;
			$strProg='';
			$pagu=0;
			$thn='';
			$unit='';
			
			
			$RKPDProgram= DB::select('select DISTINCT a.id_rkpd_ranwal,a.uraian_program_rpjmd,a.pagu_ranwal
from trx_rkpd_ranwal a
inner join trx_rkpd_ranwal_urusan b
on a.id_rkpd_ranwal=b.id_rkpd_ranwal and a.tahun_rkpd=b.tahun_rkpd
inner join trx_rkpd_ranwal_indikator c
on a.id_rkpd_ranwal=c.id_rkpd_ranwal and a.tahun_rkpd=c.tahun_rkpd
inner join trx_rkpd_ranwal_pelaksana d
on a.id_rkpd_ranwal=d.id_rkpd_ranwal and a.tahun_rkpd=d.tahun_rkpd
inner join ref_unit e
on d.id_unit=e.id_unit
where e.id_unit = '.$skpd.' and a.tahun_rkpd= '.$tahun);
			
			foreach($RKPDProgram as $row2) {
				$RKPDIndikator= DB::select('select distinct c.id_indikator_program_rkpd, c.uraian_indikator_program_rkpd,c.tolok_ukur_indikator,e.nm_unit,a.tahun_rkpd
from trx_rkpd_ranwal a
inner join trx_rkpd_ranwal_urusan b
on a.id_rkpd_ranwal=b.id_rkpd_ranwal and a.tahun_rkpd=b.tahun_rkpd
inner join trx_rkpd_ranwal_indikator c
on a.id_rkpd_ranwal=c.id_rkpd_ranwal and a.tahun_rkpd=c.tahun_rkpd
inner join trx_rkpd_ranwal_pelaksana d
on a.id_rkpd_ranwal=d.id_rkpd_ranwal and a.tahun_rkpd=d.tahun_rkpd
inner join ref_unit e
on d.id_unit=e.id_unit
where a.id_rkpd_ranwal = '.$row2->id_rkpd_ranwal.' and e.id_unit = '.$skpd.' and a.tahun_rkpd= '.$tahun  );
				
				$prog=0;
				
				foreach($RKPDIndikator as $row3) {
					
					$strProg='';
					$pagu=0;
					$count=0;
					
					if($prog<1)
					{
						$strProg=$row2->uraian_program_rpjmd;
						$pagu=number_format($row2->pagu_ranwal,2,',','.');
						$thn=$row3->tahun_rkpd;
						$unit=$row3->nm_unit;
						$count=$i;
						
					}
					
					$data[] = array(
							$count,
							$strProg,
							'',
							$row3->uraian_indikator_program_rkpd,
							$row3->tolok_ukur_indikator,
							$pagu,
							'',
							'',
							
							
					);
					
					
					$prog++;
				}
				$i++;
			}
			
			
			$sheet->prependRow(1, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(2, array(
					'Rumusan kebutuhan program dan kegiatan hasil review terhadap Rancangan Awal RKPD'
			));
			$sheet->prependRow(3, array(
					$unit
			));
			$sheet->prependRow(4, array(
					$thn
			));
			
			
			$sheet->prependRow(6, array(
					'No','Program','Lokasi','Indikator','Capaian Target','Kebutuhan Dana(Ribuan)','Sumber Dana','Catatan'));
			
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A6:H6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('B6:H' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				
				$sheet->cells('A1:H4', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A2:H6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A1:H1');
						$sheet->mergeCells('A2:H2');
						$sheet->mergeCells('A3:H3');
						$sheet->mergeCells('A4:H4');
						$sheet->cells('A1:H6', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A5:H6', function($cells) {
								$cells->setValignment('center');
							});
								$sheet->cells('A7:H10000', function($cells) {
									$cells->setValignment('top');
								});
									$sheet->setBorder('A5:H10000', 'thin');
									$sheet->setFreeze('A7');
									
									$sheet->setWidth('A', 3);
									$sheet->setWidth('B', 30);
									$sheet->setWidth('C', 30);
									$sheet->setWidth('D', 30);
									$sheet->setWidth('E', 30);
									$sheet->setWidth('F', 20);
									$sheet->setWidth('G', 30);
									$sheet->setWidth('H', 50);
									
									
									$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
										$protection->setSort(true);
										$protection->setSheet(true);
									});
		});
	})->export('xlsx');
	return index();
}

public function KompilasiProgramdanPaguRenstra(){
	
	
	Excel::create('KompilasiProgramdanPaguRenstraSKPD', function($excel) {
		// Set the title
		$excel->setTitle('Kompilasi Program dan Pagu SKPD');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Kompilasi Program dan Pagu SKPD');
		
		$excel->sheet('sheet1', function($sheet) {
			
			
			$RenstraSKPD= DB::select('select distinct i.id_sub_unit,i.nm_sub
from trx_renstra_program e
INNER JOIN trx_renstra_kegiatan f
on e.id_program_renstra=f.id_program_renstra
inner join trx_renstra_kegiatan_pelaksana h
on f.id_kegiatan_renstra=h.id_kegiatan_renstra
inner join ref_sub_unit i
on h.id_sub_unit=i.id_sub_unit
				');
			$i=1;
			$prog=0;
			$strProg='';
			$pagu=0;
			
			foreach($RenstraSKPD as $row) {
				$data[] = array(
						$i,
						$row->nm_sub,
						'',
						'',
						'',
						'',
						'',
						'',
						'',
				);
				
				$RenstraProgram= DB::select('select distinct e.id_program_renstra,e.uraian_program_renstra,e.pagu_tahun1,e.pagu_tahun2,e.pagu_tahun3,e.pagu_tahun4,e.pagu_tahun5
from trx_renstra_program e
INNER JOIN trx_renstra_kegiatan f
on e.id_program_renstra=f.id_program_renstra
inner join trx_renstra_kegiatan_indikator g
on f.id_kegiatan_renstra=g.id_kegiatan_renstra
inner join trx_renstra_kegiatan_pelaksana h
on f.id_kegiatan_renstra=h.id_kegiatan_renstra
inner join ref_sub_unit i
on h.id_sub_unit=i.id_sub_unit
where i.id_sub_unit = '.$row->id_sub_unit);
				foreach($RenstraProgram as $row2) {
				$data[] = array(
						'',
						'',
						$row2->uraian_program_renstra,
						'',
						number_format($row2->pagu_tahun1,2,',','.'),
						number_format($row2->pagu_tahun2,2,',','.'),
						number_format($row2->pagu_tahun3,2,',','.'),
						number_format($row2->pagu_tahun4,2,',','.'),
						number_format($row2->pagu_tahun5,2,',','.'),
				);
				
				
				
				
					
					$RenstraKegiatan= DB::select('select distinct f.uraian_kegiatan_renstra,f.pagu_tahun1,f.pagu_tahun2,f.pagu_tahun3,f.pagu_tahun4,f.pagu_tahun5
from trx_renstra_program e
INNER JOIN trx_renstra_kegiatan f
on e.id_program_renstra=f.id_program_renstra
inner join trx_renstra_kegiatan_indikator g
on f.id_kegiatan_renstra=g.id_kegiatan_renstra
inner join trx_renstra_kegiatan_pelaksana h
on f.id_kegiatan_renstra=h.id_kegiatan_renstra
inner join ref_sub_unit i
on h.id_sub_unit=i.id_sub_unit
					where e.id_program_renstra = '.$row2->id_program_renstra.' and h.id_sub_unit = '.$row->id_sub_unit);
					
					
					
					foreach($RenstraKegiatan as $row3) {
						
						
						
						$data[] = array(
								'',
								'',
								'',
								$row3->uraian_kegiatan_renstra,
								number_format($row3->pagu_tahun1,2,',','.'),
								number_format($row3->pagu_tahun2,2,',','.'),
								number_format($row3->pagu_tahun3,2,',','.'),
								number_format($row3->pagu_tahun4,2,',','.'),
								number_format($row3->pagu_tahun5,2,',','.'),
								
						);
						
						
						$prog++;
					}
				}
				$i++;
			}
			
			$sheet->prependRow(2, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(3, array(
					'Kompilasi Program dan Pagu Indikatif Renstra Tiap SKPD'
			));
			$sheet->prependRow(5, array(
					'No','SKPD/Program/Kegiatan','','','Pagu Indikatif','','','',''));
			$sheet->prependRow(6, array(
					'','','','','Tahun 1','Tahun 2','Tahun 3','Tahun 4','Tahun 5'));
			
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A5:I6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->getStyle('D7:D' . $sheet->getHighestRow())
				->getAlignment()->setWrapText(true);
				
				
				$sheet->cells('A2:I3', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->cells('A2:I6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->mergeCells('A2:I2');
						$sheet->mergeCells('A3:I3');
						$sheet->mergeCells('A5:A6');
						$sheet->mergeCells('B5:D6');
						$sheet->mergeCells('E5:I5');
						
						$sheet->cells('A2:I6', function($cells) {
							$cells->setAlignment('center');
						});
							$sheet->cells('A5:I6', function($cells) {
								$cells->setValignment('center');
							});
								$sheet->cells('A7:I10000', function($cells) {
									$cells->setValignment('top');
								});
									$sheet->cells('E7:I10000', function($cells) {
										$cells->setAlignment('right');
								});
									$sheet->setBorder('A5:I10000', 'thin');
									$sheet->setFreeze('A7');
									
									$sheet->setWidth('A', 3);
									$sheet->setWidth('B', 5);
									$sheet->setWidth('C', 5);
									$sheet->setWidth('D', 50);
									$sheet->setWidth('E', 20);
									$sheet->setWidth('F', 20);
									$sheet->setWidth('G', 20);
									$sheet->setWidth('H', 20);
									$sheet->setWidth('I', 20);
									
									$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
										$protection->setSort(true);
										$protection->setSheet(true);
									});
		});
	})->export('xlsx');
	return index();
}

public function KompilasiPokir(){
	
	
	Excel::create('Pokok Pikiran', function($excel) {
		// Set the title
		$excel->setTitle('Pokok Pikiran');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Pokok Pikiran');
		
		$excel->sheet('sheet1', function($sheet) {
			$i=1;
			
			
			$Pokir= DB::select('SELECT
	b.id_judul_usulan,
	b.volume,
	f.singkatan_satuan,
	e.nama_kecamatan,
	d.nama_desa,
	c.rw,
	c.rt,
	b.id_satuan,
	c.id_kecamatan,
	c.id_desa
FROM
	trx_pokir AS a
INNER JOIN trx_pokir_usulan AS b ON b.id_pokir = a.id_pokir
INNER JOIN trx_pokir_lokasi AS c ON c.id_pokir_usulan = b.id_pokir_usulan
INNER JOIN ref_desa AS d ON c.id_desa = d.id_desa
INNER JOIN ref_kecamatan AS E ON c.id_kecamatan = e.id_kecamatan
INNER JOIN ref_satuan AS F ON b.id_satuan = f.id_satuan
				');
			foreach($Pokir as $row) {
				
				$data[] = array(
						$i,
						$row->id_judul_usulan,
						'',
						$row->volume.' '.$row->singkatan_satuan,
						$row->nama_kecamatan.', '.$row->nama_desa.', RT. '.$row->rt.', Rw. '.$row->rw,
						'',
						'',
						
				);
				$i++;
			}
			
			$sheet->prependRow(3, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(4, array(
					'Rumusan Usulan Program/Kegiatan'
			));
			$sheet->prependRow(5, array(
					'Hasil Penelaahan Pokok-pokok Pikiran DPRD dan Validasi'
			));
			
			
			$sheet->prependRow(6, array(
					'No','Program/Kegiatan','Indikator', 'Volume','Lokasi','SKPD','Validasi/Ket'
			));
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A6:G6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->cells('A3:H5', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->getStyle('B1:H' . $sheet->getHighestRow())
					->getAlignment()->setWrapText(true);
					
					
					
					
								$sheet->mergeCells('A3:G3');
								$sheet->mergeCells('A4:G4');
								$sheet->mergeCells('A5:G5');
					// 			$sheet->mergeCells('C6:D6');
					// 			$sheet->mergeCells('E6:F6');
					// 			$sheet->mergeCells('G6:H6');
					$sheet->cells('A3:G6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->cells('A7:G10000', function($cells) {
							$cells->setValignment('top');
						});
							
							$sheet->setWidth('A', 7);
							$sheet->setWidth('B', 40);
							$sheet->setWidth('C', 20);
							$sheet->setWidth('D', 20);
							$sheet->setWidth('E', 20);
							$sheet->setWidth('F', 20);
							$sheet->setWidth('G', 40);
							
							$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
								$protection->setSort(true);
								$protection->setSheet(true);
							});
		});
	})->export('xlsx');
	return index();
}


public function DaftarBelumSepakatMusrencam(){
	
	
	Excel::create('Daftar Musrencam Belum Disepakati', function($excel) {
		// Set the title
		$excel->setTitle('Daftar Musrencam Belum Disepakati');
		$excel->setCreator('SIMDA')->setCompany('BPKP');
		$excel->setDescription('report Daftar Musrencam Belum Disepakati');
		
		$excel->sheet('sheet1', function($sheet) {
			$i=1;
			
			
			$Pokir= DB::select('SELECT
	b.id_judul_usulan,
	b.volume,
	f.singkatan_satuan,
	e.nama_kecamatan,
	d.nama_desa,
	c.rw,
	c.rt,
	b.id_satuan,
	c.id_kecamatan,
	c.id_desa
FROM
	trx_pokir AS a
INNER JOIN trx_pokir_usulan AS b ON b.id_pokir = a.id_pokir
INNER JOIN trx_pokir_lokasi AS c ON c.id_pokir_usulan = b.id_pokir_usulan
INNER JOIN ref_desa AS d ON c.id_desa = d.id_desa
INNER JOIN ref_kecamatan AS E ON c.id_kecamatan = e.id_kecamatan
INNER JOIN ref_satuan AS F ON b.id_satuan = f.id_satuan
				');
			foreach($Pokir as $row) {
				
				$data[] = array(
						$i,
						$row->id_judul_usulan,
						'',
						$row->volume.' '.$row->singkatan_satuan,
						$row->nama_kecamatan.', '.$row->nama_desa.', RT. '.$row->rt.', Rw. '.$row->rw,
						'',
						'',
						
				);
				$i++;
			}
			
			$sheet->prependRow(3, array(
					'Pemerintah Kabupaten Purworejo'
			));
			$sheet->prependRow(4, array(
					'Rumusan Usulan Program/Kegiatan'
			));
			$sheet->prependRow(5, array(
					'Hasil Penelaahan Pokok-pokok Pikiran DPRD dan Validasi'
			));
			
			
			$sheet->prependRow(6, array(
					'No','Program/Kegiatan','Indikator', 'Volume','Lokasi','SKPD','Validasi/Ket'
			));
			$sheet->fromArray($data, null, 'A7', false, false);
			$sheet->cells('A6:G6', function($cells) {
				$cells->setBackground('#AAAAFF');
				
			});
				$sheet->cells('A3:H5', function($cells) {
					$cells->setFont(array(
							'family'     => 'Calibri',
							'size'       => '16',
							'bold'       =>  true
					));
				});
					$sheet->getStyle('B1:H' . $sheet->getHighestRow())
					->getAlignment()->setWrapText(true);
					
					
					
					
					$sheet->mergeCells('A3:G3');
					$sheet->mergeCells('A4:G4');
					$sheet->mergeCells('A5:G5');
					// 			$sheet->mergeCells('C6:D6');
					// 			$sheet->mergeCells('E6:F6');
					// 			$sheet->mergeCells('G6:H6');
					$sheet->cells('A3:G6', function($cells) {
						$cells->setAlignment('center');
					});
						$sheet->cells('A7:G10000', function($cells) {
							$cells->setValignment('top');
						});
							
							$sheet->setWidth('A', 7);
							$sheet->setWidth('B', 40);
							$sheet->setWidth('C', 20);
							$sheet->setWidth('D', 20);
							$sheet->setWidth('E', 20);
							$sheet->setWidth('F', 20);
							$sheet->setWidth('G', 40);
							
							$sheet->protect('password', function(\PHPExcel_Worksheet_Protection $protection) {
								$protection->setSort(true);
								$protection->setSheet(true);
							});
		});
	})->export('xlsx');
	return index();
}


}


// Mas ini dipake ya
// utk routes (web.php)
// Route::get('/printRPJMDTSK','Laporan\CetakRpjmdController@perumusanAKPembangunan');
// Route::get('/printProgPrio','Laporan\CetakRpjmdController@perumusanProgramPrioritasPemda');
// Route::get('/PrintProyeksiPendapatan','Laporan\CetakRpjmdController@ProyeksiPendapatan');
// Route::get('/PrintKompilasiProgramdanPagu','Laporan\CetakRpjmdController@KompilasiProgramdanPagu');
// Route::get('/PrintReviewRanwalRKPD','Laporan\CetakRpjmdController@ReviewRanwalRKPD');
// Route::get('/PrintRumusanReviewRanwal','Laporan\CetakRpjmdController@RumusanProgKeg');
// Route::get('/PrintProgPaguRenstra','Laporan\CetakRpjmdController@KompilasiProgramdanPaguRenstra');
// Route::get('/PrintKompilasiProgramdanPaguRenja/{id_unit}','Laporan\CetakRenjaController@KompilasiProgramdanPaguRenja');
// Route::get('/printPokir','Laporan\CetakRpjmdController@KompilasiPokir');



// utk view
// <ul class="nav nav-tabs" role="tablist">
// <li class="active"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
// <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
// <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
// <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
// <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
// </ul>

// <div class="tab-content">
// <div class="btn-group">
// <button type="button" class="btn btn-info btn-sm dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Print <span class="caret"></span></button>
// <ul class="dropdown-menu">
// <li>
// <p><a class="btnPrintRPJMDTSK btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak RPJMD TSK</a></p>
// </li>
// <li>
// <p><a class="btnPrintProgPrio btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Program Prioritas</a></p>
// </li>
// <li>
// <p><a class="btnPrintProyeksiPendapatan btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Proyeksi Pend. RKPD</a></p></li>
// <li>
// <p><a class="btnPrintKompilasiProgramdanPagu btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Kompilasi Program dan Pagu RPJMD</a></p></li>
// <li>
// <p><a class="btnPrintReviewRanwalRKPD btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Review Ranwal RKPD</a></p>
// </li>
// <li>
// <p><a class="btnPrintRumusanReviewRanwalRKPD btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Rumusan Review Ranwal RKPD</a></p>
// </li>
// <li>
// <p><a class="btnPrintKompilasiProgramdanPaguRenstra btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Kompilasi Program dan Pagu Renstra</a></p>
// </li>
// <li>
// <p><a class="btnPrintPokir btn btn-sm btn-success" ><i class="glyphicon glyphicon-print"></i> Cetak Pokok Pikiran</a></p>
// </li>
// </ul>
// </div>


// utk JS
// $(document).on('click', '.btnPrintRPJMDTSK', function() {
	
// 	location.replace('./printRPJMDTSK');
	
// });
// 	$(document).on('click', '.printProgPrio', function() {
		
// 		location.replace('./printProgPrio');
		
// 	});
// 		$(document).on('click', '.btnPrintProyeksiPendapatan', function() {
			
// 			location.replace('./PrintProyeksiPendapatan');
			
// 		});
// 			$(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {
				
// 				location.replace('./PrintKompilasiProgramdanPagu');
				
// 			});
// 				$(document).on('click', '.btnPrintReviewRanwalRKPD', function() {
					
// 					location.replace('./PrintReviewRanwalRKPD');
					
// 				});
// 					$(document).on('click', '.btnPrintRumusanReviewRanwalRKPD', function() {
						
// 						location.replace('./PrintRumusanReviewRanwal');
						
// 					});
// 						$(document).on('click', '.btnPrintKompilasiProgramdanPaguRenstra', function() {
							
// 							location.replace('./PrintProgPaguRenstra');
							
// 						});
// 							$(document).on('click', '.btnPrintPokir', function() {
								
// 								location.replace('./printPokir');
								
// 							});