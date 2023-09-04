<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
     //agent dashboard method 
     public function AgentDashboard(){

        return view('agent.agent_dashboard');

    }//end method
}
