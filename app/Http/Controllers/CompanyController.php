<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Source;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Company::all();
        return view('company.list', ['result'=>$result]);
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
        return view('company.add', ['users'=>$users, 'sources'=>$sources]);
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

        $model = new Company();
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('company.index')->with('success', 'Record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $users = User::all();
        $sources = Source::all();

        return view('company.edit',['result'=>$company, 'users'=>$users, 'sources'=>$sources]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $formData = $request->input();

        $model = Company::find($id);
        $model->created_by = Auth::id();
        $model->fill($formData);
        $model->save();

        return redirect()->route('company.index')->with('success', 'Record successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Company::find($id);
        $model->delete();
        return redirect()->route('company.index')->with('success', 'Record successfully deleted');
    }
}
