@props(['location', 'scores'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Performance-Matrix</h2>
    <table>
        <thead>
        @if ($location->id == 2)
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
        @elseif ($location->id == 8)
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
