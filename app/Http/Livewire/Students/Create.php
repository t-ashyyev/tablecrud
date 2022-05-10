<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    // Ini akan digunakan untuk mengupload gambar dan untuk preview gambar
    use WithFileUploads;

    public $name, $nis, $photo;

    public function render()
    {
        return view('livewire.students.create');
    }

    public function store()
    {
        // Validasi data
        $this->validate([
            'nis' => ['required', 'numeric'],
            'name' => ['required'],
        ]);

        // Cek jika user upload foto, maka gunakan foto tersebut
        // Jika tidak, maka gunakan foto default
        if ($this->photo) {
            $photo = $this->photo->store('avatar/upload');
        } else {
            $photo = 'avatar/' . strtolower(substr($this->name, 0, 1)) . '.png';
        }

        // Masukkan kedalam database
        Student::create([
            'nis' => $this->nis,
            'name' => $this->name,
            'photo' => $photo,
        ]);

        // Kirim notifikasi berhasil menggunakan emmit
        $this->emit('studentAdded');
    }
}
