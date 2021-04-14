@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Members list</h2>

                    <div class="make-inline">
                        <form action="{{route('member.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label>reservoir: </label>
                                <select class="form-control" name="reservoir_id">
                                    <option value="0" @if($filterBy==0) selected @endif>All reservoirs</option>
                                    @foreach ($reservoirs as $reservoir)
                                    <option value="{{$reservoir->id}}" @if($filterBy==$reservoir->id) selected @endif>
                                        {{$reservoir->title}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-sm">Filter</button>
                    
                        </form>
                        <a href="{{route('member.index')}}" class="btn btn-outline-secondary btn-sm">Clear</a>

                    </div>
                    <div class="card-body">

                        @foreach ($members as $member)
                        <li class="list-group-item list-line">
                            <div>
                                <h4>Member: {{$member->name}} {{$member->surname}}</h4>
                                <h5>Lives in: {{$member->live}}</h5>
                                <h5>Experience: {{$member->experience}} years</h5>
                                <h5>Membership length: {{$member->registered}} years</h5>
                                <h5>Member of Reservoir: {{$member->memberReservoir->title}}</h5>
                            </div>
                            <div class="list-line__buttons">
                                <div class="form-group">
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('member.edit',[$member])}}">EDIT</a>
                                </div>
                                <form method="POST" action="{{route('member.destroy', [$member])}}">
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
