<label class="col-md-2 control-label" for="unit_id">{{trans('orbscope.bank_account')}}</label>

<div class="col-md-4">
    <select class="form-control" required name="owner_account_id" id="owner_account_id" >
        <option value=""></option>
        @foreach($accounts as $unit)
            <option value="{{$unit->id}}">{{@$unit->bank_account}} {{@$unit->bank->name}}</option>
        @endforeach

    </select>
</div>