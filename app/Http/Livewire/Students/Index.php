<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    // Gunakan ini agar menggunakan pagination milik livewire
    use WithPagination;

    public $paginate = 10, $search, $formVisible = false;

    // Untuk mengupdate 'search' yang ada di url
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    // Membuat listener untuk emit yang dibuat di komponen lain
    protected $listeners = ['studentAdded', 'closeForm', 'studentEdited'];

    public function render()
    {
        return view('livewire.students.index', [
            'students' => $this->search 
                                ? Student::whereFullText('name', $this->search)->orWhereFullText('nis', $this->search)->latest()->paginate($this->paginate)
                                : Student::latest()->paginate($this->paginate)
        ]);
    }

    // Untuk menampilkan form tambah
    public function create()
    {
        $this->formVisible = 'create';
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen create
    public function studentAdded()
    {
        session()->flash('message', 'Student added successfully');
        // Tutup form
        $this->closeForm();
    }

    // Untuk menutup form
    public function closeForm()
    {
        $this->formVisible = false;
    }

    // Untuk menghapus data
    public function destroy(Student $student)
    {
        $student->delete();

        // Untuk menghapus foto siswa di penyimpanan jika foto tersebut hasil upload
        if (preg_match('/upload/', $student->photo)) {
            Storage::delete($student->photo);
        }

        // Untuk memberi notifikasi
        session()->flash('message', 'Student deleted successfully');
    }

    // Untuk menampilkan form edit
    public function edit(Student $student)
    {
        $this->formVisible = 'edit';
        // Untuk mengirim data student yang di klik ke komponen lain (komponen edit)
        $this->emit('studentEdit', $student);
    }

    // Untuk menampilkan notifikasi dari emit yang dikirim dari komponen edit
    public function studentEdited()
    {
        session()->flash('message', 'Student edited successfully');
        // Tutup form
        $this->closeForm();
    }
}
