<tr class="row_container">
    <td> <select required class="form-control" name="flat_type[]">
            @foreach(\App\Models\Flat_type::all() as $f)
                <option value="{{$f->id}}">{{$f->name}}</option>
            @endforeach
        </select> </td>
    <td> <input type="number" required class="form-control" name="flat_count[]"> </td>
    <td> <input type="number" required class="form-control" step="any" name="area[]"> </td>
    <td> <input type="number" class="form-control" name="bathrooms[]"> </td>
    <td> <input type="number" class="form-control" name="bedrooms[]"> </td>
    <td><input type="number" class="form-control" name="hall[]"> </td>
    <td>
        <select name="balcony[]" class="form-control">
            <option value=""></option>
            <option value="available" >{{trans('orbscope.available')}}</option>
            <option value="unavailable" >{{trans('orbscope.unavailable')}}</option>
        </select>
    </td>
    <td class="order_pro_delete_btn" style="padding-top: 15px;"><a style="color: red;margin-top: 5px;"><i class='fa fa-remove'></i> </a> </td>
</tr>

<script>

    $(document).on('click', '.order_pro_delete_btn', function(event) {
        var self = $(this);
        if (confirm('Are you suer?')) {
            self.parents('.row_container').remove();
            //checkFinals();
        }
    });
</script>