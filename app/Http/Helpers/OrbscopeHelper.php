<?php
    use App\Http\Controllers\SettingsController;
    use App\Controllers\LogsController as Log;
    use Illuminate\Support\Facades\Lang;

    // Get Website Settings
    function GetSettings()
    {
        // New Object From Setting Controller
        $settingsController = new SettingsController;
        //Get Setting
        $settings = $settingsController->GetSetting();
        return $settings;
    }

    function occupancy_percentage($id){

        $rented=\App\Models\Flat::where('unit_id',$id)->where('status','rented')->count();

        $unit=\App\Models\Flat::where('unit_id',$id)->count();
        if ($unit != 0){
            $per= ($rented/$unit)*100;
        }else{

            $per=0;
        }

         return $per;

    }

    function income_unit($id){
         $income=\App\Models\Invoicetype::where('type','income')->select('id')->get();
        $sum=\App\Models\Invoice::where('unit_id',$id)->whereIn('type',$income)->sum('amount');
          return $sum;
    }

    function out_comeunit($id){
        $income=\App\Models\Invoicetype::where('type','outcome')->select('id')->get();
        $sum=\App\Models\Invoice::where('unit_id',$id)->whereIn('type',$income)->sum('amount');
        return $sum;

    }

    function convert2english($string) {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string =  str_replace($persianDecimal, $newNumbers, $string);
        $string =  str_replace($arabicDecimal, $newNumbers, $string);
        $string =  str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }

    // Return Data By Language
    function SettingsByLang($var, $lang)
    {
        $data = json_decode(GetSettings()->$var)->$lang;
        return $data;
    }

    function generateBarcodeNumber() {
        $number = mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if (barcodeNumberExists($number)) {
            return generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }
    function generateReportNumber() {
        $number = mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if (reportNumberExists($number)) {
            return generateReportNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }
        function reportNumberExists($number) {
            // query the database and return a boolean
            // for instance, it might look like this in Laravel
            return \App\Models\Deportation::where('report_id',$number)->exists();
        }
        function generateContractNumber() {
        $number = mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if (contractNumberExists($number)) {
            return generateContractNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

        function contractNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return \App\Models\Contract::where('contract_number',$number)->exists();
    }

    function barcodeInvoiceExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return \App\Models\Payment::where('invoce_number',$number)->exists();
    }


function generateInvoiceNumber() {
        $number = mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if (barcodeInvoiceExists($number)) {
            return generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
}

    function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return \App\Models\Flat::where('unit_number',$number)->exists();
    }



// Get Language
    function GetLanguage()
    {
        // New Object From Setting Controller
        $languageValue = new SettingsController;

        //Get Current Language
        $language = $languageValue->GetLanguage();
        return $language;

    }

    // Get Language Direction
    function GetDirection()
    {
        if(GetLanguage() == 'ar')
        {
            $dir = 'rtl';
        }
        else
        {
            $dir = 'ltr';
        }
        return $dir;
    }

    // Get Language adds style
    function GetLangAdds()
    {
        if(GetLanguage() == 'ar')
        {
            $adds = '-rtl';
        }
        else
        {
            $adds = '';
        }
        return $adds;
    }

    function month_ar($month){

        if ($month=='1'){

            return'كانون الثاني';
        }elseif ($month=='2'){

            return'شباط';
        }elseif ($month=='3'){
            return 'آذار';
        }elseif ($month=='4'){
            return 'نيسان';
        }elseif ($month=='5'){
            return 'أيار';
        }elseif ($month=='6'){
            return 'حزيران';
        }elseif ($month=='7'){
            return 'تموز';
        }elseif ($month=='8'){
            return 'آب';
        }elseif ($month=='9'){
            return 'أيلول';
        }elseif ($month=='10'){
            return 'تشرين الأول';
        }elseif ($month=='11'){
            return 'تشرين الثاني';
        }elseif ($month=='12'){
            return 'كانون الأول';
        }else{
            return $month;
        }


    }

    // Get Images Path
    function GetImage($val=null)
    {
        if(!empty($val) and file_exists(base_path('uploads/'.$val)))
        {
            return url('uploads/'.$val);
        }else{
            return url(url('/').'/orbscope/orbscope.png');
        }
    }

    // Get Images Path
    function ShowImage($val=null)
    {
        if(!empty($val) and file_exists(base_path('public/uploads/'.$val)))
        {
            return url('uploads/'.$val);
        }else{
            return url(url('/').'/orbscope/orbscope.jpg');
        }
    }

    // Get Admin Path
    function AdminPath()
    {
        // New Object From Setting Controller
        $settingsController = new SettingsController;
        //Get Setting
        $AdminPath = $settingsController->GetSetting()->admin_path;
        return $AdminPath;
    }

    // Return Variable By Language
    function VarByLang($var, $lang)
    {
        if(!empty($var) && $var != ''){
            $data = json_decode($var)->$lang;
        }else{
            $data = '';
        }
        return $data;
    }

    function ActiveLink($url,$url2=null){

      if ($url == Request::url()){

          return 'active';
      }elseif ($url2 == Request::url()){
          return 'active';
      }

    }





    // Json Encoding Variable
    function EncodeVar($var)
    {
        return json_encode($var,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    // Replace Array Keys Of another Array values
    function ReplaceArrayKeys($data,$fields)
    {
        foreach ($data as $array){
            for($i=0; $i < count($array); $i++){
                $new_key = $fields[$i];
                $array[$new_key] = $array[$i];
                unset($array[$i]);
            }

            $insert[] = $array;
        }
       return $insert;
    }

    // Get Action Log Message
    function LogAction($type,$id = null,$en=null)
    {
        if($type == 'add'){
            $ar_action = 'تم اضافة بيان جديد =>'.' '.$id;
            if ($en==null){
                $en=$id;
            }
            $en_action = 'Added Record .'.' '.$en;
            $action = $name = array('ar'=>$ar_action,'en'=>$en_action);
            $message = EncodeVar($action);
        }elseif($type == 'edit'){
            $ar_action = 'تم تعديل البيان =>'.' '.$id;
            $en_action = 'Updated Record No.'.' '.$en;
            $action = $name = array('ar'=>$ar_action,'en'=>$en_action);
            $message = EncodeVar($action);
        }elseif($type=='delete'){
            $ar_action = 'تم حذف البيان'.' '.$id;
            $en_action = 'Deleted Record No.'.' '.$en;
            $action = $name = array('ar'=>$ar_action,'en'=>$en_action);
            $message = EncodeVar($action);
        }
        return $message;
    }

    // Get Route Log
    function LogRoute($route)
    {
        $ar_route   = Lang::get('orbscope.'.$route, array(), 'ar');
        $en_route   = Lang::get('orbscope.'.$route, array(), 'en');
        $route_name = array('ar'=>$ar_route,'en'=>$en_route);
        return $message = EncodeVar($route_name);
    }

    /*
     *  Save Log
     */
    function SaveLog($type,$id = null,$route){
       $log =  Log::SaveLog(
            [
                'action' =>LogAction($type,$id),
                'type'   =>$type,
                'table'  =>$route,
                'route'  =>LogRoute($route),
                'data'   =>'',
            ]
        );
       return $log;
    }

    // Check If Key In Array
    function InArray($key,$array,$return = null,$checkValues = null){
      if(empty($checkValues)) {
          if (array_key_exists($key, $array)) {
             return $data[] = $array[$key];
          } else {
             return $data[] = $return;
          }
      }else{
          if (array_key_exists($key, $array)) {
             return CheckValue($array[$key], $checkValues, $return);
          }else{
              return $data[] = $return;
          }
      }
    }

    // Check If Array Value In Array Of Values
    function CheckValue($array,$values,$return){
        if(!empty($array))
        {
            foreach ($values as $value){
            if($array == $value){
                return $array;
            }else{
                  $array =  $return;
                 return $array;
            }
            }
        }else{
            return $return;
        }
    }

    function docx2text($filename) {
        return readZippedXML($filename, "word/document.xml");
    }

    function readZippedXML($archiveFile, $dataFile) {
    // Create new ZIP archive
        $zip = new ZipArchive;

    // Open received archive file
        if (true === $zip->open($archiveFile)) {
            // If done, search for the data file in the archive
            if (($index = $zip->locateName($dataFile)) !== false) {
                // If found, read it to the string
                $data = $zip->getFromIndex($index);
                // Close archive file
                $zip->close();
                // Load XML from a string
                // Skip errors and warnings
                $xml = new DOMDocument();
                $xml->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                // Return data without XML formatting tags
                return strip_tags($xml->saveXML());
            }
            $zip->close();
        }

    // In case of failure return empty string
        return "";
    }

    function rtf_isPlainText($s) {
        $arrfailAt = array("*", "fonttbl", "colortbl", "datastore", "themedata");
        for ($i = 0; $i < count($arrfailAt); $i++)
            if (!empty($s[$arrfailAt[$i]])) return false;
        return true;
    }



    function clean_ascii_characters($string) {
        $string = str_replace(array('-', '–'), '-', $string);
        $string = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string);
        return $string;
    }
