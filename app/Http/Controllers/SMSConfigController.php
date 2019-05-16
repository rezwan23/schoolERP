<?php

namespace App\Http\Controllers;

use App\Models\SmsConfig;
use App\Models\SmsGroup;
use App\Models\SmsGroupMember;
use App\Services\SMS\Facades\SMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSConfigController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function showConfigForm()
    {
        return view('sms.config', [
            'config'    =>  SmsConfig::find(1),
        ]);
    }

    public function saveConfig(Request $request)
    {
        $config = SmsConfig::find(1);
        if($config){
            $config->update([
                'username'  =>  encrypt($request->username),
                'password'  =>  encrypt($request->password),
                'masking_name'  =>  encrypt($request->masking_name),
                'quantity'      =>  encrypt($request->quantity),
            ]);
        }else{
            SmsConfig::create([
                'username'  =>  encrypt($request->username),
                'password'  =>  encrypt($request->password),
                'masking_name'  =>  encrypt($request->masking_name),
                'quantity'      =>  encrypt($request->quantity),
            ]);
        }
        return back();
    }

    public function newSms()
    {
        return view('sms.new', ['config'=>SmsConfig::all()->first()]);
    }

    public function newSmsSend(Request $request)
    {
        $config = SmsConfig::all()->first();
        $username = decrypt($config->username);
        $password = decrypt($config->password);
        $masking_name   = decrypt($config->masking_name);
        $decryptValue = decrypt($config->quantity);
        $length =  strlen($request->message);
        $msgCount = 0;
        if($length>160){
            $msgCount = (int)($length/160);
        }
        if($length%160>0){
            $msgCount++;
        }
        if(strpos($request->to, ',')!==false){
            return back()->withErrors(['error-message'=>'Please send text to one recipient']);
        }
        if($msgCount>$decryptValue)
        {
            return back()->withErrors(['error-message'=>'You don\'t have enough balance!']);
        }
        $balance = encrypt((int)$decryptValue-$msgCount);
        $res = SMS::username($username)->password($password)->to($request->to)->message($request->message)->send()->toObject();
        if($res == 1101){
            $config->quantity = $balance;
            $config->update();
            return back()->with('success-message', 'Message Sent!');
        }
        return back()->withErrors(['error-message'=>'Message not sent']);
    }

    public function groupSms()
    {
        return view('sms.group.new', ['groups'=>SmsGroup::all(),'config'=>SmsConfig::all()->first()]);
    }
    public function groupSmsSend(Request $request)
    {
        $group = SmsGroup::find($request->group_id);
        $config = SmsConfig::all()->first();
        $username = decrypt($config->username);
        $password = decrypt($config->password);
        $masking_name = decrypt($config->masking_name);
        $decryptValue = decrypt($config->quantity);
        $length = strlen($request->message);
        $msgCount = 0;
        if ($length > 160) {
            $msgCount = (int)($length / 160);
        }
        if ($length % 160 > 0) {
            $msgCount++;
        }
        $total_msg = $group->members->count()*$msgCount;
        if($total_msg>$decryptValue){
            return back()->withErrors(['error-message'=>'Not enouth balance']);
        }
        $flag = 0;
        $i = 0;
        foreach ($group->members as $member) {
            $res = SMS::username($username)->password($password)->to($member->phone_no)->message($request->message)->send()->toObject();
            if ($res == 1101) {
                $i++;
            }else{
                $flag=1;
                continue;
            }
        }
        $msgCount*=$i;
        $balance = encrypt((int)$decryptValue-$msgCount);
        $config->quantity = $balance;
        $config->update();
        if($flag){
            return back()->with('success-message', 'Message sent!');
        }else{
            return back()->withErrors(['error-message'=>'All messages may not be sent!']);
        }
    }
    public function index()
    {
        return view('sms.index', ['smss'=>SmsHistory::all()]);
    }

    public function createGroup()
    {
        return view('sms.group.create');
    }

    public function storeGroup(Request $request)
    {
//        return $request;
        if($request->hasFile('list')){

            $this->validate($request, [
                'list'  =>  'required|mimes:csv,txt',
            ]);
            $id = SmsGroup::create(['group_name'=>$request->name])->id;
            if(($handle = fopen($_FILES['list']['tmp_name'], 'r'))!=false){
                fgetcsv($handle);
                while(($data = fgetcsv($handle, 1000, ','))!=false){
                    $list[]= [
                        'name' => $data[0],
                        'phone_no'=> '0'.$data[1],
                        'sms_group_id'  =>  $id,
                        'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                    ];
                }
                if(count($list)>0){
                    SmsGroupMember::insert($list);
                    return back()->with('success-message', 'Data uploaded Successfully!');
                }
            }
            return redirect()->route('customer.index')->with('error-message', 'Opps! Something went wrong. Refresh and try again..');
        }
    }

}
