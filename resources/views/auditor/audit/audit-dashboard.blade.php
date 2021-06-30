@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Audit Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <p class="h6">Total Expense</p>
                            <p class="font-weight-bold h3">{{ $total_expense }}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="h6">Total Revenue</p>
                            <p class="font-weight-bold h3">{{ $total_revenue }}</p>
                        </div>
                        <hr />
                        <div class="col-md-12 text-center">
                            <p class="h6">Total</p>
                            <p class="font-weight-bold h3">{{ $total_revenue - $total_expense }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
