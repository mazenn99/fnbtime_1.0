<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContractRestaurant;
use App\Http\Requests\ContractRequest;
use Carbon\Carbon;

class ContractController extends Controller
{
    
    ##### show the view of contract
    public function contractPage($hash) {
        $contract =  ContractRestaurant::where('hash' , $hash)->first();
        return view('client.contract' , compact('contract'));
    }
    
    public function submitContract(ContractRequest $request) {
        
        $contract = ContractRestaurant::where('res_id' , $request->input('resID'))->first();
        $contract->update([
            'approve_at' => Carbon::now(),
            'signed_name' => $request->input('signedName'),
        ]);
        $contract->restaurant()->update(['approved' => 1]);
        return redirect()->back()->with(['success' => 'Thank you Very much Successfully Approved the Contract']);
    }
    
    
}
