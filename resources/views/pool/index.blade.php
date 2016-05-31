@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Pool</h1>
        <ul class="list-group">
        @for($i = date('Y'); $i >= 2006; $i--)
            @if($i >= 2015)
                <a class="list-group-item" href="pool/{{ $i }}/2">{{ $i }} WN I</a>
                <a class="list-group-item" href="pool/{{ $i }}/8">{{ $i }} WN II</a>
            @else
                <a class="list-group-item" href="pool/{{ $i }}/2">{{ $i }}</a>
            @endif
        @endfor
        </ul>
    </div>
</div>
@endsection
