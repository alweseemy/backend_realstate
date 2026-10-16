<details class="alert alert-info" open="">
    <summary style="cursor: pointer;">
            <span class="pull-left">
                اضافة الوحدات
            </span>
        <span class="pull-right">

            </span>
    </summary>
    <br/>
    @if($count==0)

        <div class="alert alert-danger" dir="ar">
            <ul>

                    <li>اقل عدد للوحدات هو وحدة واحدة</li>

            </ul>
        </div>
    @endif




    @for($x=1; $x<=$count; $x++)
    <div style="display: flex;" class="form-group">
        <label class="col-md-3 control-label" for="en_name">اسم الوحدة رقم  {{$x}} </label>
        <div class="col-md-9">
            <input type="text" name="others_names[]" value="الوحدة رقم {{$x}}" class="form-control" id="others_names_en" placeholder="" required="required">

        </div>
    </div>
  @endfor

    <div class="form-group rooms_content">
        <label class="col-md-2 control-label" for="room">عدد الغرف</label>
        <div class="col-md-4">
            <input type="number" required name="room" id="room"
                   class="form-control" value="{{old('room')}}"></div>

        <label class="col-md-2 control-label" for="hall">عدد الصالات</label>
        <div class="col-md-4">
            <input type="text" required name="hall" id="hall"
                   class="form-control" value="{{old('hall')}}"></div>
    </div>
    <div class="form-group rooms_content">
        <label class="col-md-2 control-label" for="bedrooms">مساحة الوحدة م2</label>
        <div class="col-md-4">
            <input type="number" required name="area" id="area"
                   class="form-control" value="{{old('area')}}"></div>

        <label class="col-md-2 control-label" for="bathroom">عدد دورات المياه</label>
        <div class="col-md-4">
            <input type="number" required name="bathroom" id="bathroom"
                   class="form-control" value="{{old('bathroom')}}"></div>
    </div>

</details>