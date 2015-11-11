<?php

namespace App\Http\Controllers;

use Smalot\PdfParser\Parser as PdfParser;

class ParseController extends Controller
{

	/**
	 * PdfParser object
	 * @var \Smalot\PdfParser\Parser
	 */
	private $parser;

    public function dump()
    {
    	$this->parser = new PdfParser();
		$pdf = $this->parser->parseFile('https://www.tsu.ge/data/file_db/sagamocdo/12.11.15_13.00.pdf');
		 
		$text = $pdf->getText();
		
		echo preg_replace('/^([ა-ჰ]+)([\d]{2,4})(.+)$/im', '>>>>$1>>>>$2>>>>$3<<<<', $text);
    }
}
