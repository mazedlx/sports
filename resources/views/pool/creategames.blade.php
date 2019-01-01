@extends('layouts.layout')

@section('content')
<div class="w-1/2">
    <h1>Pool Ergebnisse</h1>
    {!! Form::open(['action' => 'PoolController@storeGames']) !!}
    @foreach(range(0, $frames-1) as $frame)
        <div class="flex items-center justify-between py-1">
            <label for="">Game #{{ $frame }}</label>
            <select name="winner[]">
            @foreach ($teams as $id => $team)
                <option value="{{ $id }}">{{ $team }}</option>
            @endforeach
            </select>
            <select name="loser[]">
            @foreach ($teams as $id => $team)
                <option value="{{ $id }}">{{ $team }}</option>
            @endforeach
            </select>
            <input type="hidden" name="frame[]" value="{{ $frame }}">
        </div>
    @endforeach
        <div class="flex justify-end items-center py-4">
            <button type="submit" class="border px-4 py-2">Weiter</button>
        </div>
        <input type="hidden" name="day_id" value="{{ $day->id }}">
        <input type="hidden" name="location_id" value="{{ $location->id }}">
        <input type="hidden" name="frames" value="{{ $frames }}">
    {!! Form::close() !!}
</div>
@endsection
