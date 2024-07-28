<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Siswa</title>

        <style>
            .table {
                width: 100%;
            }

            .table-border {
                border: 1px solid black;
                border-collapse: collapse;
                border-spacing: 0;
            }

            .table-border td,
            .table-border th {
                border: 1px solid black;
                margin: 0;
                padding: 8px 10px;
            }

            .company-details {
                margin: auto;
            }

            .company-details h1 {
                margin: 0;
                font-size: 24px;
                text-align: center;
            }

            .company-details p {
                margin: 5px 0;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <table style="width: 100%">
            <tr>
                <td class="company-details">
                    <h1>Smartgama</h1>
                    <p>Jl. Raya Nguter, Sukoharjo, RT. 01, RW. 05.</p>
                    {{-- <p>Telepon: (021) 123-4567 | Email: info@pendaftaranbimbelsmartgama.com</p> --}}
                    <p>Website: https://pendaftaranbimbelsmartgama.my.id</p>
                </td>
            </tr>
        </table>

        <hr>

        <h3>Data Siswa</h3>

        <p>Dengan hormat,</p>
        <p>Berikut ini adalah daftar data siswa:</p>

        <table class="table">
            <tr>
                <td>Tanggal Cetak</td>
                <td>:</td>
                <td>{{ now()->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>:</td>
                <td>{{ $branch?->nama ?? 'Semua Cabang' }}</td>
            </tr>
            <tr>
                <td>Program</td>
                <td>:</td>
                <td>{{ $program?->nama ?? 'Semua Program' }}</td>
            </tr>
            @if ($request->filled('since'))
                <tr>
                    <td>Sejak</td>
                    <td>:</td>
                    <td>{{ $request->get('since') }}</td>
                </tr>
            @endif
            @if ($request->filled('until'))
                <tr>
                    <td>Sampai</td>
                    <td>:</td>
                    <td>{{ $request->get('until') }}</td>
                </tr>
            @endif
        </table>

        <br>

        <table class="table-border table">
            <thead>
                <tr>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Asal Sekolah</th>
                    <th>Program</th>
                    <th>Cabang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->asal_sekolah }}</td>
                        <td>{{ $item->registration?->program?->nama }}</td>
                        <td>{{ $item->registration?->branch?->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        <p>Hormat kami,</p>

        <br>

        <div style="max-width: 300px">
            <br><br><br><br>
            <p style="">{{ auth()->user()->userable->nama }}</p>
        </div>
    </body>

</html>
