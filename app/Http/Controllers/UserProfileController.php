<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
        

   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *  $addresses=Address::get();
     */
    
    public function show()
    {
        $user=User::with('crafts','addresses',)->where('id',auth()->user()->id)->first();

        //$user=User::with('crafts','addresses',)->where('id',$id)->first();
        $cities = Address::pluck('city_name', 'id');
        $village = Address::pluck('village_name', 'id');
        return view('userPage.userProfile',compact('user','cities','village'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       

    }
    public function update(Request $request)
    {


        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'number'=>'required|regex:/[69][0-9]{7}/',
            



        ]);
        

        $address=Address::where('village_name',$request->village_name)->first();

        user::where('id',auth()->user()->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'number' => $request->number,
            
            'address_id'=>$address->id
        ]);
        return redirect(route('userPage.userProfile',auth()->user()->id ));
    }
    /**
     * Update the specified resource in storage.
     */
    


    public function changePassword(Request $request)
    {
        $request->validate([
            'old' => 'required',
            'password' => 'required|confirmed',
        ]);
        if(!Hash::check($request->old, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with("status", "Password changed successfully!");

    }
    public function showPassChange(){

        return (view('userpage.changepass'));
    }



    public function changeImg(Request $req){
        $validator = Validator::make($req->all(),[
            'image'=>'required|image'
        ]);
        if ($validator->fails()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $imgName= md5(time()).'.'.$req->image->extension();
            $req->image->move(public_path('images'),$imgName);
            User::whereId(auth()->user()->id)->update([
                'image'=>$imgName
            ]);
            return response()->json(['status'=>1,'imgname'=>$imgName] );

        }
    }
    public function destroy(string $id)
    {
        //
    }
}
