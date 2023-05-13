<?php

namespace App\Http\Controllers;

use App\Actions\Admin\UpdateOrganizationAction;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function index(Request $request)
    {
        $title = "Daftar KM";
        $periods = Organization::onlyPeriods()->get()->pluck('period');
        if ($request->all() == null) :
            $organizations = Organization::all();
        else :
            $organizations = Organization::ofPeriod($request->period)->get();
        endif;

        return view('KM.index', compact('title', 'organizations', 'periods'));
    }

    public function edit(Organization $organization)
    {
        $title = "Ubah data organisasi";

        return view('KM.edit', compact('title', 'organization'));
    }

    public function update(UpdateOrganizationRequest $request, UpdateOrganizationAction $action)
    {
        try {
            $action->handle($request);
        } catch (\Throwable $e) {
            return back()->with('error', 'errprs');
        }

        return back()->with('success', 'success');
    }

    public function admin(Request $request)
    {
        $title = 'Kelola Organisasi';
        $periods = Organization::onlyPeriods()->get()->pluck('period');

        if ($request->all() == null) :
            $organizations = Organization::all();
        else :
            $organizations = Organization::ofPeriod($request->period)->get();
        endif;

        return view('KM.admin', compact('title', 'organizations', 'periods'));
    }

    public function destroy(Request $request)
    {
        try {
            Organization::destroy($request->data);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }

        return response()->json([
            'data' => 'Sukses'
        ]);
    }
}
