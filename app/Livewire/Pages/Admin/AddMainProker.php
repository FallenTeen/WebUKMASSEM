<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MainProker;
use App\Models\GambardeskCache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AddMainProker extends Component
{
    use WithFileUploads;

    // Constants
    const MAX_IMAGE_SIZE = 8192; // 8MB
    const KATEGORI_OPTIONS = ['musik', 'tari', 'teater', 'film', 'foto', 'campuran'];
    const STATUS_OPTIONS = ['upcoming', 'draft', 'selesai', 'ditunda'];

    public $step = 1;
    public $totalSteps = 3;

    public $judul;
    public $judul2;
    public $gambar;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $waktu_mulai;
    public $waktu_selesai;
    public $lokasi;
    public $alamat_lengkap;
    public $kategori = 'campuran';
    public $deskripsi;
    public $url;
    public $biaya_tiket = 0;
    public $kontak_info;
    public $status = 'draft';
    public $gambardesk = [];
    public $gambardeskFiles = [];

    protected function rules()
    {
        return [
            // Step 1 validation
            'judul' => 'required|string|max:100',
            'judul2' => 'nullable|string|max:100',
            'gambar' => 'nullable|image|max:' . self::MAX_IMAGE_SIZE,
            'kategori' => 'required|in:' . implode(',', self::KATEGORI_OPTIONS),
            'deskripsi' => 'required|string',

            // Step 2 validation
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
            'lokasi' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string',
            'biaya_tiket' => 'nullable|numeric|min:0',
            'kontak_info' => 'required|string|max:100',
            'url' => 'nullable|string|url',

            // Step 3 validation
            'status' => 'required|in:' . implode(',', self::STATUS_OPTIONS),
            'gambardeskFiles.*' => 'nullable|image|max:' . self::MAX_IMAGE_SIZE,
        ];
    }
    protected function messages()
    {
        return [
            'judul.required' => 'Judul program tidak boleh kosong',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai',
            'gambar.max' => 'Ukuran gambar maksimal 8MB',
            'gambardeskFiles.*.max' => 'Ukuran gambar dokumentasi maksimal 8MB',
        ];
    }

    public function mount()
    {
        if (!$this->tanggal_mulai) {
            $this->tanggal_mulai = now()->format('Y-m-d');
        }
        if (!$this->tanggal_selesai) {
            $this->tanggal_selesai = now()->format('Y-m-d');
        }
        if (!$this->waktu_mulai) {
            $this->waktu_mulai = '18:00';
        }
        if (!$this->waktu_selesai) {
            $this->waktu_selesai = '21:00';
        }

        $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
    }

    public function nextStep()
    {
        $this->validateCurrentStep();
        if ($this->step < $this->totalSteps) {
            $this->step++;
        }
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    private function validateCurrentStep()
    {
        $validationFields = [
            1 => ['judul', 'judul2', 'kategori', 'deskripsi', 'gambar'],
            2 => ['tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai', 'lokasi', 'alamat_lengkap', 'biaya_tiket', 'kontak_info', 'url'],
            3 => ['status']
        ];

        $stepRules = array_intersect_key($this->rules(), array_flip(
            array_reduce($validationFields[$this->step], function ($carry, $field) {
                if (strpos($field, '.') === false) {
                    $carry[] = $field;
                } else {
                    $baseName = explode('.', $field)[0];
                    $carry[] = $baseName;
                }
                return $carry;
            }, [])
        ));

        $this->validate($stepRules);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeGambardesk($imageId)
    {
        $image = GambardeskCache::findOrFail($imageId);

        if ($image && $image->user_id == Auth::id()) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
            $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
        }
    }

    public function updatedGambardeskFiles()
    {
        $this->validate([
            'gambardeskFiles.*' => 'image|max:' . self::MAX_IMAGE_SIZE,
        ]);

        foreach ($this->gambardeskFiles as $file) {
            $path = $file->store('mainproker/gambardesk', 'public');

            GambardeskCache::create([
                'path' => $path,
                'type' => $file->getClientMimeType(),
                'temp_id' => uniqid(),
                'user_id' => Auth::id(),
            ]);
        }

        $this->gambardesk = GambardeskCache::where('user_id', Auth::id())->get();
        $this->gambardeskFiles = [];
    }

    public function save()
    {
        $this->validate();

        $gambarPath = $this->gambar
            ? $this->gambar->store('mainproker/images', 'public')
            : null;

        $gambardeskPaths = $this->gambardesk->pluck('path')->toArray();

        $tanggal_mulai = Carbon::parse($this->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($this->tanggal_selesai);
        $waktu_mulai = Carbon::parse($this->waktu_mulai);
        $waktu_selesai = Carbon::parse($this->waktu_selesai);

        MainProker::create([
            'judul' => $this->judul,
            'judul2' => $this->judul2,
            'deskripsi' => $this->deskripsi,
            'gambar' => $gambarPath,
            'gambardesk' => $gambardeskPaths,
            'url' => $this->url,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'lokasi' => $this->lokasi,
            'alamat_lengkap' => $this->alamat_lengkap,
            'kategori' => $this->kategori,
            'biaya_tiket' => $this->biaya_tiket,
            'status' => $this->status,
            'kontak_info' => $this->kontak_info,
        ]);

        GambardeskCache::where('user_id', Auth::id())->delete();
        sweetalert()->success('Program Utama Berhasil Ditambahkan');
        return redirect()->route('admin.indexmainproker');
    }

    public function render()
    {
        return view('livewire.pages.admin.add-main-proker')->layout('layouts.app');
    }
}