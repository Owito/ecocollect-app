<?php

namespace App\Http\Controllers;

use App\Models\CollectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionRequestController extends Controller
{
    /**
     * Mostrar todas las solicitudes del usuario autenticado.
     */
    public function index()
    {
        $collectionRequests = CollectionRequest::where('user_id', Auth::id())->get();
        return view('collection_requests.index', compact('collectionRequests'));
    }

    /**
     * Mostrar formulario para crear una nueva solicitud.
     */
    public function create()
    {
        return view('collection_requests.create');
    }

    /**
     * Guardar una nueva solicitud en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_of_waste' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
            'collection_date' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        CollectionRequest::create([
            'user_id' => Auth::id(),
            'type_of_waste' => $request->type_of_waste,
            'amount' => $request->amount,
            'collection_date' => $request->collection_date,
            'address' => $request->address,
            'status' => 'pendiente',
        ]);

        return redirect()->route('collection_requests.index')->with('success', 'Solicitud creada exitosamente.');
    }

    /**
     * Mostrar formulario para editar una solicitud existente.
     */
    public function edit(CollectionRequest $collectionRequest)
    {
        // Asegurar que el usuario sea el dueño de la solicitud
        if ($collectionRequest->user_id !== Auth::id()) {
            abort(403); // Prohibido
        }

        return view('collection_requests.edit', compact('collectionRequest'));
    }

    /**
     * Actualizar una solicitud existente en la base de datos.
     */
    public function update(Request $request, CollectionRequest $collectionRequest)
    {
        // Asegurar que el usuario sea el dueño
        if ($collectionRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'type_of_waste' => 'required|string|max:255',
            'amount' => 'nullable|string|max:255',
            'collection_date' => 'required|date',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $collectionRequest->update([
            'type_of_waste' => $request->type_of_waste,
            'amount' => $request->amount,
            'collection_date' => $request->collection_date,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        return redirect()->route('collection_requests.index')->with('success', 'Solicitud actualizada exitosamente.');
    }

    /**
     * Eliminar una solicitud.
     */
    public function destroy(CollectionRequest $collectionRequest)
    {
        // Asegurar que el usuario sea el dueño
        if ($collectionRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $collectionRequest->delete();

        return redirect()->route('collection_requests.index')->with('success', 'Solicitud eliminada exitosamente.');
    }
}
