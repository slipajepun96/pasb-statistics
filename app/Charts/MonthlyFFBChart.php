<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyFFBChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($graph_data): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // dd($graph_data);

        //ffb yield to view
        $yesterday_month=$graph_data[2];
        $yesterday_date=$graph_data[3];
        for($i=0;$i<$yesterday_month;$i++)
        {
            $ffb_yield[$i]=$graph_data[0][$i];
        }

        return $this->chart->lineChart()
            ->setTitle('Actual FFB Yield (MT) as of '.$yesterday_date)
            // ->setSubtitle('Physical sales vs Digital sales.')
            // ->addData('Actual', [40, 93, 35, 42, 18, 82, 100, 90, 70, 90])
            ->addData('Actual', $ffb_yield)
            ->addData('Budget', $graph_data[1])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
            ->setGrid('#3F51B5', 0.1);
    }
}
