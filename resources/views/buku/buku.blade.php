@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Buku</div>

                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                                + Tambah Data Buku
                            </a>
                        </div>

                        

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Penulis</th>
                                    <th class="text-center">Penerbit</th>
                                    <th class="text-center">Tahun Terbit</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buku as $b)
                                    <tr>
                                        <td class="text-center">
                                        <img src="{{asset('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                                        </td>
                                        
                                        
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->penulis }}</td>
                                        <td>{{ $b->penerbit }}</td>
                                        <td>{{ $b->tahun_terbit }}</td>
                                    <td>
                                    <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-primary" sty>                                                                                    
                                        <i class="fa fa-solid fa-pen-square"></i>
                                    
                                        </a>
                                        <td>
                                        <form action="{{route('buku.hapus', $b->id) }}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class ="btn btn-danger">
                                        <i class="fa fa-solid fa-trash"></i>
                                        
                                        </button>
                                        </form>         
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection