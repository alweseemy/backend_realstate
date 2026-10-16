
<tr class="row_container">
    <td> <input type="text"   class="form-control" name="number[]"> </td>

    <td> <select  class="form-control" name="bank_id[]">
            <option value=""></option>
            @foreach(\App\Models\Bank::all() as $f)
                <option  value="{{$f->id}}">{{$f->name}}</option>
            @endforeach
        </select> </td>
    <td><input type="number" step="any" name="amount_check[]"  class="form-control"></td>
    <td><input type="text" name="date_from[]"  data-date-format="yyyy-mm-dd" class="form-control date_from date-picker"></td>
    <td><input type="text" name="date_to[]"  data-date-format="yyyy-mm-dd" class="form-control date_to date-picker"></td>
    <td><input type="text" name="notes[]" class="form-control"></td>
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