<?php

namespace App\Http\Controllers;

use Charts;
use DB;
use Illuminate\Http\Request;
use App\Traits\ChartOfWord;

class ChartController extends Controller
{
    use ChartOfWord;

    public function index()
    {
        $chart = $this->createChart(config('setting.default.date'), config('setting.default.today'));

        return view('charts.chart', compact('chart'));
    }

    public function getChartByDate(Request $request)
    {
        $time = $request->get_date;
        $chart = $this->createChart(config('setting.default.date'), $time);

        return view('charts.chart', compact('chart'));
    }

    public function getChartByMonth()
    {
        $chart = $this->createChart(config('setting.default.month'), config('setting.default.today'));

        return view('charts.month_chart', compact('chart'));
    }

    public function postChartByMonth(Request $request)
    {
        $time = $request->get_month . config('setting.default.add_date');
        $chart = $this->createChart(config('setting.default.month'), $time);

        return view('charts.month_chart', compact('chart'));
    }
}
