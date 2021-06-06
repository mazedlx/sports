@extends('layouts.app')

@section('content')
<h1>Pool Ergebnisse</h1>
<form action="{{ route('results.store') }}" method="POST">
    @csrf
    <div class="w-1/2">
    @foreach ($players as $player)
        <div class="flex items-center justify-between py-2">
            <label for="" class="w-1/3">{{ $player->fullName }}</label>
            <input class="w-1/3 border px-4 py-2" type="number" name="plus[]" value="0">
            <input class="w-1/3 border px-4 py-2" type="number" name="minus[]" value="0">
            <input type="hidden" name="player[]" value="{{ $player->id }}">
        </div>
        @endforeach
        <div class="flex justify-end py-2">
            <button type="submit" class="border px-4 py-2">Weiter</button>
        </div>

        <input type="hidden" name="day_id" value="{{ $day->id }}">
        <input type="hidden" name="location_id" value="{{ $location->id }}">
    </div>
</form>
@endsection
