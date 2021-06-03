@extends('layouts.app')

@section('content')
<div class="w-5/6 mx-auto">
    <h1 class="text-3xl font-bold">{{ $location->name }} {{ $year }}</h1>
    <h2 class="py-4 text-2xl font-semibold">Results</h2>

    <x-results :players="$players" :results="$results" :year="$year" :totalFrames="$totalFrames"/>

    <div class="flex flex-wrap w-full">
        <x-relative-ranking :avgScores="$avgScores" />
        <x-absolute-ranking :totalScores="$totalScores" />
        <x-max-pluses :maxPluses="$maxPluses" />
        <x-max-minuses :maxMinuses="$maxMinuses" />
        <x-avg-pluses :avgPluses="$avgPluses" />
        <x-avg-minus :avgMinuses="$avgMinuses" />

    @if ($location->id == 2)
        <x-payers :payers="$payers" />
        <x-last-payers :lastPayers="$lastPayers" />
    @endif

        <x-absentees :absentees="$absentees" />
        <x-performance :performances="$performances" />
        <x-performance-matrix :location="$location" :scores="$scores" />
    </div>
</div>
@endsection
