<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>NISN</th>
        <th>Status Lulus</th>
    </tr>
    </thead>
    <tbody>
    @foreach($agen as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nisn }}</td>
            <td>{{ $item->nilai->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>