<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Agent;
use App\Http\Resources\AgentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $agents = new Agent();
        if($request->q){
            $agents = $agents->where('title','like',"%{$request->q}%");
        }
        $agents = $agents->paginate(10)->onEachSide(1)->appends(request()->query());
        $agents = AgentResource::collection($agents);
        return view('pages.agent.index' , compact('agents'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.agent.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'company_cost' => 'required|integer',
            'mark_up' => 'required|string|max:255',
            'date_of_travel' => 'required|date',
            'services' => 'required|array',
            'services.*.service_name' => 'required|string|max:255',
        ]);

        $userId = Auth::id();
        $customer_name = $request->input('customer_name');
        $company_cost = $request->input('company_cost');
        $mark_up = $request->input('mark_up');
        $date_of_travel = $request->input('date_of_travel');
        
        $agentdetails = Agent::create([
            'user_id' => $userId, 
            'customer_name' => $customer_name,
            'company_cost' => $company_cost,
            'mark_up' => $mark_up,
            'date_of_travel' => $date_of_travel,
        ]);

        // Store services
        foreach ($validatedData['services'] as $services) {
            Service::create([
                'agent_id' => $agentdetails->id, 
                'service_name' => $services['service_name'],
            ]);
        }
       
        return response()->json(['message' => 'Agent and services stored successfully.'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the agent by ID and load related services
        $agent = Agent::findOrFail($id);
        $agent->load('services'); // Eager load services relationship
        
        return view('pages.agent.show', compact('agent'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
