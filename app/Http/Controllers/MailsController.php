<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Contact;

class MailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contact $contact)
    {
        $contact->addMail(request('delivered'), request('posted'));
        //    $mail = $contact->addMail(new Mail(request(['delivered', 'posted'])));
        
        // Mail::create([
        //     'delivered'=> request('delivered'),
        //     'posted'=> request('posted'),
        //     'contact_id'=> $contact->id
        // ]);

        session()->flash('message', __('messages.msg_add'));

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mail = Mail::findOrFail($id)->update($request->all());

        session()->flash('message', __('messages.msg_update'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mail::findOrFail($id)->delete();

        session()->flash('message', __('messages.msg_delete'));

        return back();
    }
}
