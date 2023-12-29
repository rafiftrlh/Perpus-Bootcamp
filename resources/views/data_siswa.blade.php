@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Siswa</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Kelas</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Email</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswas as $siswa)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0 px-3">{{ $siswa->name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0 px-3">{{ $siswa->kelas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0" px-3>{{ $siswa->email }}</p>
                                                </td>
                                                <td class="d-flex gap-3 px-3">
                                                    <button type="button" class="btn bg-gradient-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editSiswa_{{ $siswa->id }}"
                                                        data-book-id="{{ $siswa->id }}">
                                                        Edit
                                                    </button>
                                                    @include('partials.modals.edit_siswa')
                                                    <form action="{{ route('siswa.delete', $siswa->id) }}" method="POST">
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
