@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="mb-4">
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                + Tambah Data Kategori
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama Kategori</th>
                                    <th class="col-1 px-4 py-2">Edit</th>
                                    <th class="col-1 px-4 py-2">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $k)
                                    <tr>
                                        <td class="px-4 py-2">{{ $k->nama_kategori }}</td>
                                        <td>
                                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-primary">                                                                                    
                                        <i class="fa fa-solid fa-pen-square"></i>
                                        </a>
                                        <td>                                    
                                        <form action="{{route('kategori.hapus', $k->id) }}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class ="btn btn-danger">
                                        <i class="fa fa-solid fa-trash"></i>
                                        </button>
                                        </form>                    
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
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