@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">


        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-body" style="padding:10px">
                    <div id="pop_div"></div>
                    <?php echo Lava::render('AreaChart', 'Population', 'pop_div') ?>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px;">
                <div class="card-body" style="padding:10px">
                    <div id="chart-div1"></div>
                    <?php echo Lava::render('PieChart', 'IMDB', 'chart-div1') ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-body" style="padding:10px">
                    <div id="chart-div2"></div>
                    <?php echo Lava::render('DonutChart', 'IMDB', 'chart-div2') ?>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
