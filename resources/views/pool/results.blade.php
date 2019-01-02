@extends('layouts.layout')

@section('content')
<h1>{{ $location->name }} {{ $year }}</h1>
<div class="px-4">
    <h2 class="py-4">Results</h2>
    <table class="table table-auto border">
        <thead>
            <th class="cell">Datum</th>
        @foreach($players as $player)
            <th class="cell" colspan="2">
                {{ $player->fullName }}
            </th>
        @endforeach
            <th class="cell">Frames</th>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td class="cell">
                    <a data-toggle="modal" data-target="#modal-games" data-url="/game/{{ $result->day()->first()->id }}">
                        {{ $result->day()->first()->date->format('d.m.Y') }}
                    </a>
                </td>
            @foreach($players as $player)
                <td class="cell">{{ $result->ofPlayer($player)->ofDay($result->day()->first())->get()->first()->plus }}</td>
                <td class="cell">{{ $result->ofPlayer($player)->ofDay($result->day()->first())->get()->first()->minus }}</td>
            @endforeach
                <td class="cell">{{ $result->day()->first()->frames }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="cell">Gesamt</th>
            @foreach($players as $player)
                <th class="cell">{{ $results->first()->ofPlayer($player)->ofYear($year)->sum('plus') }}</th>
                <th class="cell">{{ $results->first()->ofPlayer($player)->ofYear($year)->sum('minus') }}</th>
            @endforeach
                <th class="cell">{{ $totalFrames }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="flex flex-wrap w-full">
    <div class="px-4">
        <h2 class="py-4">Relatives Ranking</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($scores_avg as $score_avg)
                <tr>
                    <td class="cell">{{ $score_avg['0'] }}</td>
                    <td class="cell">{{ $score_avg['1'] }}</td>
                    <td class="cell">{{ $score_avg['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Absolutes Ranking</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($scores_total as $score_total)
                <tr>
                    <td class="cell">{{ $score_total['0'] }}</td>
                    <td class="cell">{{ $score_total['1'] }}</td>
                    <td class="cell">{{ $score_total['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Ranking Max. Plus</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($max_pluses  as $max_plus)
                <tr>
                    <td class="cell">{{ $max_plus['0'] }}</td>
                    <td class="cell">{{ $max_plus['1'] }}</td>
                    <td class="cell">{{ $max_plus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Ranking Max. Minus</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($max_minuses  as $max_minus)
                <tr>
                    <td class="cell">{{ $max_minus['0'] }}</td>
                    <td class="cell">{{ $max_minus['1'] }}</td>
                    <td class="cell">{{ $max_minus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Ranking Avg. Plus</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($avg_pluses  as $avg_plus)
                <tr>
                    <td class="cell">{{ $avg_plus['0'] }}</td>
                    <td class="cell">{{ $avg_plus['1'] }}</td>
                    <td class="cell">{{ $avg_plus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Ranking Avg. Minus</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Pos</th>
                <th class="cell">Name</th>
                <th class="cell">Score</th>
            </thead>
            <tbody>
                @foreach($avg_minuses  as $avg_minus)
                <tr>
                    <td class="cell">{{ $avg_minus['0'] }}</td>
                    <td class="cell">{{ $avg_minus['1'] }}</td>
                    <td class="cell">{{ $avg_minus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($location->id == 2)
    <div class="px-4">
        <h2 class="py-4">Wer hat wie oft bezahlt</h2>
        <table class="table table-auto border">
            <thead>
                <tr>
                    <th class="cell">Name</th>
                    <th class="cell">hat wie oft bezahlt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payers as $payer)
                <tr>
                    <td class="cell">{{ $payer->name }}</td>
                    <td class="cell">{{ $payer->cnt }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Letzte Zahler</h2>
        <table class="table table-auto border">
            <thead>
                <tr>
                    <th class="cell">Name</th>
                    <th class="cell">hat bezahlt am</th>
                </tr>
            </thead>
            <tbody>
            @foreach($last_payers as $payer)
                <tr>
                    <td class="cell">{{ $payer->name }}</td>
                    <td class="cell">{{ $payer->date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

    <div class="px-4">
        <h2 class="py-4">Wer hat wie oft gefehlt</h2>
        <table class="table table-auto border">
            <thead>
                <th class="cell">Name</th>
                <th class="cell">hat wie oft gefehlt</th>
            </thead>
            <tbody>
                @foreach($absentees  as $absent)
                <tr>
                    <td class="cell">{{ $absent->name }}</td>
                    <td class="cell">{{ $absent->cnt }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Performance</h2>
        <table class="table table-auto border">
            <thead>
                <tr>
                    <th class="cell">Team</th>
                    <th class="cell">Performance</th>
                    <th class="cell">Siege</th>
                    <th class="cell">Niederlagen</th>
                </tr>
            </thead>
            <tbody>
            @foreach($performances as $team => $performance)
                <tr>
                    <td class="cell">{{ $team }}</td>
                    <td class="cell">{{ $performance['score'] }}</td>
                    <td class="cell">{{ $performance['plus'] }}</td>
                    <td class="cell">{{ $performance['minus'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-4">
        <h2 class="py-4">Performance-Matrix</h2>
        <table class="table table-auto border">
            <thead>
            @if($location->id == 2)
                <tr>
                    <th class="cell"></th>
                    <th class="cell">B</th>
                    <th class="cell">C</th>
                    <th class="cell">K</th>
                    <th class="cell">M</th>
                    <th class="cell">S</th>
                    <th class="cell">W</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cell">B</td>
                    <td class="cell">{!! $scores['B'] !!}</td>
                    <td class="cell">{!! $scores['BC'] !!}</td>
                    <td class="cell">{!! $scores['BK'] !!}</td>
                    <td class="cell">{!! $scores['BM'] !!}</td>
                    <td class="cell">{!! $scores['BS'] !!}</td>
                    <td class="cell">{!! $scores['BW'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">C</td>
                    <td class="cell">{!! $scores['BC'] !!}</td>
                    <td class="cell">{!! $scores['C'] !!}</td>
                    <td class="cell">{!! $scores['CK'] !!}</td>
                    <td class="cell">{!! $scores['CM'] !!}</td>
                    <td class="cell">{!! $scores['CS'] !!}</td>
                    <td class="cell">{!! $scores['CW'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">K</td>
                    <td class="cell">{!! $scores['BK'] !!}</td>
                    <td class="cell">{!! $scores['CK'] !!}</td>
                    <td class="cell">{!! $scores['K'] !!}</td>
                    <td class="cell">{!! $scores['KM'] !!}</td>
                    <td class="cell">{!! $scores['KS'] !!}</td>
                    <td class="cell">{!! $scores['KW'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">M</td>
                    <td class="cell">{!! $scores['BM'] !!}</td>
                    <td class="cell">{!! $scores['CM'] !!}</td>
                    <td class="cell">{!! $scores['KM'] !!}</td>
                    <td class="cell">{!! $scores['M'] !!}</td>
                    <td class="cell">{!! $scores['MS'] !!}</td>
                    <td class="cell">{!! $scores['MW'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">S</td>
                    <td class="cell">{!! $scores['BS'] !!}</td>
                    <td class="cell">{!! $scores['CS'] !!}</td>
                    <td class="cell">{!! $scores['KS'] !!}</td>
                    <td class="cell">{!! $scores['MS'] !!}</td>
                    <td class="cell">{!! $scores['S'] !!}</td>
                    <td class="cell">{!! $scores['SW'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">W</td>
                    <td class="cell">{!! $scores['BW'] !!}</td>
                    <td class="cell">{!! $scores['CW'] !!}</td>
                    <td class="cell">{!! $scores['KW'] !!}</td>
                    <td class="cell">{!! $scores['MW'] !!}</td>
                    <td class="cell">{!! $scores['SW'] !!}</td>
                    <td class="cell">{!! $scores['W'] !!}</td>
                </tr>
            </tbody>
            @elseif($location->id == 8)
                <tr>
                    <th class="cell"></th>
                    <th class="cell">B</th>
                    <th class="cell">C</th>
                    <th class="cell">Ma</th>
                    <th class="cell">Mo</th>
                    <th class="cell">MoP</th>
                    <th class="cell">P</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cell">B</td>
                    <td class="cell">{!! $scores['B'] !!}</td>
                    <td class="cell">{!! $scores['BC'] !!}</td>
                    <td class="cell">{!! $scores['BMa'] !!}</td>
                    <td class="cell">{!! $scores['BMo'] !!}</td>
                    <td class="cell">{!! $scores['BMoP'] !!}</td>
                    <td class="cell">{!! $scores['BP'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">C</td>
                    <td class="cell">{!! $scores['BC'] !!}</td>
                    <td class="cell">{!! $scores['C'] !!}</td>
                    <td class="cell">{!! $scores['CMa'] !!}</td>
                    <td class="cell">{!! $scores['CMo'] !!}</td>
                    <td class="cell"> - </td>
                    <td class="cell">{!! $scores['CP'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">Ma</td>
                    <td class="cell">{!! $scores['BMa'] !!}</td>
                    <td class="cell">{!! $scores['CMa'] !!}</td>
                    <td class="cell">{!! $scores['Ma'] !!}</td>
                    <td class="cell">{!! $scores['MaMo'] !!}</td>
                    <td class="cell"> - </td>
                    <td class="cell">{!! $scores['MaP'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">Mo</td>
                    <td class="cell">{!! $scores['BMo'] !!}</td>
                    <td class="cell">{!! $scores['CMo'] !!}</td>
                    <td class="cell">{!! $scores['MaMo'] !!}</td>
                    <td class="cell">{!! $scores['Mo'] !!}</td>
                    <td class="cell"> - </td>
                    <td class="cell">{!! $scores['MoP'] !!}</td>
                </tr>
                <tr>
                    <td class="cell">MoP</td>
                    <td class="cell">{!! $scores['MoP'] !!}</td>
                    <td class="cell"> - </td>
                    <td class="cell"> - </td>
                    <td class="cell"> - </td>
                    <td class="cell"> - </td>
                    <td class="cell"> - </td>
                </tr>
                <tr>
                    <td class="cell">P</td>
                    <td class="cell">{!! $scores['BP'] !!}</td>
                    <td class="cell">{!! $scores['CP'] !!}</td>
                    <td class="cell">{!! $scores['MaMo'] !!}</td>
                    <td class="cell">{!! $scores['MaP'] !!}</td>
                    <td class="cell"> - </td>
                    <td class="cell">{!! $scores['P'] !!}</td>
                </tr>
            </tbody>
            @endif
        </table>
    </div>
</div>


{{-- <div class="modal fade" id="modal-games">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title">Games</h2>

        <div class="modal-body">


        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Schlie&szlig;en</button> --}}




{{-- <script>
$('td, th').css('text-align', 'center');
$('[data-top="1"]').closest('td').addClass('bg-success');
$('[data-top="2"]').closest('td').addClass('bg-info');
$('[data-top="last"]').closest('td').addClass('bg-danger');
$('[data-top="penultimate"]').closest('td').addClass('bg-warning');
$('[data-toggle="modal"]').click(function() {
var that = $(this);
$.ajax({
    url: that.attr('data-url')
}).done(function(content) {
    $('.modal-body').html(content);
    $('.modal-title').html('Games ' + that.html());
});
}).css('cursor','pointer');
</script> --}}
@endsection
