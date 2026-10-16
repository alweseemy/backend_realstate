

    <select class="form-control"  name="user_id" id="user_id" >
        @foreach($users as $unit)
            <option  @if(old('unit_id') == $unit->id) selected @endif  value="{{$unit->id}}">{{$unit->name}}</option>
        @endforeach

    </select>
