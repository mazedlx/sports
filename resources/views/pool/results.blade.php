@extends('layouts.app')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold">{{ $location->name }} {{ $year }}</h1>
    <h2 class="py-4 text-2xl font-semibold">Results</h2>

    <x-results
        :players="$players"
        :results="$results"
        :year="$year"
        :totalFrames="$totalFrames"
        :sums="$sums"
    />

    <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

        <x-ranking-table
            heading="Relatives Ranking"
            :data="$avgScores"
        />
        <x-ranking-table
            heading="Absolutes Ranking"
            :data="$totalScores"
        />
        <x-ranking-table
            heading="Ranking Max. Plus"
            :data="$maxPluses"
        />
        <x-ranking-table
            heading="Ranking Max. Minus"
            :data="$maxMinuses"
        />
        <x-ranking-table
            heading="Ranking Avg. Plus"
            :data="$avgPluses"
        />
        <x-ranking-table
            heading="Ranking Avg. Minus"
            :data="$avgMinuses"
        />

    @if ($location->id == 2)
        <x-payers-and-absentees-table
            heading="Wer hat wie oft bezahlt"
            :data="$payers"
            field="cnt"
        />
        <x-payers-and-absentees-table
            heading="Letzte Zahler"
            :data="$lastPayers"
            field="date"
        />
    @endif

        <x-payers-and-absentees-table
            heading="Wer hat wie oft gefehlt"
            :data="$absentees"
            field="cnt"
        />

    <x-performance :performances="$performances" />
    <x-performance-matrix :location="$location" :scores="$scores" />
    </div>
</div>
@endsection
