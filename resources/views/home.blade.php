@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-header"><a href="{{ route('notifications.list') }}" class="panel-lnk">INS Raw Data</a></div>
               <div class="card-body">
                   <rawlist></rawlist>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-header"><a href="{{ route('inventory.list') }}" class="panel-lnk">Re-order</a></div>
                <div class="card-body">
                    <reorderlist></reorderlist>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="margin:10px">
                <div class="card-header"><a href="{{ route('maropost.mpost') }}" class="panel-lnk">Maropost</a></div>
                <div class="card-body">
                    <marolist></marolist>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
