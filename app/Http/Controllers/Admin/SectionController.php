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
        info('Request data:', $request->all());
        info('Section before update:', $section->toArray());

        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
        ], [
            'title.required' => 'The title field is required.',
        ]);

        $section->update($request->all());

        info('Section after update:', $section->fresh()->toArray());

        // Redirect back to the edit page with a success message.
        return redirect()->route('admin.sections.edit', $section)->with('success', 'Section has been updated successfully.');
    }
}
