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

    public function build($data_array): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // dd($data_array);
        return $this->chart->lineChart()
            ->setTitle('Actual FFB Yield (MT)')
            // ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Actual', [40, 93, 35, 42, 18, 82, 100, 90, 70, 90])
            ->addData('Budget', [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
            ->setGrid('#3F51B5', 0.1);
    }
}
