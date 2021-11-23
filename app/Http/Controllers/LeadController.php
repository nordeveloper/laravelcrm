<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Source;
use App\Models\DealStage;
use App\Models\Leadstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Lead::all();
        $statuslist = Leadstatus::all();
        $responsilbleList = User::all();
        return view('lead.list', ['result'=>$result, 'statuslist'=>$statuslist, 'responsilbleList'=>$responsilbleList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $statuslist = Leadstatus::all();
        $sources = Source::all();
        return view('lead.add', ['statuslist'=>$statuslist,'users'=>$users, 'sources'=>$sources]);
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

        $model = new Lead();
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('lead.index')->with('success', 'Record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $users = User::all();
        $statuslist = Leadstatus::all();
        $sources = Source::all();
        return view('lead.add', ['result'=>$lead, 'statuslist'=>$statuslist,'users'=>$users, 'sources'=>$sources]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $formData = $request->input();

        $model = $lead;
        $model->modified_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('lead.index')->with('success', 'Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $data = $lead;
        $data->delete();
        return redirect()->route('lead.index')->with('success', 'Record successfully deleted');
    }
}
