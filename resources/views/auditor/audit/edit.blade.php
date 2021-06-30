@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Audit') }} <a href="/audits"
                        class="btn btn-link btn-sm ml-5">Back</a>
                </div>

                <div class="card-body">
                    <form method="post" action="/audits/{{ $audit->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') ?? $audit->title }}" required
                                    autocomplete="Title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Reason') }}</label>

                            <div class="col-md-6">
                                <input id="reason" type="text"
                                    class="form-control @error('reason') is-invalid @enderror" name="reason"
                                    value="{{ old('reason') ?? $audit->reason }}" required autocomplete="Reason"
                                    autofocus>

                                @error('reason')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="audit_type"
                                class="col-md-4 col-form-label text-md-right">{{ __('Audit Type') }}</label>

                            <div class="col-md-6">
                                <select id="audit_type" name="audit_type"
                                    class="form-control @error('audit_type') is-invalid @enderror" name="audit_type">
                                    <option value="expense" @if( $audit->audit_type == 'expense') selected="selected"
                                        @endif>Expense</option>
                                    <option value="revenue" @if( $audit->audit_type == 'revenue') selected="selected"
                                        @endif>Revenue</option>
                                </select>

                                @error('audit_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number"
                                    class="form-control @error('amount') is-invalid @enderror" name="amount"
                                    value="{{ old('amount') ?? $audit->amount }}" required autocomplete="amount">

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Audit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
