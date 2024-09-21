<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    public function read()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:destinations,name',
            'currency' => 'required',
            'd_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('d_image_path')) {
            $image = $request->file('d_image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('destination_images'), $imageName);
            $imagePath = 'destination_images/' . $imageName;
        }

        Destination::create([
            'name' => $request->input('name'),
            'currency' => $request->input('currency'),
            'd_image_path' => $imagePath,
        ]);

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:destinations,name,' . $id,
            'currency' => 'required',
            'd_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destination = Destination::findOrFail($id);

        $imagePath = $destination->d_image_path;
        if ($request->hasFile('d_image_path')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $image = $request->file('d_image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('destination_images'), $imageName);
            $imagePath = 'destination_images/' . $imageName;
        }

        $destination->update([
            'name' => $request->input('name'),
            'currency' => $request->input('currency'),
            'd_image_path' => $imagePath,
        ]);

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        if ($destination->d_image_path && File::exists(public_path($destination->d_image_path))) {
            File::delete(public_path($destination->d_image_path));
        }

        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
