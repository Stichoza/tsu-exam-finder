<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Gufy\PdfToHtml\Pdf as PdfToHtml;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as PdfParser;

class ParseController extends Controller
{

    /**
     * URL pattern of PDF file
     * @var array
     */
    private $filePath = 'https://www.tsu.ge/data/file_db/sagamocdo/%s.pdf';

    /**
     * PdfParser object
     * @var \Smalot\PdfParser\Parser
     */
    private $parser;

    public function details(Request $request)
    {
        // Generate filename
        $filename = $this->buildUrlByDateAndTime($request->input('date'), $request->input('time'));

        echo $cacheKey = preg_replace('/\D/', '', $filename); exit;

        $this->parser = new PdfParser();

        $text = $this->parser->parseFile($filename)->getText();
        
        $data = [];
        preg_match_all('/^([ა-ჰ]+)@+([ა-ჰ]+)@+([\d]{1,2})@+([\d]{1,2})@+(.+)$/im', $text, $data);

        $search = $request->input('q');

        $results = [];

        for ($i = 0; $i < count($data[0]); $i++) {

            // if ($data[1][$i] == $search) {
            //     $temp = ['subject' => $data[3][$i]];

            //     if (strlen($data[2][$i]) == 2) {
            //         $temp['sector'] = substr($data[2][$i], 0, 1);
            //         $temp['seat']   = substr($data[2][$i], -1);
            //     } else if (strlen($data[2][$i]) == 4) {
            //         $temp['sector'] = substr($data[2][$i], 0, 2);
            //         $temp['seat']   = substr($data[2][$i], -2);
            //     } else {
            //         // wtf
            //     }

            //     $results[] = $temp;
                
            // }
        }

        dd($results);
    }

    /**
     * Return
     * @param string $date Date of exam
     * @param string $time Time of exam
     * @param boolean $multiple Returns an array of URLs instead on a single URL
     * @return string|array File URL or array of URLs
     */
    private function buildUrlByDateAndTime($date, $time, $multiple = false)
    {
        $carbonDate = new Carbon($date . ' ' . $time);

        if ($multiple) {
            $urls = [];
            // TODO: Implement this if needed.
        } else {
            return sprintf($this->filePath, $carbonDate->format('d.m.y_H.i'));
        }
    }
}
