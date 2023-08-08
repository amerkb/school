@extends('layouts.master')
@section('css')

@section('title')
    inventory
@stop
@endsection

@section('content')
    <div class="card-header">
        <div class="row">
            <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Debit : </strong> {{ number_format($Debit)}}</h6></div>
            <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>credit : </strong> {{ number_format($credit) }}</h6></div>
            <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong> Account  : </strong> {{number_format($Debit - $credit) }}</h6></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>start date : </strong>{{ $first }}</h6></div>
            <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>end date : </strong> {{  $latest }}</h6></div>

</div>
    </div>
    <div class="card-body">
        <form   action="{{ route('inventory') }}" autocomplete="off">
            <div style="display:flex;justify-content: space-evenly;align-items: center">
        <div class="col-md-3">
            <div class="form-group">
                <label>{{('start date')}}  :</label>
                <input required class="form-control" type="date"   name="start" data-date-format="yyyy-mm-dd">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>{{('end date ')}}  :</label>
                <input required class="form-control" type="date"   name="end" data-date-format="yyyy-mm-dd">
            </div>
        </div>
        </div>
            <br>
        <div class="text-center">
            <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
        </div>

    </form>
            <span style="display: flex;justify-content: center;align-items: center
        ;font-size: 30px ; font-weight: bold"
            >credit</span>
        <div class="table-responsive mt-15">
            <table  class="table  table-hover table-sm table-bordered p-0"
                   data-page-length="50" style="text-align: center">
                <thead>
                <tr>
                    <th>#</th>

                    <th>{{ 'credit' }}</th>
                    <th>{{ 'statement' }}</th>
                    <th>{{ 'Created' }}</th>
                    <th>{{ 'Update' }}</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($creditD as $credit)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ number_format($credit->credit) }}</td>
                        <td>{{ $credit->description }}</td>
                        <td>{{ $credit->created_at }}</td>
                        <td>{{ $credit->updated_at }}</td>

                    </tr>
                @endforeach
            </table>
        </div>

        <span style="display: flex;justify-content: center;align-items: center
        ;font-size: 30px ; font-weight: bold"
        >Debit</span>
        <div class="table-responsive mt-15">
            <table  class="table  table-hover table-sm table-bordered p-0"
                    data-page-length="50" style="text-align: center">
                <thead>
                <tr>
                    <th>#</th>

                    <th>{{ 'Debit' }}</th>
                    <th>{{ 'statement' }}</th>
                    <th>{{ 'Created' }}</th>
                    <th>{{ 'Update' }}</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($DebitD as $Debit)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ number_format($Debit->Debit) }}</td>
                        <td>{{ $Debit->description }}</td>
                        <td>{{ $Debit->created_at }}</td>
                        <td>{{ $Debit->updated_at }}</td>

                    </tr>
                @endforeach
            </table>
        </div>


    </div>
@endsection

@section('js')

@endsection
