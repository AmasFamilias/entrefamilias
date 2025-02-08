<?php

namespace App\Livewire;

use App\Models\User;
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

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'cif' => [
                'required',
                'string',
                'max:255',
                Rule::unique('organizacion', 'cif')->ignore($this->miOrganizacion ? $this->miOrganizacion->id : null),
            ],
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
        ];
    }
        
    // Para la zona del Modal de Invitar
    public $organizaciones, $search, $users, $showInviteModal = false, $selectedOrg;

    // Este es por el modal que debe estar visible
    public function mount()
    {
        $this->organizaciones = Organizacion::all();
    }

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
        $this->validate();

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
                
                $organizacion->users()->attach(auth()->id(), [
                    'role' => 'administrador' // Cambiado de 'colaborador'
                ]);

                // $organizacion->users()->attach(auth()->id());
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
    
    // Buscar Organizacion
    public function searchOrganizations()
    {
        return Organizacion::with(['users' => function($query) {
            $query->wherePivot('role', 'colaborador')->withPivot('role');
        }])->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }

    // Eliminar Organizacion se corrige el borrado de la Imagen
    public function deleteOrganization($id)
    {
        try {
            $organization = Organizacion::find($id);
            
            if ($organization->imagen && Storage::disk('public')->exists($organization->imagen)) {
                Storage::disk('public')->delete($organization->imagen);
            }
            
            $organization->delete();
            session()->flash('success', 'Organización eliminada exitosamente.');

        } catch (\Exception $e) {
            session()->flash('warning', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    //Eventos para el Modal de Invitacion
    public function openInvitarModal($orgId)
    {
        $this->selectedOrg = $orgId;
        $this->miOrganizacion = Organizacion::find($orgId); // Agregar esta línea
        $this->showInviteModal = true;
        $this->searchUsers(); // Cargar resultados iniciales
    }

    public function searchUsers()
    {
        $this->validate(['search' => 'nullable|string|max:255']);
        
        $this->users = User::where(function($query) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%");
        })
        ->where('id', '!=', auth()->id())
        ->whereNotIn('id', $this->miOrganizacion->users()->pluck('users.id')) // Excluir miembros existentes
        ->limit(10)
        ->get();
    }

    public function clearSearch()
    {
        $this->reset(['search', 'users']);
    }

    // Cierra el Modal de Invitar
    public function closeInviteModal()
    {
        $this->showInviteModal = false;
    }
    
    // Controla para invitar al Usuario
    public function inviteUser($userId)
    {
        try {
            $org = Organizacion::findOrFail($this->selectedOrg);
            
            if (!$org->users()->where('user_id', $userId)->exists()) {
                $org->users()->attach($userId, ['role' => 'colaborador']);
                session()->flash('success', 'Usuario invitado exitosamente');
            } else {
                session()->flash('warning', 'El usuario ya pertenece a esta organización');
            }
            
            $this->closeInviteModal();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error al invitar: ' . $e->getMessage());
        }
    }

    // Agregar este método para eliminar colaboradores
    public function removeCollaborator($userId)
    {
        try {
            $org = Organizacion::find($this->miOrganizacion->id);
            $org->users()->detach($userId);
            
            session()->flash('success', 'Colaborador eliminado exitosamente');
            $this->miOrganizacion->refresh(); // Actualizar datos de la organización

        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    // Validacion de la Imagen si es Actualizada o Creada
    public function updatedImagen()
    {
        $this->validateOnly('imagen');
    }

    // Evento para controlar la Eliminacion de la Imagen del Contenedor
    public function eliminarImagen()
    {
        $this->imagen = null;
        $this->currentImage = null;
    }

    public function render() 
    {
        return view('livewire.organizacion', [
            'organizations' => $this->searchOrganizations(), 
        ]);
    }
}  