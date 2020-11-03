<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\User;
use DB;

class ClientController extends Controller
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
        $clients = Client::all();
        return view('client.index')->with(['clients' => $clients]);
    }

    public function create()
    {
        return view ('client.create');
    }

    /**
     * Search clients using Client ID
     * 
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
    /* $search = $request->get('search');
       $clients = DB::table('clients')->where('clients', 'like', '%'.$search.'%')->paginate(5);
       return view('client.index',['clients' => $clients]);
    */

       $search = $request->get ( 'search' );
       $clients = DB::table('clients')->where('clientsn', 'LIKE', '%'.$search.'%')->paginate(5);
       if(count($clients) > 0)
          //return view('client.index')->withDetails($clients)->withQuery ( $search );
          return view('client.index',['clients' => $clients]);
       else
          //return view ('client.index',['company not found']);
          //return view('client.index',['clients' => $search])->with('Not found');
            return view('client.index',['clients' => $clients])->withErrors(['No company found, please try again']);
    }

    public function store(Request $request)
    {
       
            $this->validate($request,[
                'clientsn' => 'required', 
                'companyname' => 'required', 
                'propname' => 'required',
                'propphone1' => 'required', 
                'propphone2' => 'required', 
                'assistant' => 'required',
                'asstphone1' => 'required', 
                'asstphone2' => 'required', 
                'bussphone' => 'nullable',
                'email' => 'nullable', 
                'destination' => 'required', 
                'transport' => 'required',
                'shipping_address' => 'required',
                'address' => 'required'],
            [
                'clientsn.required' => 'Client serial number is required',
                'companyname.required' => 'Company name is required',
                'propname.required' => 'Proprietor name is required',
                'propphone1.required' => 'Proprietor number #1 is required',
                'propphone2.required' => 'Proprietor number #2 is required',
                'assistant.required' => 'Asssitant name is required',
                'asstphone1.required' => 'Asssitant number #1 is required',
                'asstphone2.required' => 'Asssitant number #2 is required',
                'destination.required' => 'Destination field is required',
                'transport.required' => 'Transport field is required',
                'shipping_address.required' => 'Shipping address is required',
                'address.required' => 'Address is required',
            ]);
            

        //handle File Upload
   /*     if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientoriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images/', $fileNameToStore);
        }else{
            $fileNameToStore = 'failed.jpg';
        } */

        //create Client
        $client = new Client;
      //  $client->client_id = $request->input('client_id');
        $client->clientsn = $request->input('clientsn');
        $client->companyname = $request->input('companyname');
        $client->propname = $request->input('propname');
        $client->propphone1 = $request->input('propphone1');
        $client->propphone2 = $request->input('propphone2');
        $client->assistant = $request->input('assistant');
        $client->asstphone1 = $request->input('asstphone1');
        $client->asstphone2 = $request->input('asstphone2');
        $client->bussphone = $request->input('bussphone');
        $client->email = $request->input('email');
        $client->destination = $request->input('destination');
        $client->transport = $request->input('transport');
        $client->shipping_address = $request->input('shipping_address');
        $client->address = $request->input('address');
        $client->save();

        return redirect('/client')->with('success', 'New client added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //$body = htmlspecialchars_decode($body);
        return view('client.show')->with('user', $user);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        //$body = htmlspecialchars_decode($body);
        return view('client.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client_id)
    {
        $this->validate($request,[
            'clientsn' => 'required', 
            'companyname' => 'required', 
            'propname' => 'required',
            'propphone1' => 'required', 
            'propphone2' => 'required', 
            'assistant' => 'required',
            'asstphone1' => 'required', 
            'asstphone2' => 'required', 
            'bussphone' => 'nullable',
            'email' => 'nullable', 
            'destination' => 'required', 
            'transport' => 'required',
            'shipping_address' => 'required',
            'address' => 'required'],
        [
            'clientsn.required' => 'Client serial number is required',
            'companyname.required' => 'Company name is required',
            'propname.required' => 'Proprietor name is required',
            'propphone1.required' => 'Proprietor number #1 is required',
            'propphone2.required' => 'Proprietor number #2 is required',
            'assistant.required' => 'Asssitant name is required',
            'asstphone1.required' => 'Asssitant number #1 is required',
            'asstphone2.required' => 'Asssitant number #2 is required',
            'destination.required' => 'Destination field is required',
            'transport.required' => 'Transport field is required',
            'shipping_address.required' => 'Shipping address is required',
            'address.required' => 'Address is required',
        ]);
        
        /*Handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientoriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images/', $fileNameToStore);
        }*/

        $client = Client::find($client_id);
        $client->clientsn = $request->input('clientsn');
        $client->companyname = $request->input('companyname');
        $client->propname = $request->input('propname');
        $client->propphone1 = $request->input('propphone1');
        $client->propphone2 = $request->input('propphone2');
        $client->assistant = $request->input('assistant');
        $client->asstphone1 = $request->input('asstphone1');
        $client->asstphone2 = $request->input('asstphone2');
        $client->bussphone = $request->input('bussphone');
        $client->email = $request->input('email');
        $client->destination = $request->input('destination');
        $client->transport = $request->input('transport');
        $client->shipping_address = $request->input('shipping_address');
        $client->address = $request->input('address');
        //$post->cover_image = $fileNameToStore;
        $client->save();

        return redirect('/client')->with('success', 'Client updated');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
//        if(auth()->user()->id !== $client->client_id){
   //         return redirect('/posts')->with('error', 'Unauthorized page');
    //   }

  //      if($post->cover_image != 'failed.jpg'){
            //delete image
  //          Storage::delete('public/cover_images/'.$post->cover_image);
  //      }

        $client->delete();
        return redirect('/client')->with('success', 'Data Removed');
    }

    public function printPDF($id)
    {
        $client = Client::find($id);
        $client = Client::loadview('client', $client);
        return $client->download('example.pdf');
        
    }

    public function list()
    {
        return Client::all()->toJson();
    }
}
