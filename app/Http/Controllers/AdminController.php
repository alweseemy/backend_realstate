<?php

namespace app\Http\Controllers;
use App\DataTables\SelectUsersDataTable;
use App\Http\Controllers\Controller;
use App\VZool\malath_sms\src\Malath_SMS;
use App\Http\Middleware\Admin;
use App\Models\Contract;
use App\Models\Flat;
use App\Models\Invoice;
use App\Models\Invoicetype;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Unit;
Use DB;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    // Admin Login Page
    public function Login()
    {

        return view(AdminTheme().'.login');
    }




    // Admin Login Request
    public function Login_Request(Request $request)
    {
        $rules = ['email'=>'required|email','password'=>'required'];
        $validator = Validator::make($request->all(),$rules);
        $validator->SetAttributeNames(['email'=>trans('orbscope.email'),'password'=>trans('orbscope.password')]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            if(auth()->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$request->input('remember'))) {

                 if (auth()->user()->status=='inactive'){
                     return back()->withErrors(['خطاء' => 'هذا العضو غير مفعل']);
                 }
                return redirect(GetSettings()->admin_path);
            } else {
                session()->flash('error',trans('orbscope.fails_login'));
                return back()->withInput()->withErrors($validator);
            }
        }
    }

    // Admin Logout
    public function Logout()
    {
        auth()->logout();
        return redirect(GetSettings()->admin_path.'/login');
    }

    // Forget Password
    public function Forget_Password()
    {
        return view(AdminTheme().'.forget');
    }

    // Admin Index
    public function Index()
    {
        $month=date('m');
        $year=date('Y');
        $contract_end=Contract::whereMonth('end_date', $month)
            ->whereYear('end_date', $year)
            ->get();


        if (auth()->user()->type=='admin'){
            $units_count =Unit::count();
            $owner_count =User::where('type','owner')->count();
            $users_count =User::where('type','user')->count();
            $flats_rent=Flat::where('status','rented')->count();
            $flats_notrent=Flat::where('status','notrent')->count();
            //$orders=Order::groubBy('status')->get();
            $income_id=Invoicetype::where('type','income')->select('id')->get();
            $outincome_id=Invoicetype::where('type','outcome')->select('id')->get();
            $income_amount=Invoice::whereIn('type',$income_id)->sum('amount');
            $outcome_amount=Invoice::whereIn('type',$outincome_id)->sum('amount');

            $orders = Order::get()->groupBy('status');
            //dd($orders['new']->count());
            $month = date('m');
            $ord = Invoice::where('type',1)->select(
                DB::raw('sum(amount) as sums'),
                DB::raw("DATE_FORMAT(date,'%M %Y') as months")
            )
                ->groupBy('months')
                ->orderBy('sums','desc')
                ->get();

            if (count($ord)>0){

                foreach ($ord as $group) {
                    $count[] = $group;
                }


                $m= json_encode($count);
            }else{

                $m=null;
            }


        }else{
            $unit=Unit::where('user_id',auth()->id())->select('id')->get();
            $units_count =Unit::where('user_id',auth()->id())->count();
            $owner_count =User::where('manger_id',auth()->id())->where('type','owner')->count();
            $users_count =User::where('manger_id',auth()->id())->where('type','user')->count();
            $flats_rent=Flat::whereIn('unit_id',$unit)->where('status','rented')->count();
            $flats_notrent=Flat::whereIn('unit_id',$unit)->where('status','notrent')->count();
            $income_id=Invoicetype::where('type','income')->select('id')->get();
            $outincome_id=Invoicetype::where('type','outcome')->select('id')->get();
            $income_amount=Invoice::where('manger_id',auth()->id())->whereIn('type',$income_id)->sum('amount');
            $outcome_amount=Invoice::where('manger_id',auth()->id())->whereIn('type',$outincome_id)->sum('amount');

            //$orders=Order::where('manger_id',auth()->id())->whereIn('status',['progress','new'])->count();
            $orders = Order::where('manger_id',auth()->id())->get()->groupBy('status');

            $month = date('m');
            $ord = Invoice::where('type',1)->where('manger_id',auth()->id())->select(
                DB::raw('sum(amount) as sums'),
                DB::raw("DATE_FORMAT(date,'%M %Y') as months")
            )
                ->groupBy('months')
                ->orderBy('sums','desc')
                ->get();
           if (count($ord)>0){

               foreach ($ord as $group) {
                   $count[] = $group;
               }


               $m= json_encode($count);
           }else{

               $m=null;
           }




        }


        return view('admin.home.index',compact('flats_rent','flats_notrent','orders'),[
            'title'=>GetSettings()->name,
            'edit'  => Setting::orderBy('id','desc')->first(),
            'orders'=>$orders,
            'units_count'=>$units_count,
            'users_count'=>$users_count,
            'owner_count'=>$owner_count,
            'income_amount'=>$income_amount,
            'outcome_amount'=>$outcome_amount,
            'm'=>$m,
            'contract_end'=>$contract_end,
            ]);


    }

   public function contact_users(){



            $units=Unit::all();


        return view('admin.contact_users.index',compact('units'),['title'=>trans('orbscope.communication_with_clients')]);
   }

   public function get_users(Request $request){

       if ($request->unit != null && $request->type == null){

           $flat=Contract::where('unit_id',$request->unit)->where('status','progress')->select('user_id')->get()->toArray();
           $unit=Unit::find($request->unit);
           $owner=$unit->owner_id;
           if ($owner != null){
               $m=array('user_id'=>$owner);
               $flat[] = $m;
           }
           $users=User::whereIn('id',$flat)->get();
       }elseif($request->unit == null && $request->type != null){

           $users=User::where('type',$request->type)->get();
       }elseif ($request->unit != null && $request->type != null){
           if ($request->type=='user'){

               $flat=Contract::where('unit_id',$request->unit)->where('status','progress')->select('user_id')->get();
               $users=User::whereIn('id',$flat)->get();
           }else{
               $unit=Unit::find($request->unit);
               $owner=$unit->owner_id;
               $users=User::where('id',$owner)->get();

           }

       }else{

           $users=User::whereIn('type',['user','owner'])->get();

       }

       return view('admin.contact_users.show',compact('users'),['title'=>trans('orbscope.communication_with_clients')]);


   }

   public function send_sms(Request $request){
       $m=implode( ',', $request->type);
       $DTT_SMS    = new Malath_SMS\Malath_SMS('alphaprop', 'A135790', 'UTF-8');
       $Originator=GetSettings()->sender_name;
       $Mobiles=$m;
       $Send = $DTT_SMS->Send_SMS($Mobiles, $Originator, $request->message);
       if ($Send['SEND_FAIL']=='FAIL'){
           session()->flash('send_sms_error',trans('orbscope.send_sms_error'));
           return redirect()->back();
       }else{

           session()->flash('success',trans('orbscope.success'));
           return redirect()->back();
       }
   }



}
