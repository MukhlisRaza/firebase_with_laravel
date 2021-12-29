@extends('firebase.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Contact
                        <a href="{{url('contacts')}}" class="btn btn-sm btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-contact/'.$key)}}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" value="{{$editData['first_name']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" value="{{$editData['last_name']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" value="{{$editData['phone']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$editData['email']}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection