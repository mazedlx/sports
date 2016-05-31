@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Pool Ergebnisse</h1>
        {!! Form::open(['action' => 'PoolController@storeDay', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('location', 'Gruppe', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-6">
                {!! Form::select('location_id', $locations_id, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('date', 'Datum', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-6">
                {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('frames', 'Frames', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-6">
                {!! Form::number('frames', null, ['class' => 'form-control', 'required' => 'required', 'min' => 1]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('id_payer', 'Bezahlt hat', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-6">
                {!! Form::select('id_payer', $payers_id, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-6">
                    <button type="submit" class="btn btn-primary btn-lg">Weiter</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
