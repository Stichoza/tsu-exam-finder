<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    private $localizedMonths = [
        'ნულანვარი', 'იანვარი', 'თებერვალი', 'მარტი', 'აპრილი', 'მაისი', 'ივნისი',
        'ივლისი', 'აგვისტო', 'სექტემბერი', 'ოქრომბერი', 'ნოემბერი', 'დეკემბერი'
    ];

    public function index()
    {
        $dates = [];
        $time = '09:00';
        $carbon = (new Carbon('now'))->addDay(-1); // Because we add a day

        for ($i = 0; $i < 2; $i++) {
            $dates[] = [
                'value' => $carbon->addDay()->format('j F Y'),
                'title' => $carbon->day . ' ' . $this->localizedMonths[$carbon->month],
                'active' => false // We will set it later
            ];
        }

        $dates[(int) ($carbon->hour > 20)]['active'] = true; // Make one date selected depending on current time.

        $carbon = Carbon::now();

        if ($carbon->hour >= 9 && $carbon->hour < 20) {
            $time = ($carbon->minute < 30) ? $carbon->format('H') . ':30' : $carbon->addHour()->format('H') . ':00';
        }

        return view('index')
            ->with('dates', $dates)
            ->with('time', $time);
    }
}
