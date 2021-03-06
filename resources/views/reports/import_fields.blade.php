
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-12">
              <div class="card" style="margin:10px">
               <div class="card-header"><b>CSV Import</b></div>
               <div class="card-body" style="padding:20px">
                    <form class="form-horizontal" method="POST" action="{{ route('report.import_process') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
                        <input type="hidden" name="csv_file_source" value="{{ $info['csv_file_source'] }}" />

                        <table class="table">
                            @if (isset($csv_header_fields))
                            <tr>
                                @foreach ($csv_header_fields as $csv_header_field)
                                    <th>{{ $csv_header_field }}</th>
                                @endforeach
                            </tr>
                            @endif
                            @foreach ($csv_data as $row)
                                <tr>
                                @foreach ($row as $key => $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                                </tr>
                            @endforeach
                            <tr>
                                @foreach ($csv_data[0] as $key => $value)
                                    <td>
                                        <select name="fields[{{ $key }}]">

                                        @if ($info['csv_file_source'] == "transactions")
                                            @foreach (config('app.db_fields') as $db_field)
                                                <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                                    @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
                                            @endforeach
                                        @endif

                                        @if ($info['csv_file_source'] == "contacts")
                                            @foreach (config('app.db_contact_fields') as $db_field)
                                                <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                                    @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
                                            @endforeach
                                        @endif


                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                        </table>

                        <button type="submit" class="btn btn-primary">
                            Import Data
                        </button>
                    </form>
                </div>
            </div>

            </div>
        </div>


    </div>
@endsection