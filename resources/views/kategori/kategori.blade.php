@extends('layouts.master')

@section('content')
<div class="container py-4 px-5 lg-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
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
                                        <td class=text-center>
                                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-primary">                                                                                    
                                        <i class="fa fa-solid fa-pen-square"></i>
                                        </a>
                                        <td class=text-center>                                    
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