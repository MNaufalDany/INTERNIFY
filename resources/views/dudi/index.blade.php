<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="/dudi/create" class="btn btn-md btn-success mb-3">TAMBAH DUDI</a>
                        <a href="/siswa" class="btn btn-md btn-primary mb-3">DATA SISWA</a> 
                        <a href="/pkl" class="btn btn-md btn-info mb-3 ">INTERNSHIP</a>
                        <div class="table-responsive"> <!-- Added class for responsiveness -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dudi as $key => $dudis)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{ $dudis->nama }}</td>
                                        <td>{{ $dudis->ceo }}</td>
                                        <td>{{ $dudis->alamat }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ '/dudi/'. $dudis->id . '/edit'  }}" class="btn btn-sm btn-primary">EDIT</a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dudi.destroy', $dudis->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger ml-1">HAPUS</button> <!-- Added margin class -->
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Post belum Tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>  
                        </div>
                        <!-- Tambahkan bagian pagination di bawah tabel -->
                        {{ $dudi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
