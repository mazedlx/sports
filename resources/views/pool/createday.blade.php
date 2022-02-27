@extends('layouts.app')

@section('content')
<form action="{{ route('days.store') }}" method="POST">
    @csrf
    <div class="w-1/2">
        <div class="flex items-center justify-between py-2">
            <label for="" class="w-1/4">Gruppe</label>
            <select name="location_id" class="w-3/4">
            @foreach ($locations as $id => $location)
                <option value="{{ $id }}">{{ $location }}</option>
            @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between py-2">
            <label for="" class="w-1/4">Datum</label>
            <input class="w-3/4 px-4 py-2 border" type="date" name="date" value="{{ date('Y-m-d') }}">
        </div>

        <div class="flex items-center justify-between py-2">
            <label for="" class="w-1/4">Frames</label>
            <input class="w-3/4 px-4 py-2 border" type="number" name="frames" min="1">
        </div>

        <div class="flex items-center justify-between py-2">
            <label for="" class="w-1/4">Bezahlt hat</label>
            <select class="w-3/4" name="id_payer">
            @foreach ($players as $id => $player)
                <option value="{{ $id }}">{{ $player }}</option>
            @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end py-2">
            <button type="submit" class="px-4 py-2 border hover:bg-grey-800 hover:text-white">Weiter</button>
        </div>
    </div>
</form>
@endsection
