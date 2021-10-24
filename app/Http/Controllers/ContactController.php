<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Source;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Contact::all();
        return view('contact.list', ['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $sources = Source::all();
        return view('contact.add', ['users'=>$users, 'sources'=>$sources]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $formData = $request->input();

        $model = new Contact();
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('company.index')->with('success', 'Record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $users = User::all();
        $sources = Source::all();
        return view('contact.add', ['result'=>$contact, 'users'=>$users, 'sources'=>$sources]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $formData = $request->input();

        $model = Contact::find($id);
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('company.index')->with('success', 'Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Contact::find($id);
        $model->delete();
        return redirect()->route('contact.index')->with('success', 'Record successfully deleted');
    }
}
