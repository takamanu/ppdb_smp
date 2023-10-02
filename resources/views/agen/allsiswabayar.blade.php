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
            <td>{{ $agen->name }}</td>
            <td>{{ $agen->email }}</td>
            <td>{{ $agen->nisn }}</td>
            <td>{{ $agen->payment->status_payment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>