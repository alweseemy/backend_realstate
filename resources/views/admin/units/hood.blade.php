<select class="form-control"  name="hood_id" id="hood_id" >
    <option value=""></option>
    @foreach($hoods as $ho)
        <option value="{{$ho->id}}">{{$ho->name}}</option>
    @endforeach
</select>