<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 6/10/15
 * Time: 09:56 AM
 */

namespace App\Helpers;
use Carbon\Carbon;

class FunctionX
{

    public static function intentToBool($var)
    {
        switch (strtolower($var))
        {
            case '1':
            case 'true':
            case 'on':
            case 'yes':
            case 'y':
                return 1;
            case '0':
            case 'false':
            case 'off':
            case 'no':
            case 'n':
                return 0;
            default:
                return $var;
        }
    }
    public static function validateData($data)
    {
        foreach ($data as $key => $value) {
            $data[$key]  = static::intentToBool($value);
        }
        return $data;
    }
    public static function diffForHumans($date)
    {
        $txt = 'time.timediff.';
        $isNow = true;
        $other = Carbon::now();
        $delta = abs($other->diffInSeconds($date));
        // 30 days per month, 365 days per year... good enough!!
        $divs = array(
            'second' => Carbon::SECONDS_PER_MINUTE,
            'minute' => Carbon::MINUTES_PER_HOUR,
            'hour'   => Carbon::HOURS_PER_DAY,
            'day'    => 30,
            'month'  => Carbon::MONTHS_PER_YEAR
        );
        $unit = 'year';
        foreach ($divs as $divUnit => $divValue) {
            if ($delta < $divValue) {
                $unit = $divUnit;
                break;
            }
            $delta = floor($delta / $divValue);
        }
        if ($delta == 0) {
            $delta = 1;
        }
        $txt .= $unit;
        return \Lang::choice($txt, $delta, compact('delta'));
    }

}