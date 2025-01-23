<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Organizacion;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizacionComponent extends Component 
{
    use WithFileUploads;

    public $nombre = '';
    public $cif = '';
    public $descripcion = '';
    public $web = '';
    public $imagen = null;
    public $modal = false;
    public $siActualiza = false;
    public $miOrganizacion = null;
    public $currentImage = null;

    public function openCreateModal($id = null){
        
        $this->siActualiza = false;

        if ($id) {
            $this->miOrganizacion = Organizacion::find($id);
        
            if ($this->miOrganizacion) {
                $this->nombre = $this->miOrganizacion->nombre;
                $this->cif = $this->miOrganizacion->cif;
                $this->descripcion = $this->miOrganizacion->descripcion;
                $this->web = $this->miOrganizacion->web;
                $this->currentImage = $this->miOrganizacion->imagen;
                $this->imagen = null;
                $this->siActualiza = true;
            } else {
                session()->flash('warning', 'No se encontró la organización seleccionada.');
            }
        } else {
            $this->clearFields();
        }
        
        $this->modal = true;
    }

    public function closeCreateModal(){
        $this->clearFields();
        $this->resetValidation();
        $this->modal = false;
    }

    public function createOrAttachOrganization()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'cif' => [
                'required',
                'string',
                'max:255',
                Rule::unique('organizacion', 'cif')
                    ->ignore(optional($this->miOrganizacion)->id),
            ],
            'descripcion' => 'nullable|string',
            'web' => 'nullable',
            'imagen' => 'nullable|image|max:5120|mimes:jpeg,png,jpg,gif,svg', // Tipos permitidos
        ]);

        try {
            if ($this->siActualiza) {
                $this->miOrganizacion->update([
                    'nombre' => $this->nombre,
                    'cif' => $this->cif,
                    'descripcion' => $this->descripcion,
                    'web' => $this->web,
                    'imagen' => $this->imagen 
                        ? $this->imagen->store('organizaciones', 'public') 
                        : $this->currentImage,
                ]);
                session()->flash('success', 'Organización actualizada exitosamente.');
    
            } else {
                $organizacion = Organizacion::create([
                    'nombre' => $this->nombre,
                    'cif' => $this->cif,
                    'descripcion' => $this->descripcion,
                    'web' => $this->web,
                    'imagen' => $this->imagen ? $this->imagen->store('organizaciones', 'public') : null,
                ]);

                $organizacion->users()->attach(auth()->id());
                session()->flash('success', 'Organización creada exitosamente.');
            }

            $this->clearFields();
            $this->modal = false;

        } catch (\Exception $e) {
            session()->flash('warning', 'Ocurrió un error al guardar la Organización. Inténtalo nuevamente.');
        }
        return redirect()->route('organizaciones.index'); 
    }

    public function clearFields()
    {
        $this->nombre = '';
        $this->cif = '';
        $this->descripcion = '';
        $this->web = '';
        $this->imagen = null;
        $this->currentImage = null;
        $this->miOrganizacion = null;
        $this->siActualiza = false;
    }

    
    public function searchOrganizations()
    {
        return Organizacion::whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }


    public function deleteOrganization($id)
    {
        try{
            $organization = Organizacion::find($id);

            if (!$organization) {
                session()->flash('warning', 'Organización no existe o ya fue eliminada.');
            }
            
            // Elimina la organización
            $organization->delete();

            session()->flash('success', 'Organización eliminada exitosamente.');

        } catch (\Exception $e) {
            session()->flash('warning', 'Ocurrio un error al intentar eliminar la Organización.');
        }
    }

    public function render()
    {
        return view('livewire.organizacion', [
            'organizations' => $this->searchOrganizations(), 
        ]);
    }
}  