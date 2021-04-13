@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create member</div>

                <div class="card-body">
                    <form method="POST" action="{{route('member.store')}}">
                        <div class="form-group">
                            <label>Member name: </label>
                            <input type="text" class="form-control" name="member_name" value="{{old('member_name')}}">
                            <small class="form-text text-muted">You can enter member name here</small>
                        </div>
                        <div class="form-group">
                            <label>Member surname: </label>
                            <input type="text" class="form-control" name="member_surname" value="{{old('member_surname')}}">
                            <small class="form-text text-muted">You can enter member surname here</small>
                        </div>
                        <div class="form-group">
                            <label>Member lives in: </label>
                            <input type="text" class="form-control" name="member_live" value="{{old('member_live')}}">
                            <small class="form-text text-muted">You can enter a city here</small>
                        </div>
                        <div class="form-group">
                            <label>Member's experience: </label>
                            <input type="text" class="form-control" name="member_experience" value="{{old('member_experience')}}">
                            <small class="form-text text-muted">You can enter years of experience here</small>
                        </div>
                        <div class="form-group">
                            <label>Membership length in years: </label>
                            <input type="text" class="form-control" name="member_registered" value="{{old('member_registered')}}">
                            <small class="form-text text-muted">You can enter years of membership here</small>
                        </div>
                        <div class="form-group">
                            <label>Reservoir: </label>
                            <select name="reservoir_id">
                                @foreach ($reservoirs as $reservoir)
                                <option class="form-control" value="{{$reservoir->id}}">{{$reservoir->title}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please choose the reservoir from the list above</small>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-outline-success btn-sm">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

</script>
@endsection
