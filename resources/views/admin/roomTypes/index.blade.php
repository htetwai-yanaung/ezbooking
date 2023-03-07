@extends('admin.layouts.app')

@section('content')
    <!-- room type -->
    <h4 class="text-muted col-6 align-middle">Create Room Type</h4>

    {{-- alert  --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- alert  --}}

    <div class="">
        <div class="row">
            <div class="col-md-6 col-12 mb-3">
                <form action="{{ route('dashboard.roomTypeStore') }}" method="POST" class=" bg-white p-3 rounded shadow-sm">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Room Type Name</label>
                            <input type="text" name="name" class="form-control" placeholder="input room type name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-12 mb-3">
                <table class="table table-bordered bg-white">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Room type name</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roomTypes as $roomType)
                      <tr>
                        <th scope="row" class="align-middle">{{ $roomType->id }}</th>
                        <td class="align-middle">{{ $roomType->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.roomTypeEdit', $roomType->id) }}" class="action edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fa-solid fa-pen"></i></a> |
                            <a href="{{ route('dashboard.roomTypeDelete', $roomType->id) }}" class="action delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- room type -->
@endsection
