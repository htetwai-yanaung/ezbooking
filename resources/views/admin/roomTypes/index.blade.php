@extends('admin.layouts.app')

@section('content')
    <!-- room type -->
    <h4 class="text-muted">Create Room Type</h4>
    <div class="">
        <div class="row">
            <div class="col-6">
                <form action="" class=" bg-white p-3 rounded shadow-sm">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Room Type Name</label>
                            <input type="text" class="form-control" placeholder="input room type name">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <button class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-bordered bg-white">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Room type name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Family room</td>
                        <td>
                            <a href=""><i class="fa-solid fa-pen"></i></a> |
                            <a href=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Family room</td>
                        <td>
                            <a href=""><i class="fa-solid fa-pen"></i></a> |
                            <a href=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Family room</td>
                        <td>
                            <a href=""><i class="fa-solid fa-pen"></i></a> |
                            <a href=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Family room</td>
                        <td>
                            <a href=""><i class="fa-solid fa-pen"></i></a> |
                            <a href=""><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- room type -->
@endsection
