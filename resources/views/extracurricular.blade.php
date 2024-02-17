@extends("layouts.main")

@section('content')

    <table class="table table-striped-columns">
        <thead>
        <tr>
            <th scope="col" class="table-dark">Nomor </th>
            <th scope="col" class="table-dark">Nama</th>
            <th scope="col" class="table-dark">Nama Pembina</th>
            <th scope="col" class="table-dark">Deskripsi</th>
        </tr>
        </thead>
        <tbody>
        @php
            $nomor = 1;
        @endphp
        @foreach($extracurricular as $extra)
            <tr>
                <th scope="row" class="table-secondary">{{ $nomor++ }}</th>
                <td class="table-warning">{{ $extra['nama'] }}</td>
                <td class="table-warning">{{ $extra['nama_pembina'] }}</td>
                <td class="table-warning">{{ $extra['deskripsi'] }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection

