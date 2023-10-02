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
            <td>{{ $agen->name }}</td>
            <td>{{ $agen->email }}</td>
            <td>{{ $agen->nisn }}</td>
            <td>{{ $agen->nilai->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>