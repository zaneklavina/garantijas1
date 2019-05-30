<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Contract;
use App\Project;
use App\Guarantee;
use App\ContractType;
class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contracts = DB::table('contracts')
        ->join('projects', 'projects.id', '=', 'contracts.project_id')
        ->join('contract_types', 'contract_types.id', '=', 'contracts.type')
        ->select('contracts.*', 'contract_types.contract_type')
        ->get();
        return view('layouts.contracts.index')->with('contracts', $contracts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ContractType::pluck('contract_type','id');
        $projects = Project::pluck('kods', 'id');
        return view('layouts.contracts.create', compact('types'),compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'project_id'=>'required',
            'contracts_nr'=>'required|max:191',
            'type'=>'required',
            'company_name'=>'required|max:191',
        ]);

        $contract = new Contract;
        $contract->project_id = $request->input('project_id');
        $contract->contracts_nr = $request->input('contracts_nr');
        $contract->type = $request->input('type');
        $contract->company_name = $request->input('company_name');
        $contract->name = $request->input('name');
        $contract->signed_at = $request->input('signed_at');
        $contract->starts_at = $request->input('starts_at');
        $contract->ends_at = $request->input('ends_at');
        $contract->amount = $request->input('amount');
        $contract->save();

        return redirect('/contracts')->with('success', 'Līgums pievienots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $contract = Contract::find($id);
        
        if (is_null($contract)) {
            return view ('layouts.error');
        };
        return view('layouts.contracts.show')->with('contract', $contract);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::find($id);
        $types = ContractType::pluck('contract_type','id');
        $projects = Project::pluck('kods', 'id');
        
        if (is_null($contract)) {
            return view ('layouts.error');
        };
        return view('layouts.contracts.edit', compact('types'),compact('projects'))->with('contract', $contract);
        
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
        
        $this->validate($request,[
            'project_id'=>'required',
            'contracts_nr'=>'required|max:191',
            'type'=>'required',
            'company_name'=>'required|max:191',
        ]);

        $contract =Contract::find($id);
        $contract->project_id = $request->input('project_id');
        $contract->contracts_nr = $request->input('contracts_nr');
        $contract->type = $request->input('type');
        $contract->company_name = $request->input('company_name');
        $contract->name = $request->input('name');
        $contract->signed_at = $request->input('signed_at');
        $contract->starts_at = $request->input('starts_at');
        $contract->ends_at = $request->input('ends_at');
        $contract->amount = $request->input('amount');
        $contract->save();

        return redirect('/contracts')->with('success', 'Līgums veiksmīgi rediģēts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract=Contract::find($id);
        $guarantee = Guarantee::where('contract_id', '=', $id);
        if (is_null($project)) {
            return view('layouts.error');
        };
        if (is_null($contract)){
        $contract->delete();
        return redirect('/contracts')->with('success', 'Līgums izdzēsts');
    }
    else return redirect('/contracts')->with('error', 'Līgumu nevar izdzēst, jo līgumam pastāv garantijas');
}
}