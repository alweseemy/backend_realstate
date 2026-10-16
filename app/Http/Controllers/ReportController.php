<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\DataTables\ReportOrderDatatable;
use App\Http\DataTables\ReportUnitDespoitDatatable;
use App\Http\DataTables\ReportUnitWithdrawalDatatable;
use App\Models\Bank_check;
use App\Models\Contract;
use App\Models\Deportation;
use App\Models\Flat;
use App\Models\Invoice;
use App\Models\Invoicetype;
use App\Models\Order;
use App\Models\Transfer;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Argument;
use Validator;
use Logs;
use Session;
use Form;
use Illuminate\Http\File;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;


class ReportController extends Controller
{

    public function index(){

            $units = Unit::all();
            $users=User::where('type','owner')->get();

        return view('admin.reports.index',compact('units','users'),['title'=>trans('orbscope.reports')]);


    }

    public function checks_report(){
        $units = Unit::all();
        return view('admin.reports.checks.index',compact('units'),['title'=>trans('orbscope.reports').' '.trans('orbscope.checks')]);

    }

    public function checks_ajax(Request $request){
        $flats=Flat::where('unit_id',$request->unit)->where('flat_type_id','!=',3)->get();
        return view('admin.reports.checks.ajax',compact('flats'));

    }

    public function checks_flats_tents(Request $request){
        $contarct=Contract::where('flat_id',$request->unit)->first();
        if ($contarct){
            $users=User::where('id',$contarct->user_id)->get();
            return view('admin.reports.checks.users',compact('users'));
        }

        return view('admin.reports.checks.ajax',compact('flats'));

    }

    public function checks_show(Request $request){

        $query = Bank_check::query();
        $query->where(function ($q) {
            if (request('unit_id') != null) {
                $q->where('unit_id', request()->input('unit_id'));
            }
        });
        $query->where(function ($q) {
            if (request('flat_id') != null) {
                $q->where('flat_id', request()->input('flat_id'));
            }
        });
        $query->where(function ($q) {
            if (request('user_id') != null) {
                $q->where('user_id', request()->input('user_id'));
            }
        });
        $query->where(function ($q) {
            if (request('status') != null) {
                $q->where('status', request()->input('status'));
            }
        });
        $query->where(function ($q) {
            if (request('date_from') != null) {
                $q->where('from_date','>=',request()->input('date_from'));
            }
        });
        $query->where(function ($q) {
            if (request('date_to')!= null) {
                $q->where('to_date','<=', request()->input('date_to'));
            }
        });
        $show = $query->get();

        return view('admin.reports.checks.show',compact('show'),['title'=>trans('orbscope.reports').' '.trans('orbscope.checks')]);

    }

    public function comprehensive_report(){


        return  view('admin.reports.comprehensive_report',['title'=>trans('orbscope.comprehensive_report')]);


    }


    public function show_unit(ReportUnitDespoitDatatable $datatable){


        $query = Invoice::query()->where(function($q){
            if(request('unit_id')!=null) {
                return $q->where('invoices.unit_id',request()->input('unit_id'));
            }
        });
        $query->where(function($q){
            if(request('user_id')!= null){
                return $q->where('invoices.owner_id',request()->input('user_id'));
            }
        });
        $query->where(function($q){
            if(request('invoicetype')!= null){
                return $q->whereIn('invoices.type',request()->input('invoicetype'));
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')!=null){
                return $q->whereBetween('invoices.date',[request()->get('date_from'),request()->get('date_to')]);
            }
        });
        $query->where(function($q){
            if(request('date_from')!= null and request('date_to')==null){
                return $q->where('invoices.date', '>=', request()->input('date_from'));
            }
        });
        $query->where(function($q){
            if(request('date_from')== null and request('date_to')!=null){
                return $q->where('invoices.date', '<=', request()->input('date_to'));
            }
        });

        $amount=$query->sum('amount');

            $title=trans('orbscope.reports').' '.trans('orbscope.invoices');

        return $datatable->render('admin.reports.unit_show',compact('title','amount'));

    }

    public function withdrawal_report(ReportUnitWithdrawalDatatable $datatable){


        $unit=Unit::findOrFail(request('type_id'));
        return $datatable->render('admin.reports.unit_show',['title' =>'تقرير مصاريف لعمارة'.' '.$unit->name]);

    }

   public function orders_report(ReportOrderDatatable $datatable){
        if (request()->unit_id!=null){

            $unit=Unit::findOrFail(request('unit_id'));
            $title=trans('orbscope.report').' '.trans('orbscope.maintenance').' '.trans('orbscope.unit').' '.$unit->name;
        }else{


            $title=trans('orbscope.report').' '.trans('orbscope.maintenance');
        }

       $query = Order::query()->where(function($q){
           if(request('unit_id')!=null) {
               return $q->where('orders.unit_id',request()->input('unit_id'));
           }
       });
       $query->where(function($q){
           if(request('order_type')!= null){
               return $q->where('orders.order_type',request()->input('order_type'));
           }
       });
       $query->where(function($q){
           if(request('status')!= null){
               return $q->where('orders.status',request()->input('status'));
           }
       });
       $query->where(function($q){
           if(request('date_from')!= null and request('date_to')!=null){
               return $q->whereBetween('orders.date',[request()->get('date_from'),request()->get('date_to')]);
           }
       });
       $query->where(function($q){
           if(request('date_from')!= null and request('date_to')==null){
               return $q->where('orders.date', '>=', request()->input('date_from'));
           }
       });
       $query->where(function($q){
           if(request('date_from')== null and request('date_to')!=null){
               return $q->where('orders.date', '<=', request()->input('date_to'));
           }
       });
       $amount=$query->sum('amount');




       return $datatable->render('admin.reports.unit_show',compact('title','amount'));
   }



   public function financial_report(){


       return view('admin.reports.financial.index',['title'=>trans('orbscope.financial_report')]);

   }

   public function financial_show(Request $request){
       $unit=Unit::findOrFail($request->unit_id);
       $argument=@$unit->argument->fee;
       if ($argument==null || empty($argument)){

           $argument=0;
       }

       $income_type=Invoicetype::where('type','income')->select('id')->get();
       $out_type=Invoicetype::where('type','outcome')->select('id')->get();



       $income=Invoice::where('unit_id',$request->unit_id)->whereIn('type',$income_type)->whereBetween('date',[$request->date_from,$request->date_to])->with('flat')->with('invoicetype')->get();

       $netincome=Invoice::where('unit_id',$request->unit_id)->whereIn('type',$income_type)->whereBetween('date',[$request->date_from,$request->date_to])->sum('amount');


       $outcome=Invoice::where('unit_id',$request->unit_id)->whereIn('type',$out_type)->whereBetween('date',[$request->date_from,$request->date_to])->with('flat')->with('invoicetype')->get();
       $netoutcome=Invoice::where('unit_id',$request->unit_id)->whereIn('type',$out_type)->whereBetween('date',[$request->date_from,$request->date_to])->sum('amount');
       $transfer=Transfer::where('unit_id',$request->unit_id)->whereBetween('date',[$request->date_from,$request->date_to])->sum('amount');
       $fee=($netincome+$netoutcome) * $argument / 100;
       return view('admin.reports.financial.show',compact('transfer','income','unit','fee','outcome','netincome','netoutcome'),['title'=>trans('orbscope.financial_report').' '.$unit->name]);
   }

   public function deportation($id){
       $unit=Unit::findOrFail($id);
       $argument=@$unit->argument->fee;
       if ($argument==null || empty($argument)){

           $argument=0;
       }

       $income_type=Invoicetype::where('type','income')->select('id')->get();
       $out_type=Invoicetype::where('type','outcome')->select('id')->get();
       $income=Invoice::where('unit_id',$id)->whereIn('type',$income_type)->where('withdrawl','no')->with('flat')->with('invoicetype')->get();
       $netincome=Invoice::where('unit_id',$id)->whereIn('type',$income_type)->where('withdrawl','no')->sum('amount');
       $outcome=Invoice::where('unit_id',$id)->whereIn('type',$out_type)->where('withdrawl','no')->with('flat')->with('invoicetype')->get();
       $netoutcome=Invoice::where('unit_id',$id)->whereIn('type',$out_type)->where('withdrawl','no')->sum('amount');
       $fee=($netincome + $outcome) * $argument / 100;
       return view('admin.deportation.index',compact('income','unit','fee','outcome','netincome','netoutcome'),['title'=>'ترحيل مستحقات المالك لعقار'.' '.$unit->name]);
   }

   public function save_deportation(Request $request){

           if ($request->invoice_id != null && !empty($request->invoice_id)){
               $unit = Unit::findOrFail($request->unit_id);
               $number = generateReportNumber();
               foreach ($request->invoice_id as $in) {

                   $new = new Deportation();
                   $new->report_id = $number;
                   $new->invoice_id = $in;
                   $new->amount = $request->net;
                   $new->unit_id = $request->unit_id;
                   $new->save();
                   $invoice = Invoice::find($in);
                   $invoice->withdrawl = 'yes';
                   $invoice->save();
               }


               session()->flash('success', trans('orbscope.success'));
               return redirect()->back();
           }else{

               return redirect()->back()->withErrors('لا يمكن اصدار تقرير بدون وجود اي عمليات');
           }



   }

   public function  deportation_archives($id){

       $unit=Unit::findOrFail($id);
       $reports = Deportation::where('unit_id',$id)->select('report_id')->groupBy('report_id')->get();
       return view('admin.deportation.show',compact('reports','unit'),['title'=>'تقارير الترحيلات لعقار'.' '.$unit->name]);

   }

   public function get_deportation_report($id){

      $show=Deportation::where('report_id',$id)->first();
      $invoices=Deportation::where('report_id',$id)->select('invoice_id')->get();
      $unit=Unit::find($show->unit_id);

       $argument=@$unit->argument->fee;
       if ($argument==null || empty($argument)){

           $argument=0;
       }

       $income_type=Invoicetype::where('type','income')->select('id')->get();
       $out_type=Invoicetype::where('type','outcome')->select('id')->get();
       $income=Invoice::whereIn('id',$invoices)->whereIn('type',$income_type)->with('flat')->with('invoicetype')->get();
       $netincome=Invoice::whereIn('id',$invoices)->whereIn('type',$income_type)->sum('amount');
       $outcome=Invoice::whereIn('id',$invoices)->whereIn('type',$out_type)->with('flat')->with('invoicetype')->get();
       $netoutcome=Invoice::whereIn('id',$invoices)->whereIn('type',$out_type)->sum('amount');
       $fee=$netincome * $argument / 100;
    return view('admin.deportation.archive',compact('income','outcome','netincome','netoutcome','unit','fee'),['title'=>'تقرير ترحيل رقم '.' '.$show->report_id.' '.'للعقار'.' '.$unit->name]);
   }







}
