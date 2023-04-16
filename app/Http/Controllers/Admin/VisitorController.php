<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
            'ip_address' => 'nullable|string|max:255',
            'browser_login' => 'nullable|string|max:255',
            'browser_version' => 'nullable|string|max:255',
            'device_login' => 'nullable|string|max:255',
            'device_version' => 'nullable|string|max:255',
        ]);
        $q = $request->q ?: null;
        $f_ipAddress = $request->ip_address ?: null;
        $f_browser_login = $request->browser_login ?: null;
        $f_browser_version = $request->browser_version ?: null;
        $f_device_login = $request->device_login ?: null;
        $f_device_version = $request->device_version ?: null;

        $visitors = Visitor::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('requests', 'like', '%' . $q . '%');
                $query->orWhere('created_at', 'like', '%' . $q . '%');
                $query->orWhere('updated_at', 'like', '%' . $q . '%');
            });
        })
            ->when($f_ipAddress, function ($query, $f_ipAddress) {
                return $query->where('ip_address', $f_ipAddress);
            })
            ->when($f_browser_login, function ($query, $f_browser_login) {
                return $query->where('browser_login', $f_browser_login);
            })
            ->when($f_browser_version, function ($query, $f_browser_version) {
                return $query->where('browser_version', $f_browser_version);
            })
            ->when($f_device_login, function ($query, $f_device_login) {
                return $query->where('device_login', $f_device_login);
            })
            ->when($f_device_version, function ($query, $f_device_version) {
                return $query->where('device_version', $f_device_version);
            })
            ->orderBy('id', 'desc')
            ->with(['userAgent'])
            ->paginate(50)
            ->withQueryString();

        return view('admin.visitors.index', [
            'f_ipAddress' => $f_ipAddress,
            'f_browser_login' => $f_browser_login,
            'f_browser_version' => $f_browser_version,
            'f_device_login' => $f_device_login,
            'f_device_version' => $f_device_version,
            'visitors' => $visitors,
        ]);
    }


    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.visitor') . trans('app.deleted') . '!'
            ]);
    }
}
