<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service()
    {
        $services = Service::latest()->get();
        return view('backend.service.service', compact('services'));
    }

    public function store(Request $request)
    {
        $service = new Service();
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return back()->with('success', 'Service Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return back()->with('success', 'Service Updated Successfully!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return back()->with('success', 'Service Deleted Successfully!');
    }
}
