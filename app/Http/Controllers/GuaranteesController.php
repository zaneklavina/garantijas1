<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Contract;
use App\Project;
use App\Guarantee;
use App\ContractType;
use App\GuaranteeFirm;
use App\GuaranteeDetail;
use App\GuaranteeType;

class GuaranteesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guarantees = DB::table('guarantees')
        ->join('projects', 'projects.id', '=', 'guarantees.project_id')
        ->join('contracts', 'contracts.id', '=', 'guarantees.contract_id')
        ->join('guarantee_types', 'guarantee_types.id', '=', 'guarantees.type_id')
        ->join('guarantee_details', 'guarantee_details.id', '=', 'guarantees.b_aas_id')
        ->join('guarantee_firms', 'guarantee_firms.id', '=', 'guarantees.firm_id')
        ->select('guarantees.*', 'contracts.contracts_nr', 'projects.kods', 'guarantee_types.type',
                'guarantee_details.b_aas_apraksts', 'guarantee_firms.provider')
        ->get();
        return view('layouts.guarantees.index')->with('guarantees', $guarantees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::pluck('contracts_nr','id');
        $projects = Project::pluck('kods', 'id');
        $providers = GuaranteeFirm::pluck('provider','id');
        $type = GuaranteeType::pluck('type', 'id');
        $details =GuaranteeDetail::pluck('b_aas_apraksts', 'id');
        return view('layouts.guarantees.create',compact('projects','contracts','type','details'),compact('providers'));
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
            'contract_id'=>'required',
            'type_id'=>'required',
            'b_aas_id'=>'required',
            'number'=>'required|max:191',
            'amount'=>'required',
            'firm_id'=>'required',
            'starts'=>'required',
            'ends'=>'required', 
            'premija'=>'nullable',

        ]);

        $guarantee = new Guarantee;
        $guarantee->project_id = $request->input('project_id');
        $guarantee->contract_id = $request->input('contract_id');
        $guarantee->type_id = $request->input('type_id');
        $guarantee->number = $request->input('number');
        $guarantee->firm_id = $request->input('firm_id');
        $guarantee->b_aas_id = $request->input('b_aas_id');
        $guarantee->starts = $request->input('starts');
        $guarantee->ends = $request->input('ends');
        $guarantee->amount = $request->input('amount');
        $guarantee->premija =  $request->input('premija');
        $guarantee->save();

        return redirect('/guarantees')->with('success', 'Garantija pievienota');
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
        //
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
        //
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
}
