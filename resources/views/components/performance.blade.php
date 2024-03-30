<div class="col-span-2">
    <h2 class="py-4 text-2xl font-semibold">Performance</h2>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Team</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Performance</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Siege</th>
                            <th
                                scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                            >Niederlagen</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($performances as $team => $performance)
                        <tr class="@if($loop->index % 2 === 0) bg-white @else bg-gray-50 @endif">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $team }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $performance['score'] }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $performance['plus'] }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $performance['minus'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
