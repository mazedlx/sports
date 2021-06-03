@extends('layouts.layout')

@section('content')
<h1>Pool Ergebnisse</h1>
<form action="{{ route('games.store') }}" method="POST">
    @csrf
    <div class="w-1/2">
    @foreach (range(0, $frames-1) as $frame)
        <div class="flex items-center justify-between py-2">
            <label class="w-1/3" for="">Game #{{ $frame }}</label>
            <select class="w-1/3" name="winner[]">
            @foreach ($teams as $id => $team)
                <option value="{{ $id }}">{{ $team }}</option>
            @endforeach
            </select>
            <select class="w-1/3" name="loser[]">
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
    </div>
</form>
@endsection
