<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>NISN</th>
        <th>Status Bayar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($agen as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->nisn }}</td>
            <td>{{ $item->payment->status_payment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>