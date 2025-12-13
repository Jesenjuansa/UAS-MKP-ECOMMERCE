<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorClassController extends Controller
{
    // =====================================================
    // MY CLASSES — hanya menampilkan milik tutor yg login
    // =====================================================
    public function index()
    {
        $tutor = Auth::user();

        // Jika akun tutor SUSPENDED → tampilkan pesan + hide tombol tambah
        $blocked = false;
        $blockMessage = null;

        if ($tutor->status === 'suspended') {
            $blocked = true;
            $blockMessage = "Your account is suspended. You cannot add or edit classes.";
        }

        // Jika tutor BELUM DIVerifikasi admin
        if ($tutor->verified == false) {
            $blocked = true;
            $blockMessage = "Your account is not verified yet. Please wait for admin approval.";
        }

        $classes = TutorClass::where('tutor_id', $tutor->id)->get();

        return view('tutors.myclasses', compact('classes', 'blocked', 'blockMessage'));
    }



    // =====================================================
    // STORE — Simpan kelas baru (dengan foto)
    // =====================================================
    public function store(Request $request)
    {
        $tutor = Auth::user();

        // CEK BLOKIR
        if ($tutor->status === 'suspended') {
            return back()->with('error', 'Your account is suspended. You cannot add a class.');
        }

        if ($tutor->verified == false) {
            return back()->with('error', 'Your account is not verified yet.');
        }

        // VALIDASI INPUT
        $request->validate([
            'title'       => 'required',
            'price'       => 'required|integer',
            'duration'    => 'required',
            'description' => 'required',
            'day'         => 'required|array',
            'photo'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Upload foto jika ada
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/classes'), $photoName);
        }

        // SIMPAN KE DB
        TutorClass::create([
            'tutor_id'    => $tutor->id,
            'title'       => $request->title,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
            'day'         => implode(', ', $request->day),
            'photo'       => $photoName,
        ]);

        return back()->with('success', 'Class created successfully!');
    }



    // =====================================================
    // UPDATE — Edit class
    // =====================================================
    public function update(Request $request, $id)
    {
        $tutor = Auth::user();

        // CEK BLOKIR
        if ($tutor->status === 'suspended') {
            return back()->with('error', 'Your account is suspended. You cannot edit a class.');
        }

        if ($tutor->verified == false) {
            return back()->with('error', 'Your account is not verified yet.');
        }

        // VALIDASI
        $request->validate([
            'title'       => 'required',
            'price'       => 'required|integer',
            'duration'    => 'required',
            'description' => 'required',
            'day'         => 'required|array',
            'photo'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $class = TutorClass::where('tutor_id', $tutor->id)->findOrFail($id);

        // jika ada foto baru → upload
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/classes'), $photoName);
            $class->photo = $photoName;
        }

        // Update field lain
        $class->update([
            'title'       => $request->title,
            'price'       => $request->price,
            'duration'    => $request->duration,
            'description' => $request->description,
            'day'         => implode(', ', $request->day),
            'photo'       => $class->photo, // tetap gunakan foto baru atau lama
        ]);

        return back()->with('success', 'Class updated successfully!');
    }



    // =====================================================
    // DELETE
    // =====================================================
    public function destroy($id)
    {
        $class = TutorClass::where('tutor_id', Auth::id())->findOrFail($id);
        $class->delete();

        return back()->with('success', 'Class deleted successfully!');
    }
}
