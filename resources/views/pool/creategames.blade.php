@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Pool Ergebnisse</h1>
        {!! Form::open(['action' => 'PoolController@storeGames', 'class' => 'form-horizontal']) !!}
        @for($i = 0; $i < $frames; $i++)

        <div class="form-group">
            {!! Form::label('game_' . $i, 'Game #' . $i, ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-3">
            {!! Form::select('winner['.$i.']', $teams_id, null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-md-3">
            {!! Form::select('loser['.$i.']', $teams_id, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        @endfor
        <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
                <button type="submit" class="btn btn-lg btn-primary">Weiter</button>
            </div>
        </div>
        {!! Form::hidden('day_id', $day_id) !!}
        {!! Form::hidden('location_id', $location_id) !!}
        {!! Form::hidden('frames', $frames) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
