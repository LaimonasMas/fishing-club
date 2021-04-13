@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Reservoir</div>

                <div class="card-body">
                    <form method="POST" action="{{route('reservoir.store')}}">
                        <div class="form-group">
                            <label>Reservoir name: </label>
                            <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title')}}">
                            <small class="form-text text-muted">You can enter Reservoir here</small>
                        </div>
                        <div class="form-group">
                            <label>Reservoir area: </label>
                            <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area')}}">
                            <small class="form-text text-muted">You can enter Area size here</small>
                        </div>
                        <div class="form-group">
                            <label>About reservoir: </label>
                            <textarea class="form-control" name="reservoir_about" id="summernote">{{old('reservoir_about')}}</textarea>
                            <small class="form-text text-muted">Please enter description abour Reservoir here</small>
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