@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Peminjaman</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Judul</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Penerbit</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Penulis</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Stok Buku</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bukus as $buku)
                                            <tr>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->judul }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->penerbit }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->pengarang }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->stok_buku }}</p>
                                                </td>
                                                <td class="d-flex gap-3">
                                                    <button type="button" class="btn bg-gradient-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editBuku_{{ $buku->id }}"
                                                        data-book-id="{{ $buku->id }}">
                                                        Edit
                                                    </button>
                                                    @include('partials.buku.edit_buku')
                                                    <form action="{{ route('buku.delete', $buku->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
