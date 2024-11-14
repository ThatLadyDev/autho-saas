<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function get(string $tenantUuid)
    {
        $tenant = Tenant::where('uuid', $tenantUuid);
        if (!$tenant->exists()) {
            return response()->json(['success' => true, 'message' => 'Invalid tenant']);
        }
        return response()->json(['success' => true, 'tenant' => $tenant->first()]);
    }
}
