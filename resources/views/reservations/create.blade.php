@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Reserveer
    </div>
    <div class="card-body">
        <form action="reservations.create" method="" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group ">
                <p>Niet verplicht*</p>
                <select id="test" name="test">
                <option value="test">Werknemer1</option>
                <option value="test">Werknemer2</option>
                <option value="test">Werknemer3</option>
                <option value="test">Werknemer4</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="start_time">Start Time*</label>
                <input type="date" id="start_time" name="start_time" class="form-control datetime col-sm-1" value="" required="" required pattern="\d{4}-\d{2}-\d{2}">
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group ">
                <label for="finish_time">Finish Time*</label>
                <input type="date" id="finish_time" name="finish_time" class="form-control datetime col-sm-1" value="" required="" required pattern="\d{4}-\d{2}-\d{2}" >
                <p class="helper-block">
                </p>
            </div>
            <div class="form-group ">
                <label for="comments">Comments</label>
                <textarea id="comments" name="comments" class="form-control "></textarea>
                <p class="helper-block">
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection

