@extends('layouts.app')

@section('content')
<div class="w-5/6 mx-auto">
    <h1 class="text-3xl font-bold">Pool</h1>
    <div class="flex flex-col space-y-2">
    @foreach (range(date('Y'), 2006) as $year)
        @if ($year >= 2015)
        <a class="text-lg underline" href="pool/{{ $year }}/{{ $locationIdOne }}">{{ $year }} WN I</a>
        <a class="text-lg underline" href="pool/{{ $year }}/{{ $locationIdTwo }}">{{ $year }} WN II</a>
        @else
        <a class="text-lg underline" href="pool/{{ $year }}/{{ $locationIdOne }}}">{{ $year }}</a>
        @endif
    @endforeach
    </div>
</div>
@endsection
