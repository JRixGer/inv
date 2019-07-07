<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $population = \Lava::DataTable();

        $population->addDateColumn('Year')
                ->addNumberColumn('Number of People')
                ->addRow(['2006', 623452])
                ->addRow(['2007', 685034])
                ->addRow(['2008', 716845])
                ->addRow(['2009', 757254])
                ->addRow(['2010', 778034])
                ->addRow(['2011', 792353])
                ->addRow(['2012', 839657])
                ->addRow(['2013', 842367])
                ->addRow(['2014', 873490]);

        \Lava::AreaChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in'
            ]
        ]);


        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Check Reviews', 5])
                ->addRow(['Watch Trailers', 2])
                ->addRow(['See Actors Other Work', 4])
                ->addRow(['Settle Argument', 89]);
        
        \Lava::PieChart('IMDB', $reasons, [
            'title'  => 'Reasons I visit IMDB',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);

        // $votes  = \Lava::DataTable();

        // $votes->addStringColumn('Food Poll')
        //     ->addNumberColumn('Votes')
        //     ->addRow(['Tacos',  rand(1000,5000)])
        //     ->addRow(['Salad',  rand(1000,5000)])
        //     ->addRow(['Pizza',  rand(1000,5000)])
        //     ->addRow(['Apples', rand(1000,5000)])
        //     ->addRow(['Fish',   rand(1000,5000)]);

        // \Lava::BarChart('Votes', $votes);


        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Check Reviews', 5])
                ->addRow(['Watch Trailers', 2])
                ->addRow(['See Actors Other Work', 4])
                ->addRow(['Settle Argument', 89]);

        \Lava::DonutChart('IMDB', $reasons, [
            'title' => 'Reasons I visit IMDB'
        ]);

        return view('home');
    }
}
