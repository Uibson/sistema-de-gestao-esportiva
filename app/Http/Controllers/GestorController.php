<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution; // Modelo de Instituições
use App\Models\Modality;    // Modelo de Modalidades
use App\Models\Event;       // Modelo de Eventos


class GestorController extends Controller
{
    // Middleware para garantir que apenas gestores acessem
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Gestor');
    }

    // Dashboard do Gestor
    public function index()
    {
        $institutions = Institution::all();
        $modalities = Modality::all();
        $events = Event::all();

        return view('gestor.dashboard', compact('institutions','modalities', 'events'));
    }

    // Listagem de Instituições
    public function institutions()
    {
        $institutions = Institution::paginate(10);
        return view('gestor.institutions.index', compact('institutions'));
    }

    // Cadastro de Instituições
    public function createInstitution()
    {
        return view('gestor.institutions.create');
    }

    public function storeInstitution(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cnpj_cpf' => 'required|string|unique:institutions',
            'type' => 'required|string',
            'email' => 'required|email|unique:institutions',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'inep' => 'nullable|string',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Institution::create([
            'name' => $validated['name'],
            'cnpj_cpf' => $validated['cnpj_cpf'],
            'type' => $validated['type'],
            'email' => $validated['email'],
            'logo' => $logoPath,
            'address' => $validated['address'],
            'inep' => $validated['inep'],
        ]);

        return redirect()->route('gestor.institutions')->with('success', 'Instituição cadastrada com sucesso!');
    }

    // Edição de Instituições
    public function editInstitution(Institution $institution)
    {
        return view('gestor.institutions.edit', compact('institution'));
    }

    public function updateInstitution(Request $request, Institution $institution)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cnpj_cpf' => 'required|string|unique:institutions,cnpj_cpf,' . $institution->id,
            'type' => 'required|string',
            'email' => 'required|email|unique:institutions,email,' . $institution->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
            'inep' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $institution->update(['logo' => $logoPath]);
        }

        $institution->update($validated);

        return redirect()->route('gestor.institutions')->with('success', 'Instituição atualizada com sucesso!');
    }

    // Exclusão de Instituições
    public function destroyInstitution(Institution $institution)
    {
        $institution->delete();
        return redirect()->route('gestor.institutions')->with('success', 'Instituição excluída com sucesso!');
    }

    #MODALIDADES
    // Listagem de Modalidades
    public function modalities()
    {
        $modalities = Modality::paginate(10); // Paginação com 10 itens por página
        return view('gestor.modalities.index', compact('modalities'));
    }

    // Cadastro de Modalidades
    public function createModality()
    {
        return view('gestor.modalities.create');
    }

    public function storeModality(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'rules' => 'nullable|string',
            'min_participants' => 'required|integer',
            'max_participants' => 'required|integer',
            'age_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('modality_images', 'public');
            $validated['image'] = $imagePath;
        }

        Modality::create($validated);

        return redirect()->route('gestor.modalities')->with('success', 'Modalidade cadastrada com sucesso!');
    }

    // Edição de Modalidades
    public function editModality(Modality $modality)
    {
        return view('gestor.modalities.edit', compact('modality'));
    }

    public function updateModality(Request $request, Modality $modality)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'rules' => 'nullable|string',
            'min_participants' => 'required|integer',
            'max_participants' => 'required|integer',
            'age_category' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('modality_images', 'public');
            $modality->update(['image' => $imagePath]);
        }

        $modality->update($validated);

        return redirect()->route('gestor.modalities')->with('success', 'Modalidade atualizada com sucesso!');
    }

    // Exclusão de Modalidades
    public function destroyModality(Modality $modality)
    {
        $modality->delete();
        return redirect()->route('gestor.modalities')->with('success', 'Modalidade excluída com sucesso!');
    }





    // Métodos para Eventos (similar ao de Instituições)
    public function events()
    {
        $events = Event::paginate(10);
        return view('gestor.events.index', compact('events'));
    }

    public function createEvent()
    {
        $modalities = Modality::all();
        return view('gestor.events.create', compact('modalities'));
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'modality_id' => 'required|exists:modalities,id',
        ]);

        $logoPath = $request->file('logo')->store('event_logos', 'public');

        Event::create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'location' => $validated['location'],
            'logo' => $logoPath,
            'modality_id' => $validated['modality_id'],
        ]);

        return redirect()->route('gestor.events')->with('success', 'Evento cadastrado com sucesso!');
    }


}
