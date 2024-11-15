<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Obituary;
use Illuminate\Support\Facades\Log;
use Exception;

class ObituaryController extends Controller
{
    public function submit(Request $request)
    {

        Log::info('This is a test log message');


        try {
            // Validate the input data
            $validated = $request->validate([
                'name' => 'required|string|max:100|unique:obituaries,name',
                'date_of_birth' => 'required|date',
                'date_of_death' => 'required|date|after:date_of_birth',
                'content' => 'required|string|min:20',
                'author' => 'required|string|max:100',
            ]);

            // Save obituary
            Obituary::create([
                'name' => $validated['name'],
                'date_of_birth' => $validated['date_of_birth'],
                'date_of_death' => $validated['date_of_death'],
                'content' => $validated['content'],
                'author' => $validated['author'],
                'slug' => Str::slug($validated['name'] . '-' . uniqid()),
            ]);

            // Log success message
            Log::info('Obituary successfully created for: ' . $validated['name']);

            // Set a success message in the session
            return redirect()->back()->with('success', 'Obituary submitted successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation failed:', $e->errors());
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        } catch (\Exception $e) {
            // Log error message
            Log::error('Error creating obituary: ' . $e->getMessage());

            // Return error message to the session
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function index()
    {
        // Retrieve all obituaries and pass them to the view
        $obituaries = Obituary::orderBy('date_of_death', 'desc')->get();
        return view('obituaries.index', compact('obituaries'));
    }
}
