<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Repository as Cache;
use Carbon\Carbon;
use Exception;
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
     * Get results of received query
     * @param  Request $request
     * @return array Result of query
     */
    public function details(Request $request, Cache $cache)
    {
        $firstName = $request->input('name'); // First name
        $lastName  = $request->input('last'); // Last name
        $date      = $request->input('date'); // Date of exam
        $time      = $request->input('time'); // Time of exam
        $filename  = $this->buildUrlByDateAndTime($date, $time); // Get filename (url)
        $cacheKey  = preg_replace('/\D/', '', $filename); // Generate key for cache entry

        $data = $cache->remember($cacheKey, 0.00001, function() use ($filename) {

            $data = $matches = []; // Initial empty data array
            $parser = new PdfParser(); // Parser object

            try {
                $text = $parser->parseFile($filename)->getText(); // Get text
            } catch (Exception $e) {
                abort(500, 'PDF Parser failed'); // Huston. nothing. I'm fine.
                exit;
            }
            
            preg_match_all('/^([ა-ჰ]+)@+([ა-ჰ]+)@+([\d]{1,2})@+([\d]{1,2})@+(.+)$/im', $text, $matches);

            for ($i = 0; $i < count($matches[0]); $i++) {
                $data[] = [
                    'last_name'  => str_replace('@', '', $matches[1][$i]),
                    'first_name' => str_replace('@', '', $matches[2][$i]),
                    'sector'     => (int) $matches[3][$i],
                    'seat'       => (int) $matches[4][$i],
                    'subject'    => str_replace('@', '', $matches[5][$i]),
                ];
            }

            return $data;
        });

        $results = array_reduce($data, function($carry, $item) use ($firstName, $lastName) {
            if ($item['last_name'] == $lastName && $item['first_name'] == $firstName) {
                $carry[] = $item;
            }
            return $carry;
        }, []);

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
            return sprintf($this->filePath, $carbonDate->format('d.m.Y_G.i'));
        }
    }
}
