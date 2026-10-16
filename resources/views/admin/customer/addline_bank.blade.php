<tr class="row_service">
    <input type="hidden" name="count_number[]">
    <input type="hidden" name="main_id[]" value="new">
    <td> <input type="text"    class="form-control" name="bank_account[]"></td>
    <td> <select  class="form-control" name="bank_id[]">
            <option value=""></option>
            @foreach(\App\Models\Bank::all() as $b)
                <option value="{{$b->id}}">{{$b->name}}</option>
            @endforeach
        </select></td>

    <td class="service_delete_btn" style="padding-top: 15px;"><a style="color: red;margin-top: 5px;"><i class='fa fa-remove'></i> </a> </td>
</tr>

<script>

    $(document).on('click', '.service_delete_btn', function(event) {
        var self = $(this);
        if (confirm('Are you suer?')) {
            self.parents('.row_service').remove();
            //checkFinals();
        }
    });
</script>