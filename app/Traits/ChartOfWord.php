<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 02/10/2018
 * Time: 16:19
 */

namespace App\Traits;

use Charts;
use DB;
use Auth;
use DateTime;

trait ChartOfWord
{
    public function createChart($type, $time)
    {
        if ($time instanceof DateTime) {
            $dateTime = $time;
        } else {
            $dateTime = DateTime::createFromFormat('Y-m-d', $time);
        }
        if ($type == config('setting.default.date')) {
            $words = DB::table('list_of_words')
                ->where(DB::raw("(DATE_FORMAT(learn_time, '%d'))"), date_format($dateTime, 'd'))
                ->where('user_id', Auth::user()->id)
                ->get();

            $chart = Charts::database($words)
                ->dateColumn('learn_time')
                ->groupByHour(date_format($dateTime, 'd'), date_format($dateTime, 'm'), date_format($dateTime, 'Y'), false);

            return $chart;
        } else {
            $words = DB::table('list_of_words')
                ->where(DB::raw("(MONTH(learn_time))"), date_format($dateTime, 'm'))
                ->where('user_id', Auth::user()->id)
                ->get();

            $chart = Charts::database($words)
                ->dateColumn('learn_time')
                ->groupByDay(date_format($dateTime, 'm'), date_format($dateTime, 'Y'), false);

            return $chart;
        }
    }
}
