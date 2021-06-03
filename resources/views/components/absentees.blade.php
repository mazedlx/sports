@props(['absentees'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Wer hat wie oft gefehlt</h2>
    <table>
        <thead>
            <th>Name</th>
            <th>hat wie oft gefehlt</th>
        </thead>
        <tbody>
            @foreach ($absentees as $absent)
            <tr>
                <td>{{ $absent->name }}</td>
                <td>{{ $absent->cnt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
