<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use App\Mail;
use DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ContactsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if is admin
        if (Auth::user()->isAdmin()) {
            $contacts = Contact::orderBy('last_name', 'asc')->get();
        } else {
            $contacts = auth()->user()->contacts->sortBy('last_name');
        }

        return view('contacts.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        // Search bar method
        $search = $request->get('search');
        $user_id = ['user_id', auth()->user()->id];
        $contacts = DB::table('contacts')
            ->where([$user_id, ['state', 'like', '%' . $search . '%']])
            ->orWhere([$user_id, ['first_name', 'like', '%' . $search . '%']])
            ->orWhere([$user_id, ['last_name', 'like', '%' . $search . '%']])->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        Contact::create([
            'first_name' => request('first_name'),
            'middle_name' => request('middle_name'),
            'last_name' => request('last_name'),
            'address' => request('address'),
            'state' => request('state'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        if ($contact->isUnauthorizedUser($contact->user_id)) {
            return redirect('/')->with('error', __('messages.un_page'));
        }

        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        if ($contact->isUnauthorizedUser($contact->user_id)) {
            return redirect('/')->with('error', __('messages.un_page'));
        }

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if ($contact->isUnauthorizedUser($contact->user_id)) {
            return redirect('/')->with('error', __('messages.un_page'));
        }

        $contact->delete();

        return redirect('/');
    }
}
