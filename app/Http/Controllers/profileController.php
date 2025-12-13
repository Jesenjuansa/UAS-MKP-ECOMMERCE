<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class profileController extends Controller
{
    public function index()
    {
        $tutor = Auth::user();  // tutor login
        return view('tutors.profile', compact('tutor'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'full_name'        => 'required|string|max:255',
            'phone_number'     => 'nullable|string|max:20',
            'teaching_subject' => 'nullable|string|max:255',
            'class_type'       => 'nullable|string|max:255',
            'pas_foto'         => 'nullable|image|mimes:jpg,png,jpeg|max:3048',
        ]);

        /** @var User|null $tutor */
        $tutor = Auth::user();

        if (! $tutor instanceof User) {
            return back()->withErrors(['user' => 'Authenticated user not found.']);
        }

        // =============== UPLOAD FOTO ===============
        if ($request->hasFile('pas_foto')) {

            $photo      = $request->file('pas_foto');
            $fileName   = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/tutors'), $fileName);

            // simpan ke database
            $tutor->pas_foto = $fileName;
        }

        // =============== UPDATE DATA ===============
        $tutor->full_name        = $request->full_name;
        $tutor->phone_number     = $request->phone_number;
        $tutor->teaching_subject = $request->teaching_subject;
        $tutor->class_type       = $request->class_type;

        $tutor->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
