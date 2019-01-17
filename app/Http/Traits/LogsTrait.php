<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

trait LogsTrait {
	
	/**
     * Insert the event executed in the logs table.
     *
     * @param  string  $action
     * @param  string  $params
     * @return bool
     */
    public function insertLog($action, $params = NULL)
    {
		
		$log = array();
		$log["username"] = Auth::user()->username;
		$log["action"] = $action;
		$log["params"] = $params;
		$log["ipaddress"] = \Request::ip();
		$log["event_timestamp"] = now()->toDateTimeString();
		
		return DB::table('logs')->insert($log);
	}
}