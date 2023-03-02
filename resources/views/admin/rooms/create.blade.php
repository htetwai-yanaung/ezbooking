@extends('admin.layouts.app')

@section('content')
<section>
    <form action="" class="container">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="">Room Name</label>
                <input type="text" class="form-control" placeholder="Enter room name..">
            </div>
            <div class="col-6">
                <label for="">Room Name</label>
                <input type="text" class="form-control" placeholder="Enter room name..">
            </div>
            <div class="col-6">
                <label for="">Room Name</label>
                <input type="text" class="form-control" placeholder="Enter room name..">
            </div>
            <div class="col-6">
                <label for="">Room Name</label>
                <input type="text" class="form-control" placeholder="Enter room name..">
            </div>
        </div>
    </form>
</section>
@endsection
