<label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.apartment')}}</label>

<div class="col-md-4">
    <select class="form-control"  name="flat_id" id="flat_id" >
        <option value=""></option>
        @foreach($flats as $unit)
            <option value="{{$unit->id}}">{{@$unit->flattype->name}} {{$unit->unit_number}}</option>
        @endforeach

    </select>
</div>