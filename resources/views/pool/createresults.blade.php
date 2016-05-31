@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Pool Ergebnisse</h1>
        {!! Form::open(['action' => 'PoolController@storeResults', 'class' => 'form-horizontal']) !!}
        @foreach($players as $player)
            <div class="form-group">
                {!! Form::label('plus_' . $player->id, $player->firstname . ' ' . $player->name, ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-3 has-success">
                {!! Form::number('plus[' . $player->id . ']', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3 has-error">
                {!! Form::number('minus[' . $player->id . ']', 0, ['class' => 'form-control']) !!}
                </div>
            </div>
        @endforeach
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button type="submit" class="btn btn-primary">Weiter</button>
            </div>
        </div>
            {!! Form::hidden('day_id', $day_id) !!}
            {!! Form::hidden('location_id', $location_id) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
