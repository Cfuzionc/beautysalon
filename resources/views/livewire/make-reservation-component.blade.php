<div>
     <form action="reservations.create" method="" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group ">
                <p>Niet verplicht*</p>
                <select name="preffered_employee">
                    <option value="">No Preffered Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee }}">{{ $employee }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label for="start_time">Date Time*</label>
                <input type="date" wire:model.lazy="date" id="start_time" name="start_time" class="form-control datetime col-sm-1" value="" required="" required pattern="\d{4}-\d{2}-\d{2}" data-date-end-date="0d">
                <p class="helper-block">
                </p>
            </div>
            @if(! empty($hours))
            <div class="form-group ">
                <label for="start_time">Time*</label>
                <select name="preffered_employee">
                    <option value="">Choose time</option>
                    @foreach($hours as $hour)
                        <option value="{{ $hour }}">{{ $hour }}</option>
                    @endforeach
                </select>
            </div>
            @endif
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
