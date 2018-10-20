@extends('layouts.app')

@section('content')
<div class="container-fluid padding_">
    <div class="row no-gutters justify-content-center">


        <div class="col-md-3">
            <div class="card" style="margin:10px">
                <div class="card-header"><a href="{{ route('notifications.list') }}">INS Raw Data</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><br><br></p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card" style="margin:10px">
                <div class="card-header"><a href="{{ route('inventory.list') }}">Inventory</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p><br><br></p> 
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card" style="margin:10px">
                <div class="card-header">Re-order</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><br><br></p>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
