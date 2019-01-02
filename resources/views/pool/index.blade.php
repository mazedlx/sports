@extends('layouts.layout')

@section('content')
<h1>Pool</h1>
<ul class="list-reset">
@foreach(range(date('Y'), 2006) as $year)
    @if($year >= 2015)
        <li class="px-4 py-1">
            <a class="text-grey-darkest hover:no-underline" href="pool/{{ $year }}/{{ $locationIdOne }}">{{ $year }} WN I</a>
        </li>
        <li class="px-4 py-1">
            <a class="text-grey-darkest hover:no-underline" href="pool/{{ $year }}/{{ $locationIdTwo }}">{{ $year }} WN II</a>
        </li>
    @else
        <li class="px-4 py-1">
            <a class="text-grey-darkest hover:no-underline" href="pool/{{ $year }}/{{ $locationIdOne }}}">{{ $year }}</a>
        </li>
    @endif
@endforeach
</ul>
@endsection
