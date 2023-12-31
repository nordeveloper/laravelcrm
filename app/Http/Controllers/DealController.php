<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\Source;
use App\Models\Contact;
use App\Models\DealStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {          
        $result = Deal::with('contact')->get();

        $statuslist = false; //DealStage::all();
        $responsilbleList = false; //User::all();

        return view('deal.list', ['result'=>$result, 'statuslist'=>$statuslist, 'responsilbleList'=>$responsilbleList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $stages = DealStage::get();
        $sources = Source::get();
        $contacts = Contact::get();
        return view('deal.add', compact('stages', 'users', 'sources', 'contacts'));
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
            'title' => 'required|max:255'
        ]);

        $formData = $request->input();

        $model = new Deal();
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('deal.index')->with('success', 'Record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $users = User::all();
        $stages = DealStage::all();
        $sources = Source::all();
        return view('deal.edit',['result'=>$deal, 'stages'=>$stages, 'users'=>$users, 'sources'=>$sources]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $formData = $request->input();

        $model = $deal;
        $model->modified_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('deal.index')->with('success', 'Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('deal.index')->with('success', 'Record successfully deleted');
    }
}
