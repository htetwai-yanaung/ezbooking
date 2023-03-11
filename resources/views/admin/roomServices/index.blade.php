@extends('admin.layouts.app')

@section('content')
    <!-- room type -->
    <h4 class="text-muted col-6 align-middle">Create Service</h4>

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
                <form action="{{ route('services.store') }}" method="POST" class=" bg-white p-3 rounded shadow-sm">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Service Name</label>
                            <input type="text" name="name" class="form-control" placeholder="input service name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Service Icon <small class="text-muted">(optional)</small></label>
                            <label for="icon" class="btn btn-outline-primary d-block">Choose icon svg</label>
                            <input type="file" name="icon" class="d-none" id="icon">
                            @error('icon')
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
                        <th scope="col">Service name</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($freeServices as $service)
                      <tr>
                        <th scope="row" class="align-middle">{{ $service->id }}</th>
                        <td class="align-middle">{{ $service->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('services.edit', $service->id) }}" class="action edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fa-solid fa-pen"></i></a> |
                            <a href="{{ route('services.delete', $service->id) }}" class="action delete"><i class="fa-solid fa-trash"></i></a>
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
