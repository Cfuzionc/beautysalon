<div>
    @if (isset($reservation))
        <span class="text-primary">Thanks for your reservation!</span>
        <span class="text-muted">Reservation number: {{ $reservation->uuid }}</span>
    @else
        <div class="form-group ">
            <p>Niet verplicht*</p>
            <select wire:model="preffered_employee">
                <option value="">No Preffered Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee }}">{{ $employee }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group ">
            @error('date')
                <span class="form-danger text-danger">{{ $message }}</span>
            @enderror
            <label for="start_time">Date Time*</label>
            <input type="date" wire:model.lazy="date" id="start_time" class="form-control datetime col-sm-1"
                value="" required="" required pattern="\d{4}-\d{2}-\d{2}" data-date-end-date="0d">
            <p class="helper-block">
            </p>
        </div>
        @if (!empty($hours))
            <div class="form-group ">
                @error('start_time')
                    <span class="form-danger text-danger">{{ $message }}</span>
                @enderror
                <label for="start_time">Time*</label>
                <select wire:model="start_time">
                    <option value="">Choose time</option>
                    @foreach ($hours as $hour)
                        <option value="{{ $hour }}">{{ $hour }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div>
            <input class="btn btn-danger" wire:click="storeReservation" value="Save">
        </div>
    @endif
</div>
