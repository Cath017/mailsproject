<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Contact;

class MailsController extends Controller
{
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

        session()->flash('message', 'The dates have been added');

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

        session()->flash('message', 'The dates have been updated.');

        return redirect()->back();
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

        session()->flash('message', 'The dates have been deleted!');

        return redirect()->back();
    }
}
