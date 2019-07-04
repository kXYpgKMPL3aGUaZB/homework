<?php

namespace App\Http\Controllers;

use App\Cron;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Handle an index request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function index(Request $request, $name)
    {
        //
        if ($request->ajax()) {
            $value = Cron::where('name', $name)->value('enabled');
            if ($value !== null) {
                return [
                    'name' => $name,
                    'value' => filter_var($value, FILTER_VALIDATE_BOOLEAN)
                ];
            }
        }

        abort(404);
    }
    
    /**
     * Update cron.
     *
     * @param  Request  $request
     * @param  string   $name
     * @return Response
     */
    public function update(Request $request)
    {
        //
        Cron::where('name', $request->name)->update(['enabled' => $request->enabled]);
    }
}
