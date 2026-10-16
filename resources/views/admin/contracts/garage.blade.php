
    <select class="form-control"  name="garage_id" id="garage_id" >
        <option value=""></option>
        @foreach($garage as $unit)
            <option value="{{$unit->id}}">{{@$unit->flattype->name}} {{$unit->unit_number}}</option>
        @endforeach

    </select>
