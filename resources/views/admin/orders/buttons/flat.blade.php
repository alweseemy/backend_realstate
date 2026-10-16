@php
    $name = @\App\Models\Flat::find($flat_id);
    if(!empty($name)){
       echo $name->flattype->name.' '.$name->unit_number;
    }else{
        echo " ";
    }
@endphp