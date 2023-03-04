@extends('admin.layouts.app')

@section('content')
    <!-- table start -->
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-muted">Room list</h4>
            <a href="{{ route('dashboard.roomCreate') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>x100</td>
                    <td>Suite</td>
                    <td>single, 1</td>
                    <td>3$</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" type="checkbox" role="switch" id="status">
                            <label class="form-check-label" for="status">Available</label>
                        </div>
                    </td>
                    <td>
                        <a href=""><i class="fa-solid fa-pen"></i></a> |
                        <a href=""><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- table end -->
@endsection
