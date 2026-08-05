<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivity;

class AdminActivityController extends Controller
{
    public function index()
    {
        $query = AdminActivity::latest('performed_at');

        if (! auth()->user()->isSuperAdmin()) {
            $query->where('user_id', auth()->id());
        }

        $activities = $query->paginate(20);

        return view('admin.activities.index', compact('activities'));
    }
}
