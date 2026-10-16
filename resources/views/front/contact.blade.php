
@extends('front.app')


@section('content')
    <div class="col-sm-12">
    <h4 style="text-align: center">{{trans('front.maintenance_request_form')}}</h4>
    </div>
    <br/>
    <div class="container">

        @include('front.messages')



    <div class="row mt-50 mb-50">

        <div class="col-sm-12 col-md-12 ">



                {!! Form::open(['files'=>false,'route'=>'maintenance_form.store','class'=>'ontact-form-wrapper']) !!}

                @csrf

                <div class="row">

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="inputName">{{trans('orbscope.name')}} <span class="font10 text-danger">(required)</span></label>
                            <input  name="name" type="text" class="form-control" data-error="Your name is required" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="inputEmail">{{trans('orbscope.phone')}} <span class="font10 text-danger">(required)</span></label>
                            <input  name="phone" type="text" class="form-control"  required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="inputName">{{trans('orbscope.unit')}} <span class="font10 text-danger">(required)</span></label>
                            <input  name="unit" type="text" class="form-control"  required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="inputEmail">{{trans('orbscope.apartment')}} </label>
                            <input  name="apartment" type="text" class="form-control"  >
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>




                    <div class="col-sm-12">

                        <div class="form-group">
                            <label>{{trans('orbscope.maintenance_type')}}</label>
                            <input type="text" name="maintenance_type" class="form-control" />
                        </div>

                    </div>

                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for="inputMessage">{{trans('orbscope.details')}} <span class="font10 text-danger">(required)</span></label>
                            <textarea name="details"  class="form-control" rows="8" data-minlength="50" data-error="Your message is required and must not less than 50 characters" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info">{{trans('orbscope.send')}}</button>
                    </div>
                    <br/>

                </div>

            {!! Form::close() !!}
<br/>
        </div>

    </div>
</div>


@endsection