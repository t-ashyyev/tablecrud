<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
     // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $studentId,  $nis, $name, $photo, $photoOld;

    // Untuk mengambil emit yang dikirim dari komponen index
    protected $listeners = ['studentEdit'];
    
    public function render()
    {
        return view('livewire.students.edit');
    }

    // Untuk handle emit dari komponen index
    public function studentEdit($student)
    {
        // Isi properti yang sudah dideklarasikan sebelumnya menggunakan data dari emit
        $this->studentId = $student['id'];
        $this->nis = $student['nis'];
        $this->name = $student['name'];
        $this->photoOld = $student['photo'];
    }

    // Update data
    public function update(Student $student)
    {
        // Validasi
        $this->validate([
            'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Jika user upload foto baru, maka foto lama hapus (kalau foto sebelumnya hasil upload)
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
            if (preg_match('/upload/', $student->photo)) {
                Storage::delete($student->photo);
            }
        } else {
            $photo = $this->photoOld;
        }

        // Update ke database
        $student->update([
            'nis' => $this->nis,
            'name' => $this->name,
            'photo' => $photo,
        ]);

        // Emit untuk trigger notifikasi
        $this->emit('studentEdited');
    }
}
