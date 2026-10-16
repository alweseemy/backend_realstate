
    <select class="form-control"  name="flat_id" id="flat_id" >
        <option value=""></option>
        @foreach($flats as $unit)
            <option value="{{$unit->id}}">{{@$unit->flattype->name}} {{$unit->unit_number}}</option>
        @endforeach

    </select>


    <script>
        $(document).on('change', '#flat_id', function () {
            var unit = $(this).val();
            $.ajax({
                url: '{{url(AdminPath().'/checks_flats_tents')}}',
                dataType: 'html',
                type: 'post',
                data: {_token: '{{csrf_token()}}', unit: unit},
                beforeSend: function () {

                }, success: function (data) {
                    $('.user_data').html(data);
                }
            });
        });
    </script>
