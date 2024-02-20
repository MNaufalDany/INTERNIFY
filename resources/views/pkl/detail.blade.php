<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data pembayaran - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h2 class="mb-3">History</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">DUDI</th>
                                        <th scope="col">TGL BAYAR</th>
                                        <th scope="col">TGL KELUAR</th>
                                        <th scope="col">NILAI</th>

                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($pkl as $pkls) --}}
                                    <tr>
                                        <td>{{ $pkl->siswa->nama}}</td>
                                        <td>{{ $pkl->siswa->kelas}}</td>
                                        <td>{{ $pkl->dudi->nama}}</td>
                                        <td>{{ $pkl->tgl_masuk }}</td>
                                        <td>{{ $pkl->tgl_keluar }}</td>
                                        <td>{{ $pkl->nilai }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pkl.edit', $pkl->id) }}" class="btn btn-sm btn-primary ml-1">EDIT</a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pkl.destroy', $pkl->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger ml-1">HAPUS</button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                                    {{-- @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Pembayaran belum Tersedia.</td>
                                    </tr> --}}
                                    {{-- @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>

</body>
</html>
