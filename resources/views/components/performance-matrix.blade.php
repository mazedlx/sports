@props(['location', 'scores'])

<div class="col-span-2">
    <h2 class="py-4 text-2xl font-semibold">Performance-Matrix</h2>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
        @if ($location->id == 2)
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            ></th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >B</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >C</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >K</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >M</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >S</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >W</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">B</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['B'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BC'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BK'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BW'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">C</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BC'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['C'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CK'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CW'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">K</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BK'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CK'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['K'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KW'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">M</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KM'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['M'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MW'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">S</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MS'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['S'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['SW'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">W</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BW'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CW'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['KW'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MW'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['SW'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['W'] !!}</td>
                        </tr>
                    </tbody>
                    @elseif ($location->id == 8)
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            ></th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >B</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >C</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Ma</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Mo</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >MoP</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >P</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">B</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['B'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BC'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BMa'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BMoP'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BP'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">C</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BC'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['C'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CMa'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CP'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Ma</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BMa'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CMa'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['Ma'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MaMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MaP'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">Mo</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MaMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['Mo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MoP'] !!}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">MoP</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MoP'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">P</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['BP'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['CP'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MaMo'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['MaP'] !!}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap"> - </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{!! $scores['P'] !!}</td>
                        </tr>
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
