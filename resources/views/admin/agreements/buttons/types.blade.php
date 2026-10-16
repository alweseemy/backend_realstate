@php
    $name = @App\Orbscope\Models\UnitType::find($unit_type)->name;
    if(!empty($name)){
       echo VarByLang($name,GetLanguage());
    }else{
        echo "No type Found";
    }
@endphp
