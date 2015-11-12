<?php

namespace App\Http\Controllers;

use Smalot\PdfParser\Parser as PdfParser;
use Illuminate\Http\Request;

class ParseController extends Controller
{

    /**
     * PdfParser object
     * @var \Smalot\PdfParser\Parser
     */
    private $parser;

    public function dump(Request $request)
    {

        $date = $request->input('date');
        $date = $request->input('time');

        $this->parser = new PdfParser();
        $pdf = $this->parser->parseFile('https://www.tsu.ge/data/file_db/sagamocdo/12.11.15_13.00.pdf');
         
        $text = $pdf->getText();
        
        $data = [];
        preg_match_all('/^([ა-ჰ]+)([\d]{2,4})(.+)$/im', $text, $data);

        $search = $request->input('q');

        $results = [];

        for ($i=0; $i < count($data[0]); $i++) { 

            if ($data[1][$i] == $search) {
                $temp = ['subject' => $data[3][$i]];

                if (strlen($data[2][$i]) == 2) {
                    $temp['sector'] = substr($data[2][$i], 0, 1);
                    $temp['seat']   = substr($data[2][$i], -1);
                } else if (strlen($data[2][$i]) == 4) {
                    $temp['sector'] = substr($data[2][$i], 0, 2);
                    $temp['seat']   = substr($data[2][$i], -2);
                } else {
                    // wtf
                }

                $results[] = $temp;
                
            }
        }


        dd($results);
    }
}
