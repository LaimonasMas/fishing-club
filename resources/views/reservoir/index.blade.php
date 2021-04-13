@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Reservoirs list</h2>
                </div>
                <div class="card-body">

                    @foreach ($reservoirs as $reservoir)
                    <li class="list-group-item list-line">
                        <div>
                            <h4>Reservoir name: {{$reservoir->title}}</h4>
                            <h5>Reservoir area: {{$reservoir->area}} m2</h5>
                            <h5>About reservoir: {!!$reservoir->about!!}</h5>
                        </div>
                        <div class="list-line__buttons">
                            <div class="form-group">
                                <a class="btn btn-outline-secondary btn-sm" href="{{route('reservoir.edit',[$reservoir])}}">EDIT</a>
                            </div>
                            <form method="POST" action="{{route('reservoir.destroy', [$reservoir])}}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" type="submit">DELETE</button>
                            </form>
                        </div>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
