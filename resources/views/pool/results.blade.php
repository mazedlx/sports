@extends('layouts.layout')

@section('content')
<div class="row">
    <h1>{{ $location->name }} {{ $year }}</h1>
</div>
<div class="row">
    <h4>Results</h4>
    <table class="table table-hover table-bordered">
        <thead>
            <th>Datum</th>
        @foreach($players as $player)
            <th colspan="2">
                {{ $player->firstname }} {{ $player->name }}
            </th>
        @endforeach
            <th>Frames</th>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td><a href="/game/{{ $result->day()->first()->id }}">{{ $result->day()->first()->date->format('d.m.Y') }}</a></td>

                @foreach($players as $player)
                <td>{{ $result->ofPlayer($player->id)->ofDay($result->day()->first()->id)->get()->first()->plus }}</td>
                <td>{{ $result->ofPlayer($player->id)->ofDay($result->day()->first()->id)->get()->first()->minus }}</td>
                @endforeach
                <td>{{ $result->day()->first()->frames }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                @foreach($players as $player)
                <td>{{ $result->hasLocation($result->id_location)->ofPlayer($player->id)->ofYear($year)->sum('plus') }}</td>
                <td>{{ $result->hasLocation($result->id_location)->ofPlayer($player->id)->ofYear($year)->sum('minus') }}</td>
                @endforeach
                <td>{{ $totalFrames }}</td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="row">
    <div class="col-md-4">
        <h4>Relatives Ranking</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($scores_avg as $key => $score_avg)
                <tr>
                    <td>{{ $score_avg['0'] }}</td>
                    <td>{{ $score_avg['1'] }}</td>
                    <td>{{ $score_avg['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Absolutes Ranking</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($scores_total as $key => $score_total)
                <tr>
                    <td>{{ $score_total['0'] }}</td>
                    <td>{{ $score_total['1'] }}</td>
                    <td>{{ $score_total['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Ranking Max. Plus</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($max_pluses  as $key => $max_plus)
                <tr>
                    <td>{{ $max_plus['0'] }}</td>
                    <td>{{ $max_plus['1'] }}</td>
                    <td>{{ $max_plus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h4>Ranking Max. Minus</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($max_minuses  as $key => $max_minus)
                <tr>
                    <td>{{ $max_minus['0'] }}</td>
                    <td>{{ $max_minus['1'] }}</td>
                    <td>{{ $max_minus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Ranking Avg. Plus</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($avg_pluses  as $key => $avg_plus)
                <tr>
                    <td>{{ $avg_plus['0'] }}</td>
                    <td>{{ $avg_plus['1'] }}</td>
                    <td>{{ $avg_plus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Ranking Avg. Minus</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Pos</th>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                @foreach($avg_minuses  as $key => $avg_minus)
                <tr>
                    <td>{{ $avg_minus['0'] }}</td>
                    <td>{{ $avg_minus['1'] }}</td>
                    <td>{{ $avg_minus['2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
@if($location->id == 2)
    <div class="col-md-4">
        <h4>Wer hat wie oft bezahlt</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>hat wie oft bezahlt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payers as $payer)
                <tr>
                    <td>{{ $payer->playername }}</td>
                    <td>{{ $payer->cnt }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Letzte Zahler</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>hat bezahlt am</th>
                </tr>
            </thead>
            <tbody>
                @foreach($last_payers as $payer)
                <tr>
                    <td>{{ $payer->playername }}</td>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $payer->date)->format('d.m.Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
    <div class="col-md-4">
        <h4>Wer hat wie oft gefehlt</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Name</th>
                <th>hat wie oft gefehlt</th>
            </thead>
            <tbody>
                @foreach($absentees  as $absent)
                <tr>
                    <td>{{ $absent->playername }}</td>
                    <td>{{ $absent->cnt }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Team</th>
                    <th>Performance</th>
                    <th>Siege</th>
                    <th>Niederlagen</th>
                </tr>
            </thead>
            <tbody>
            @foreach($performances as $team => $performance)
            <tr>
                <td>{{ $team }}</td>
                <td>{{ $performance['score'] }}</td>
                <td>{{ $performance['plus'] }}</td>
                <td>{{ $performance['minus'] }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-hover">
            <thead>
            @if($location->id == 2)
                <tr>
                    <th></th>
                    <th>B</th>
                    <th>C</th>
                    <th>K</th>
                    <th>M</th>
                    <th>S</th>
                    <th>W</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>B</td>
                    <td>{!! $scores['B'] !!}</td>
                    <td>{!! $scores['BC'] !!}</td>
                    <td>{!! $scores['BK'] !!}</td>
                    <td>{!! $scores['BM'] !!}</td>
                    <td>{!! $scores['BS'] !!}</td>
                    <td>{!! $scores['BW'] !!}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{!! $scores['BC'] !!}</td>
                    <td>{!! $scores['C'] !!}</td>
                    <td>{!! $scores['CK'] !!}</td>
                    <td>{!! $scores['CM'] !!}</td>
                    <td>{!! $scores['CS'] !!}</td>
                    <td>{!! $scores['CW'] !!}</td>
                </tr>
                <tr>
                    <td>K</td>
                    <td>{!! $scores['BK'] !!}</td>
                    <td>{!! $scores['CK'] !!}</td>
                    <td>{!! $scores['K'] !!}</td>
                    <td>{!! $scores['KM'] !!}</td>
                    <td>{!! $scores['KS'] !!}</td>
                    <td>{!! $scores['KW'] !!}</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>{!! $scores['BM'] !!}</td>
                    <td>{!! $scores['CM'] !!}</td>
                    <td>{!! $scores['KM'] !!}</td>
                    <td>{!! $scores['M'] !!}</td>
                    <td>{!! $scores['MS'] !!}</td>
                    <td>{!! $scores['MW'] !!}</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>{!! $scores['BS'] !!}</td>
                    <td>{!! $scores['CS'] !!}</td>
                    <td>{!! $scores['KS'] !!}</td>
                    <td>{!! $scores['MS'] !!}</td>
                    <td>{!! $scores['S'] !!}</td>
                    <td>{!! $scores['SW'] !!}</td>
                </tr>
                <tr>
                    <td>W</td>
                    <td>{!! $scores['BW'] !!}</td>
                    <td>{!! $scores['CW'] !!}</td>
                    <td>{!! $scores['KW'] !!}</td>
                    <td>{!! $scores['MW'] !!}</td>
                    <td>{!! $scores['SW'] !!}</td>
                    <td>{!! $scores['W'] !!}</td>
                </tr>
            </tbody>
            @elseif($location->id == 8)
                <tr>
                    <th></th>
                    <th>B</th>
                    <th>C</th>
                    <th>Ma</th>
                    <th>Mo</th>
                    <th>MoP</th>
                    <th>P</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>B</td>
                    <td>{!! $scores['B'] !!}</td>
                    <td>{!! $scores['BC'] !!}</td>
                    <td>{!! $scores['BMa'] !!}</td>
                    <td>{!! $scores['BMo'] !!}</td>
                    <td>{!! $scores['BMoP'] !!}</td>
                    <td>{!! $scores['BP'] !!}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{!! $scores['BC'] !!}</td>
                    <td>{!! $scores['C'] !!}</td>
                    <td>{!! $scores['CMa'] !!}</td>
                    <td>{!! $scores['CMo'] !!}</td>
                    <td> - </td>
                    <td>{!! $scores['CP'] !!}</td>
                </tr>
                <tr>
                    <td>Ma</td>
                    <td>{!! $scores['BMa'] !!}</td>
                    <td>{!! $scores['CMa'] !!}</td>
                    <td>{!! $scores['Ma'] !!}</td>
                    <td>{!! $scores['MaMo'] !!}</td>
                    <td> - </td>
                    <td>{!! $scores['MaP'] !!}</td>
                </tr>
                <tr>
                    <td>Mo</td>
                    <td>{!! $scores['BMo'] !!}</td>
                    <td>{!! $scores['CMo'] !!}</td>
                    <td>{!! $scores['MaMo'] !!}</td>
                    <td>{!! $scores['Mo'] !!}</td>
                    <td> - </td>
                    <td>{!! $scores['MoP'] !!}</td>
                </tr>
                <tr>
                    <td>MoP</td>
                    <td>{!! $scores['MoP'] !!}</td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                </tr>
                <tr>
                    <td>P</td>
                    <td>{!! $scores['BP'] !!}</td>
                    <td>{!! $scores['CP'] !!}</td>
                    <td>{!! $scores['MaMo'] !!}</td>
                    <td>{!! $scores['MaP'] !!}</td>
                    <td> - </td>
                    <td>{!! $scores['P'] !!}</td>
                </tr>
            </tbody>
            @endif
        </table>
    </div>
</div>
<script>
$('td, th').css('text-align', 'center');
$('[data-top="1"]').closest('td').addClass('bg-success');
$('[data-top="2"]').closest('td').addClass('bg-info');
$('[data-top="last"]').closest('td').addClass('bg-danger');
$('[data-top="penultimate"]').closest('td').addClass('bg-warning');
</script>
@endsection
