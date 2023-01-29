<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientEmployee;
use App\ZipCode;
use App\Plan;
use App\PlanPrice;
use App\PlanDetail;
use Response;

class ClientController extends Controller
{
    public function checkExistingClient($name)
    {
        $flag = false;
        $clientExist = Client::where('name',$name)->first();
        if($clientExist!=null)
        {
            $flag = true;
        }
        
        return Response::json(['status'=>$flag]);
    }
    
    public function viewClients($id)
    {
        $clients = Client::where('user_id',$id)->get();
        if($clients!=null)
        {
            foreach($clients as $client)
            {
                $client['employees_count'] = ClientEmployee::where('client_id',$client['id'])->count();
            }
        }
        
        return Response::json(['data'=>$clients]);
        
    }
    
    public function addClient(Request $request)
    {
        $client_id = null;
        $client = Client::where('name',$request->name)->first();
        if($client==null)
        {
            $client = new Client();
            $client->user_id = $request->userid;
            $client->name = $request->name;
            $client->zip = $request->zip;
            $client->effective_date = $request->date;
            $client->save();
            
            $client_id = $client->id;
        }
        else
        {
            $client_id = $client['id'];
        }
        return Response::json(['data'=>$client_id]);
    }
    
    public function addEmployee(Request $request)
    {
        $employee = new ClientEmployee();
        $employee->client_id = $request->id;
        $employee->member_type = $request->type;
        $employee->f_name = $request->fname;
        $employee->l_name = $request->lname;
        $employee->dob = $request->dob;
        $employee->age = $request->age;
        $employee->save();
        
        return Response::json(['data'=>1]);
    }
    
    public function getCalculatedEmployees($id)
    {
        $planss = [];
        $client = Client::where('id','<>',null)->orderBy('id','DESC')->first();

        $quarter = null;
        
        //Our date.
        $dateStr = $client['effective_date'];
         
        //Get the month number of the date
        //in question.
        $month = date("n", strtotime($dateStr));
        
        $year = date('Y', strtotime($dateStr));
        
        $planExistCheck = PlanDetail::where('year',$year)->first();
        if($planExistCheck==null)
        {
            /* if no plan exist for this year */
            return Response::json(['data'=>2]);
        }
         
        //Divide that month number by 3 and round up
        //using ceil.
        $yearQuarter = ceil($month / 3);

        if($yearQuarter==1.0)
        {
            $quarter = '1st';
        }
        else if($yearQuarter==2.0)
        {
            $quarter = '2nd';
        }
        else if($yearQuarter==3.0)
        {
            $quarter = '3rd';
        }
        else
        {
            $quarter = '4th';
        }
        
        $zipcodeExist = ZipCode::where('zip_code',(int)$client['zip'])->first();
        if($zipcodeExist!=null)
        {
            $pres = $zipcodeExist['pres'];
            $bcbs = $zipcodeExist['bcbs'];
            $thnm = $zipcodeExist['thnm'];
            
            $employees = ClientEmployee::where('client_id',$client['id'])->get();
            
            $client['emp_count'] = sizeof($employees);
            
            $age = $employees[0]['age'];
             
                if($age>63)
                {
                    $age = '64+';
                }
  
            $planpricing = [];

            $planpricing[0] = PlanPrice::select('plan_prices.*','providers.logo')->join('providers','plan_prices.provider','=','providers.name')->where('plan_prices.county',$pres)->where('plan_prices.quarter',$quarter)->where('plan_prices.age',$age)->get();
            
            
            foreach($planpricing[0] as $pricing)
            {
                $sum = null;
                foreach($employees as $emp)
                {
                    $age = $emp['age'];
                    if($age>63)
                    {
                        $age = '64+';
                    }
                    $planss = PlanPrice::where('provider',$pricing['provider'])->where('plan_name',$pricing['plan_name'])->where('quarter',$quarter)->where('age',$age)->first();
                    $sum = $sum+floatval($planss['value']);
                  
                }
                $sum = round($sum, 2);
                $pricing['monthly_premium'] = $sum;
                $pricing['plan_details'] = PlanDetail::where('plan_name',$pricing['plan_name'])->where('provider','Presbyterian')->get();
            }
                
            $planpricing[1] = PlanPrice::select('plan_prices.*','providers.logo')->join('providers','plan_prices.provider','=','providers.name')->where('plan_prices.county',$bcbs)->where('plan_prices.quarter',$quarter)->where('plan_prices.age',$age)->get();
            
            
            foreach($planpricing[1] as $pricing)
            {
                $sum = null;
                foreach($employees as $emp)
                {
                    // $dateOfBirth = $emp['dob'];
                    // $today = date("Y-m-d");
                    // $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    
                    $age = $emp['age'];
                    
                    if($age>63)
                    {
                        $age = '64+';
                    }
                    $planss = PlanPrice::where('provider',$pricing['provider'])->where('plan_name',$pricing['plan_name'])->where('quarter',$quarter)->where('age',$age)->first();
                    $sum = $sum+floatval($planss['value']);
                   
                }
                $sum = round($sum, 2);
                $pricing['monthly_premium'] = $sum;
                $pricing['plan_details'] = PlanDetail::where('plan_name',$pricing['plan_name'])->where('provider','BCBS')->get();
            }
                
            $planpricing[2] = PlanPrice::select('plan_prices.*','providers.logo')->join('providers','plan_prices.provider','=','providers.name')->where('plan_prices.county',$thnm)->where('plan_prices.quarter',$quarter)->where('plan_prices.age',$age)->get();

            
            foreach($planpricing[2] as $pricing)
            {
                $sum = null;
                foreach($employees as $emp)
                {
                    
                    $age = $emp['age'];
                    
                //    $agee = (int)$diff->format('%y');
                    if($age>63)
                    {
                        $age = '64+';
                    }
                    $planss = PlanPrice::where('provider',$pricing['provider'])->where('plan_name',$pricing['plan_name'])->where('quarter',$quarter)->where('age',$age)->first();
                    $sum = $sum+floatval($planss['value']);
                }
                $sum = round($sum, 2);
                $pricing['monthly_premium'] = $sum;
                $pricing['plan_details'] = PlanDetail::where('plan_name',$pricing['plan_name'])->where('provider','THNM')->get();
            }
          return Response::json(['data'=>1,'plans'=>$planpricing,'client'=>$client,'msg'=>'success']);
        }
        else
        {
            return Response::json(['data'=>0]);
        }
    }
    
    public function filterPlans(Request $request)
    {
        
        $planss = [];
        $client = Client::where('id',$request->id)->first();
        
        $quarter = null;
        
        //Our date.
        $dateStr = $client['effective_date'];
         
        //Get the month number of the date
        //in question.
        $month = date("n", strtotime($dateStr));
         
        //Divide that month number by 3 and round up
        //using ceil.
        $yearQuarter = ceil($month / 3);

        if($yearQuarter==1.0)
        {
            $quarter = '1st';
        }
        else if($yearQuarter==2.0)
        {
            $quarter = '2nd';
        }
        else if($yearQuarter==3.0)
        {
            $quarter = '3rd';
        }
        else
        {
            $quarter = '4th';
        }
        
        $zipcodeExist = ZipCode::where('zip_code',(int)$client['zip'])->first();
        if($zipcodeExist!=null)
        {
            $pres = $zipcodeExist['pres'];
            $bcbs = $zipcodeExist['bcbs'];
            $thnm = $zipcodeExist['thnm'];
            
            $employees = ClientEmployee::where('client_id',$client['id'])->get();
            
            $client['emp_count'] = sizeof($employees);
            
            /*$dateOfBirth = $employees[0]['dob'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));*/
                
                $age = $employees[0]['age'];
                
                
                if($age>63)
                    {
                        $age = '64+';
                    }
                    
                //$agee = (int)$diff->format('%y');
                
            $name = $request->name;
            $planpricing = PlanPrice::select('plan_prices.*','providers.logo')->join('providers','plan_prices.provider','=','providers.name')->where('plan_prices.plan_name','like','%'.$name.'%')->whereIn('plan_prices.county',[$pres,$bcbs,$thnm])->where('plan_prices.quarter',$quarter)->where('plan_prices.age',$age)->get();
            foreach($planpricing as $pricing)
            {
                $sum = null;
                foreach($employees as $emp)
                {
                    /*$dateOfBirth = $emp['dob'];
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));*/
                    
                    $age = $emp['age'];
                    
                    //$agee = (int)$diff->format('%y');
                    
                    if($age>63)
                    {
                        $age = '64+';
                    }
                    $planss = PlanPrice::where('plan_name',$pricing['plan_name'])->where('quarter',$quarter)->where('age',$age)->first();
                    $sum = $sum+floatval($planss['value']);

                }
                $sum = round($sum, 2);
                $pricing['monthly_premium'] = $sum;
               
            }
          return Response::json(['data'=>1,'plans'=>$planpricing,'client'=>$client]);
        }
        else
        {
            return Response::json(['data'=>0]);
        }
    }
    
    public function comparePlans(Request $request)
    {//dd('yes');
        $requestObj = $request->all();
        $array = $requestObj[0]['array'];
        $plans = [];
        
        $client = Client::where('id',$requestObj[1])->first();
    
        $i = 0;
        foreach($array as $arr)
        {
            $sum = null;
            $planObj = PlanPrice::where('id',$arr)->first();
            $plans[$i] = PlanPrice::select('plan_prices.*','providers.logo')->join('providers','plan_prices.provider','=','providers.name')->where('plan_prices.id',$arr)->first();
            
            $employees = ClientEmployee::select('f_name','l_name','age','dob','member_type')->where('client_id',$client['id'])->get();
            
            foreach($employees as $emp)
            {
                /*$dateOfBirth = $emp['dob'];
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    
                    $age = $diff->format('%y');
                    
                    $agee = (int)$diff->format('%y');*/
                    
                    $age = $emp['age'];
                    
                        if($age>63)
                        {
                            $age = '64+';
                        }
                    
                    
                    $plan = PlanPrice::where('plan_name',$planObj['plan_name'])->where('provider',$planObj['provider'])->where('age',$age)->first();
                    
                    $emp['pricing'] = $plan['value'];
                    $sum = $sum+floatval($plan['value']);
            }
            $sum = round($sum, 2);
             $plans[$i]['monthly_premium'] = $sum;
             $plans[$i]['plan_details'] = PlanDetail::where('provider',$planObj['provider'])->where('plan_name',$planObj['plan_name'])->first();
             
             $deductible_individual_in_network = (int)$plans[$i]['plan_details']['deductible_individual_in_network'];
             $deductible_individual_out_network = (int)$plans[$i]['plan_details']['deductible_individual_out_network'];
             $deductible_family_in_network = (int)$plans[$i]['plan_details']['deductible_family_in_network'];
             $deductible_family_out_network = (int)$plans[$i]['plan_details']['deductible_family_out_network'];
             
             
             $out_of_pocket_max_individual_in_network = (int)$plans[$i]['plan_details']['out_of_pocket_max_individual_in_network'];
             $out_of_pocket_max_individual_out_network = (int)$plans[$i]['plan_details']['out_of_pocket_max_individual_out_network'];
             $out_of_pocket_max_family_in_network = (int)$plans[$i]['plan_details']['out_of_pocket_max_family_in_network'];
             $out_of_pocket_max_family_out_network = (int)$plans[$i]['plan_details']['out_of_pocket_max_family_out_network'];
             
             
              $plans[$i]['deductible_in']=number_format($deductible_individual_in_network,2);
             $plans[$i]['deductible_out']=number_format($deductible_individual_out_network,2);
             $plans[$i]['family_in']=number_format($deductible_family_in_network,2);
             $plans[$i]['family_out']=number_format($deductible_family_out_network,2);
             
             $plans[$i]['max_individual_in']=number_format($out_of_pocket_max_individual_in_network,2);
             $plans[$i]['max_individual_out']=number_format($out_of_pocket_max_individual_out_network,2);
             $plans[$i]['max_family_in']=number_format($out_of_pocket_max_family_in_network,2);
             $plans[$i]['max_family_out']=number_format($out_of_pocket_max_family_out_network,2);
             
             $plans[$i]['employees'] = $employees;
             $i++;
        }
        
        return Response::json(['data'=>$plans]);
    }
}