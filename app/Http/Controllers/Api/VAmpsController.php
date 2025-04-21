<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VAmps;
use App\Http\Resources\VApmsResource;

class VAmpsController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        // get paginated data
        $vamps = VAmps::latest()->paginate(10);

        return new VApmsResource(true, 'List of VAmps', $vamps);
    }

    /**
     * store
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $vamps = VAmps::create([
            'voltage' => $request->voltage,
            'current' => $request->current,
        ]);
        return new VApmsResource(true, 'VAmps created successfully', $vamps);
    }

    public function latest()
    {
        $data = VAmps::latest()->first();
        return new VApmsResource(true, 'Latest VAmps data', $data);
    }
}
