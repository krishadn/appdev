<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query="SELECT  bus_schedules.id AS id,type, code, bus_schedules.status , origin,destination,
                DATE_FORMAT(departure_time,'%M %d %Y - %r') AS departure_time,
                DATE_FORMAT(arrival_time,' %M %d %Y - %r') AS arrival_time
                FROM  bus_schedules
                INNER JOIN bus_routes on bus_routes.id = bus_schedules.route_id
                INNER JOIN buses on buses.id = bus_schedules.bus_id
                WHERE DATE(departure_time) = CURDATE()
                LIMIT 5";

        $query_one="SELECT buses.id as id, COUNT(bus_schedules.bus_id) AS schedule_count
                    FROM  buses
                    RIGHT JOIN bus_schedules ON buses.id = bus_schedules.bus_id
                    GROUP BY buses.id";

          

        $sched_buses= count(DB::select($query_one));
        $all_buses = count(Bus::all());
        $unsched_buses = $all_buses - $sched_buses; 

        $bus_type_query = "SELECT type, COUNT(*) AS bus_count FROM buses GROUP BY type";
        $bus_stat_query = "SELECT status, COUNT(*) AS bus_count FROM buses GROUP BY status"; 

        $bus_types = DB::select($bus_type_query);
        $bus_status = DB::select($bus_stat_query);
        $schedules= DB::select($query);

        return Inertia::render('Dashboard',[
            'bus_types'=>$bus_types,
            'bus_status'=>$bus_status,
            'schedules'=>$schedules,
            'sched_buses'=>$sched_buses,
            'unsched_buses'=>$unsched_buses,        
        ]);
    }
}