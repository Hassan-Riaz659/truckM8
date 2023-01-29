<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\PlanRate;
use App\ZipCode;
use App\PlanPrice;
use Response;
use Auth;
use Session;
use DateTime;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index',compact('companies'));
    }
    
    public function createList()
    {
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/marketing/lists",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"name\":\"Contact List\"}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
    }
    
    public function addCompany()
    {
        return view('admin.companies.add-company');
    }
    
    public function addCompanyPost(Request $request)
    {
        $company=new Company();
        $company->name=$request->name;
        $company->email=$request->email;
        $company->phone=$request->phone;
        $company->save();
        
        Session::flash('message', 'Company Added successfully!'); 
    	Session::flash('alert-class', 'alert-success'); 
    	return back();
    }
    
    public function calculateEstimate(Request $request)
    {
        // $zip_code=ZipCode::where('zip_code',$request->zip_codes)->first();
        // $county=$zip_code->zip_code;
        
        // $dob=$request->dob;
        // $date=date_create($dob);
        
        // $new_date=date_format($date,"Y/m/d");
        
        // $tz  = new \DateTimeZone('Europe/Brussels');
        // $age = DateTime::createFromFormat('Y/d/m', $new_date, $tz)
        //  ->diff(new DateTime('now', $tz))
        //  ->y;

        // $effective_date=$request->effective_date;
        // $month = date("n", strtotime($effective_date));

        // $yearQuarter = ceil($month / 3);
        // $quarter=null;
        // if($yearQuarter == 1.0){
        //     $quarter='1st';
        // }elseif($yearQuarter == 2.0){
        //     $quarter='2nd';
        // }elseif($yearQuarter == 3.0){
        //     $quarter='3rd';
        // }else{
        //     $quarter='4th';
        // }
        $plan_details=PlanPrice::where('id',"<",10)->where('provider','Presbyterian')->get();
        
         return response(['plan_details' => $plan_details,'status'=>1]);
    }
    
    public function calculateCensus()
    {
        return view('admin.quote.calculate-census');
    }
}
