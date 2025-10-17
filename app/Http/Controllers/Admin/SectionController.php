<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
        ]);

        $section->update($request->all());

        return redirect()->route('admin.sections.edit', $section)->with('success', 'Section updated successfully.');
    }
}
