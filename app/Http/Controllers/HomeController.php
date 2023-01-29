<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Load;
use App\User;
use App\Vehicle;
use App\Driver;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =User::findorFail(Auth::id());

          return view('admin.welcome',compact('user'));
    }

    public function createLoad(){

        return view('admin.createLoad');

    }

    public function showLoads(){

        return view('admin.showLoads');


    }
    public function store(Request $request){

        //dd(Auth::id());
//            dd($request);
 
        $originalDate = $request['pickup'];
        $PickUpDate = date("Y-m-d", strtotime($originalDate));
        
        $originalDate = $request['destination'];
        $DestinationDate = date("Y-m-d", strtotime($originalDate));
        
               $load = new Load;

            $load->user_id = Auth::id();
            $load->customer = $request['customer'];
            $load->pickup_date =$PickUpDate;
            $load->destination_date =$DestinationDate;
            $load->pickup_location =$request['pickup_location'];
            $load->drop_off_location =$request['drop_off_location'];
            $load->distance =   $request['distance'];
            $load->description =    $request['description'];
            $load->quantity =   $request['quantity'];
            $load->customer_reference = $request['customer_reference'];
            $load->load_number =    $request['load_number'];
            $load->additional_details = $request['additional_details'];
            $load->vehicle =$request['vehicle'];
            $load->driver =$request['driver'];
            $load->notes =$request['notes'];
            $load->Rate =$request['rate'];
            $load->save();

            return back()->with('Success','Load created successfully');

    }

            public function profile(){

                return view('admin.profile');
            }

            public function editProfile(Request $request){


         $user = Auth::user();
            
                $user->first_name = $request['first_name'];
                $user->last_name = $request['last_name'];
                $user->company_name = $request['company_name'];
                $user->mobile = $request['mobile'];
                $user->email = $request['email'];
                $user->save();


    if($request['old_password'] != ""){

            if($request['new_password'] != $request['conf_password']){
                return back()->with('error','New passwords dont match.');
            }       
                if(!Hash::check($request['old_password'],Auth::user()->password)){
                    return back()->with('error','Sorry given password and current password does not match');
                    }
                     if(strcmp($request['old_password'],$request['new_password'])==0){
                            return back()->with('error','Sorry your old password can not be ur new password');

                        }
                        else{
                                
                                    $user->password =bcrypt($request['new_password']);
                                        $user->save();
                                            return back()->with('success','password updated successfully');

                        }

                                                return back()->with('error','old password empty');
            }



                return back()->with('success','Updated successfully');




            }

            public function editLoad($id){
                $load = Load::where('id',$id)->where('user_id',Auth::id())->first();


           return view('admin.editLoad',compact('load'));
            }

            public function storeEditLoad(Request $request,$id){

               $originalDate = $request['pickup'];
        $PickUpDate = date("Y-m-d", strtotime($originalDate));
        
        $originalDate = $request['destination'];
        $DestinationDate = date("Y-m-d", strtotime($originalDate));
        
               $load = Load::findorFail($id);

            $load->user_id = Auth::id();
            $load->customer = $request['customer'];
            $load->pickup_date =$PickUpDate;
            $load->destination_date =$DestinationDate;
            $load->pickup_location =$request['pickup_location'];
            $load->drop_off_location =$request['drop_off_location'];
            $load->distance =   $request['distance'];
            $load->description =    $request['description'];
            $load->quantity =   $request['quantity'];
            $load->customer_reference = $request['customer_reference'];
            $load->load_number =    $request['load_number'];
            $load->additional_details = $request['additional_details'];
            $load->vehicle =$request['vehicle'];
            $load->driver =$request['driver'];
            $load->notes =$request['notes'];
            $load->Rate =$request['rate'];
            $load->save();

            return back()->with('Success','Load Updated successfully');
            }


            public function deleteLoad($id){

                $loadDelete = Load::findorFail($id);

                $loadDelete->delete();

                return back()->with('success','Load deleted successfully');

            }

            public function showVehicles(){
                $vehicles = Vehicle::all();
                return view('admin.vehicles',compact('vehicles'));
            }

            public function createVehicle(Request $request){

                    $vehicle = new Vehicle;

                    $vehicle->user_id = Auth::id();
                    $vehicle->unit_number = $request['unit_number'];
                    $vehicle->vehicle_name = $request['vehicle_name'];
                    $vehicle->vehicle_description = $request['vehicle_description'];
                    $vehicle->vehicle_type = $request['vehicle_type'];
                    $vehicle->registration_plate = $request['registration_plate'];
                    $vehicle->year = $request['year'];
                    $vehicle->make = $request['make'];
                    $vehicle->VIN = $request['vin'];
                    $vehicle->gross_combined_mass = $request['gross_combined_mass'];
                    $vehicle->save();

                    return redirect('/vehicles')->with('success','Vehicle created successfully');


            }

                public function editVehicle($id){

                    $vehicle = Vehicle::where('user_id',Auth::id())->where('id',$id)->first();
                    //dd($id);
                    return view('admin.editVehicle',compact('vehicle'));
                }

                   public function storeEditVehicle(Request $request ,$id){

                    //dd($request,$id);
                    $vehicle = Vehicle::where('id',$id)->where('user_id',Auth::id())->first();

                    $vehicle->user_id = Auth::id();
                    $vehicle->unit_number = $request['unit_number'];
                    $vehicle->vehicle_name = $request['vehicle_name'];
                    $vehicle->vehicle_description = $request['vehicle_description'];
                    $vehicle->vehicle_type = $request['vehicle_type'];
                    $vehicle->registration_plate = $request['registration_plate'];
                    $vehicle->year = $request['year'];
                    $vehicle->make = $request['make'];
                    $vehicle->VIN = $request['vin'];
                    $vehicle->gross_combined_mass = $request['gross_combined_mass'];
                    $vehicle->save();

                    return redirect('/vehicles')->with('success','Vehicle updated successfully');
                }

            public function showDrivers(){
 //               User::find(1)->phone;
                $drivers =Driver::where('user_id',Auth::id())->get();

         // return view('admin.welcome',compact('user'));
                return view('admin.drivers',compact('drivers'));
            }

            public function createDrivers(){
                $trucks = Vehicle::where('user_id',Auth::id())->where('vehicle_type','0')->get();
                $trailers = Vehicle::where('user_id',Auth::id())->where('vehicle_type','1')->get();

                return view('admin.createDrivers',compact('trucks','trailers'));

            }

                public function storeDrivers(Request $request){


//                    dd($request);
                              //dd(Auth::id());
                        //            dd($request);
                    if($request['truck'] !=Null){
                        $vehiclePreference = $request['truck']; 
                    }
                    elseif ($request['trailer'] !=Null) {
                            $vehiclePreference = $request['trailer'];
                        }
                        else{
                            $vehiclePreference = Null ;
                        }
                    
//                    dd($vehiclePreference);

                                $originalDate = $request['license_expiry'];
                              $licenseExpDate   = date("Y-m-d", strtotime($originalDate));
                                                                
                                       $driver = new Driver;

                                    $driver->user_id = Auth::id();
                                    $driver->name = $request['name'];
                                    $driver->surname = $request['surname'];
                                    $driver->id_number = $request['id_number'];
                                    $driver->license_number = $request['license_number'];
                                    $driver->license_expiry_date = $licenseExpDate;
                                    $driver->vehicle_preference = $vehiclePreference;
                                    $driver->save();

                                    return redirect('drivers')->with('Success','Driver added successfully');

    }

                    public function editDriver($id){
                            
                            $trucks = Vehicle::where('user_id',Auth::id())->where('vehicle_type','0')->get();
                            $trailers = Vehicle::where('user_id',Auth::id())->where('vehicle_type','1')->get();
                            $driver = Driver::where('user_id',Auth::id())->where('id',$id)->first();
                            
                            return view('admin.editDriver',compact('driver','trucks','trailers'));

                    }

                    public function storeEditDrivers(Request $request,$id){

//                        dd($request,$id);

                        //                    dd($request);
                              //dd(Auth::id());
                        //            dd($request);
                    if($request['truck'] !=Null){
                        $vehiclePreference = $request['truck']; 
                    }
                    elseif ($request['trailer'] !=Null) {
                            $vehiclePreference = $request['trailer'];
                        }
                        else{
                            $vehiclePreference = Null ;
                        }
                    
//                    dd($vehiclePreference);

                                $originalDate = $request['license_expiry'];
                              $licenseExpDate   = date("Y-m-d", strtotime($originalDate));
                                                                
                                       $driver = Driver::findorFail($id);

                                    $driver->user_id = Auth::id();
                                    $driver->name = $request['name'];
                                    $driver->surname = $request['surname'];
                                    $driver->id_number = $request['id_number'];
                                    $driver->license_number = $request['license_number'];
                                    $driver->license_expiry_date = $licenseExpDate;
                                    $driver->vehicle_preference = $vehiclePreference;
                                    $driver->save();

                                    return redirect('drivers')->with('Success','Driver updated successfully');


                    }

}
