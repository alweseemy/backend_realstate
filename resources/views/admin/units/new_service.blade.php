<tr class="row_service">
    <td> <input type="text"  required class="form-control" name="company_name[]"></td>
    <td> <input type="text"  required class="form-control" name="service_type[]"> </td>
    <td> <input type="number" required class="form-control" step="any" name="contract_value[]"> </td>
    <td>
        {!! Form::text('start_date[]','',['class'=>'form-control date-picker','id'=>'start_date','data-date-format'=>'yyyy-mm-dd']) !!}


    </td>
    <td>
        {!! Form::text('end_date[]','',['class'=>'form-control date-picker','id'=>'end_date','data-date-format'=>'yyyy-mm-dd']) !!}


    </td>

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