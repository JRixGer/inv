@extends('layouts.app')

@section('content')
<div class="container-fluid padding_" style="min-height:1000px">


    <div class="row no-gutters justify-content-center">

        <div class="col-md-4">
            <div class="card" style="margin:10px;">
                <div class="card-header"><a href="#" onClick="goToPage('1','PWCP')" style="width:100%">PWCP - Overall Active and Canceled Members <span style="float:right"><i class="fa fa-link"></i></span></a></div>
                <div class="card-body">
                    <div id="PWCP-div"></div>
                    <?php echo Lava::render('DonutChart', 'PWPCActiveCanceled', 'PWCP-div') ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px;">
                <div class="card-header"><a href="#" onClick="goToPage('1','PIC')" style="width:100%">PIC - Overall Active and Canceled Members <span style="float:right"><i class="fa fa-link"></i></span></a></div>
                <div class="card-body">
                    <div id="PIC-div"></div>
                    <?php echo Lava::render('DonutChart', 'PICActiveCanceled', 'PIC-div') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters justify-content-center">
        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('2','PWCP')" style="width:100%">PWCP - Active and Canceled Members by Date Range  <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="activeCanceled_div"></div>
                    <?= Lava::render('ColumnChart', 'ActiveCanceled', 'activeCanceled_div') ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('2','PIC')" style="width:100%">PIC - Active and Canceled Members by Date Range  <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="activeCanceled_PIC_div"></div>
                    <?= Lava::render('ColumnChart', 'ActiveCanceledPIC', 'activeCanceled_PIC_div') ?>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-12">
            <div class="card" style="margin:10px">
               <div class="card-body">
                    <div id="temps_div"></div>
                    <?php //echo Lava::render('LineChart', 'Temps', 'temps_div') ?>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-body">
                    <div id="pop_div"></div>
                    <?php //echo Lava::render('AreaChart', 'Population', 'pop_div') ?>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px;">
                <div class="card-body">
                    <div id="chart-div1"></div>
                    <?php //echo Lava::render('PieChart', 'IMDB1', 'chart-div1') ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <div id="chart-div2"></div>
                    <?php //echo Lava::render('DonutChart', 'IMDB2', 'chart-div2') ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <div id="poll_div"></div>
                    <?php //echo Lava::render('BarChart', 'Votes', 'poll_div') ?>
                </div>
            </div>
        </div> -->


    </div>



    <div class="row no-gutters justify-content-center">

        <div class="col-md-8">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('3','PWCP')" style="width:100%">PWCP - Number of Members and Re Bills by Affiliates <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="PWCPAffiliates_div"></div>
                    <?php echo Lava::render('LineChart', 'PWCPAffiliates', 'PWCPAffiliates_div') ?>
                </div>
            </div>
        </div>
    </div>


    <div class="row no-gutters justify-content-center">

        <div class="col-md-8">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('4','PWCP')" style="width:100%">PWCP - Number of Members and Re Bills by Month <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="PWCPAffiliatesByMonth_div"></div>
                    <?php echo Lava::render('LineChart', 'PWCPAffiliatesByMonth', 'PWCPAffiliatesByMonth_div') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters justify-content-center">

        <div class="col-md-8">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('5','PWCP')" style="width:100%">PWCP - Number of Members and Re Bills by Day <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="PWCPAffiliatesByDay_div"></div>
                    <?php echo Lava::render('LineChart', 'PWCPAffiliatesByDay', 'PWCPAffiliatesByDay_div') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters justify-content-center">

        <div class="col-md-8">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('5','PWCP')" style="width:100%">PWCP - Number of Members, Product Price and Tax by Month<span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="PWCPAffiliatesByPrice_div"></div>
                    <?php echo Lava::render('ColumnChart', 'PWCPAffiliatesByPrice', 'PWCPAffiliatesByPrice_div') ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row no-gutters justify-content-center">

        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('5','PWCP')" style="width:100%">PWCP - Total Sold by SKU <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="totalSalesBySKU_div"></div>
                    <?= Lava::render('BarChart', 'totalSalesBySKU', 'totalSalesBySKU_div') ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="margin:10px">
               <div class="card-header"><a href="#" onClick="goToPage('5','PIC')" style="width:100%">PIC - Total Sold by SKU <span style="float:right"><i class="fa fa-link"></i></span></a></div>
               <div class="card-body">
                    <div id="PICtotalSalesBySKU_div"></div>
                    <?= Lava::render('BarChart', 'PICtotalSalesBySKU', 'PICtotalSalesBySKU_div') ?>
                </div>
            </div>
        </div>

    </div>

    

</div>
@endsection
