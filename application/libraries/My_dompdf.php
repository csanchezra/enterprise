<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

class My_dompdf extends Dompdf
{

	public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait",$num_page = FALSE)
	{
		$dompdf = new DOMPDF();
		$dompdf->loadHtml(ob_get_clean());
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();

		if($num_page){
			// $dompdf->page_text();
			$dompdf->getCanvas()->page_text(520, 820, "Página: {PAGE_NUM} / {PAGE_COUNT}", '', 8, array(0,0,0));


			// $canvas->page_text(520, 820, "Página: {PAGE_NUM} / {PAGE_COUNT}",'', 8, array(0,0,0));
		}
		

		if ($stream)
		{

			$dompdf->stream($filename . ".pdf", array("Attachment" => 0));
		}
		else
		{
			return $dompdf->output();
		}
	}
}
