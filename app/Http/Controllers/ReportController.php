<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function index()
    {
        $reports = Report::with('user')->latest()->get();
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }

        if ($user && $user->role == 'admin') {
            return view('reports.admin.index', compact('reports'));
        }

        return view('reports.index', compact('reports'));
    }


    public function create()
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        return view('reports.create');
    }


    public function store(Request $request)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        $request->validate([
            'description' => 'required',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('photo')) {
            $filename = $request->file('photo')->store('photos', 'public');
        }

        Report::create([
            'user_id'    => session('user')->id,
            'description'=> $request->description,
            'photo'      => $filename,
            'status'     => 'menunggu'
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dikirim!');
    }


    public function show($id)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        $report = Report::with('user')->findOrFail($id);
        return view('reports.show', compact('report'));
    }


    public function edit($id)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        $report = Report::findOrFail($id);
        $user = session('user');

        if ($user && $user->role == 'admin') {
            return view('reports.admin.edit', compact('report'));
        }
        return view('reports.edit', compact('report'));
    }


    public function updateStatus(Request $request, $id)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $report = Report::findOrFail($id);
        $report->update(['status' => $request->status]);

        return redirect()->route('reports.index')->with('success', 'Status laporan diperbarui.');
    }

    public function update(Request $request, $id)
{
    $user = session('user');
    if (!$user) {
        return redirect()->route('login');
    }
    $report = Report::findOrFail($id);

    $request->validate([
        'description' => 'required',
        'status'      => 'required|in:menunggu,diproses,selesai',
        'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    if ($request->hasFile('photo')) {
        if ($report->photo) {
            Storage::disk('public')->delete($report->photo);
        }

        $report->photo = $request->file('photo')->store('photos', 'public');
    }

    $report->description = $request->description;
    $report->status = $request->status;

    $report->save();

    return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui!');
}



    public function destroy($id)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login');
        }
        $report = Report::findOrFail($id);
        if ($report->photo) {
            Storage::disk('public')->delete($report->photo);
        }
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
