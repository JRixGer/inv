@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">

        <div class="col-md-8">
            <div class="card" style="margin:10px">
               <div class="card-header"><b>PWCP Affiliates, Number of Members and Re Bills</b></div>
               <div class="card-body" style="padding:10px">
                    <div id="PWCPAffiliates_div"></div>
                    <?php echo Lava::render('LineChart', 'PWCPAffiliates', 'PWCPAffiliates_div') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-gutters justify-content-center">
        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><b>PWCP Active and Canceled Members</b></div>
               <div class="card-body" style="padding:10px">
                    <div id="activeCanceled_div"></div>
                    <?= Lava::render('ColumnChart', 'ActiveCanceled', 'activeCanceled_div') ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><b>PIC Active and Canceled Members</b></div>
               <div class="card-body" style="padding:10px">
                    <div id="activeCanceled_PIC_div"></div>
                    <?= Lava::render('ColumnChart', 'ActiveCanceledPIC', 'activeCanceled_PIC_div') ?>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-12">
            <div class="card" style="margin:10px">
               <div class="card-body" style="padding:10px">
                    <div id="temps_div"></div>
                    <?php //echo Lava::render('LineChart', 'Temps', 'temps_div') ?>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-body" style="padding:10px">
                    <div id="pop_div"></div>
                    <?php //echo Lava::render('AreaChart', 'Population', 'pop_div') ?>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px;">
                <div class="card-body" style="padding:10px">
                    <div id="chart-div1"></div>
                    <?php //echo Lava::render('PieChart', 'IMDB1', 'chart-div1') ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-body" style="padding:10px">
                    <div id="chart-div2"></div>
                    <?php //echo Lava::render('DonutChart', 'IMDB2', 'chart-div2') ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-body" style="padding:10px">
                    <div id="poll_div"></div>
                    <?php //echo Lava::render('BarChart', 'Votes', 'poll_div') ?>
                </div>
            </div>
        </div> -->


    </div>
</div>
@endsection
