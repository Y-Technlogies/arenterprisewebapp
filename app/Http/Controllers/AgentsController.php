<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Agent;
use DB;

class AgentsController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index')->with(['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'agents_sn' => 'required', 
            'agents_fname' => 'required', 
            'agents_lname' => 'required',
            'agent_contact' => 'required', 
            'agent_email' => 'nullable',
            'salesdivision' => 'required', 
            'agentaddress' => 'required', 
            'agentimage' => 'image|nullable|max:1999'],
        [
            'agents_sn.required' => 'Agent serial number is required',
            'agents_fname.required' => 'First name is required',
            'agents_lname.required' => 'Last name is required',
            'agent_contact.required' => 'Contact number is required',
            'salesdivision.required' => 'Sales division is required',
            'agentaddress.required' => 'Address is required',
        ]);
        

    //handle File Upload
    if($request->hasFile('agentimage')){
        //Get filename with the extension
        $filenameWithExt = $request->file('agentimage')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('agentimage')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('agentimage')->storeAs('public/agentimage/', $fileNameToStore);
    }else{
        $fileNameToStore = 'failed.jpg';
    }


    //create Agent
    $agent = new Agent;
  //$client->client_id = $request->input('client_id');
    $agent->agents_sn = $request->input('agents_sn');
    $agent->agents_fname = $request->input('agents_fname');
    $agent->agents_lname = $request->input('agents_lname');
    $agent->agent_contact = $request->input('agent_contact');
    $agent->agent_email = $request->input('agent_email');
    $agent->salesdivision = $request->input('salesdivision');
    $agent->agentaddress = $request->input('agentaddress');
    $agent->agentimage = $fileNameToStore;
    $agent->save();

    return redirect('/agents')->with('success', 'New agent added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('agents.edit')->with('agent', $agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agents_id)
    {
        $this->validate($request,[
            'agents_sn' => 'required', 
            'agents_fname' => 'required', 
            'agents_lname' => 'required',
            'agent_contact' => 'required', 
            'agent_email' => 'nullable',
            'salesdivision' => 'required', 
            'agentaddress' => 'required', 
            'agentimage' => 'image|nullable|max:1999'],
        [
            'agents_sn.required' => 'Agent serial number is required',
            'agents_fname.required' => 'First name is required',
            'agents_lname.required' => 'Last name is required',
            'agent_contact.required' => 'Contact number is required',
            'salesdivision.required' => 'Sales division is required',
            'agentaddress.required' => 'Address is required',
        ]);
        
        /*Handle file upload*/
        if($request->hasFile('agentimage')){
            //Get filename with the extension
            $filenameWithExt = $request->file('agentimage')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('agentimage')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('agentimage')->storeAs('public/agentimage/', $fileNameToStore);
        }else{
            $fileNameToStore = 'failed.jpg';
        }

        
      $agent = Agent::find($agents_id);
      $agent->agents_sn = $request->input('agents_sn');
      $agent->agents_fname = $request->input('agents_fname');
      $agent->agents_lname = $request->input('agents_lname');
      $agent->agent_contact = $request->input('agent_contact');
      $agent->agent_email = $request->input('agent_email');
      $agent->salesdivision = $request->input('salesdivision');
      $agent->agentaddress = $request->input('agentaddress');
      if($request->hasFile('agentimage')){
        $agent->agentimage = $fileNameToStore;   
        }   
      $agent->save();
  
      return redirect('/agents')->with('success', 'Agent updated');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        return Agent::all()->toJson();
    }
}
