<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\PublicationPolicy;

class PublicationController extends Controller {
    /*public function __construct()
    {
        $this->authorizeResource(Publication::class, 'publication');
    }*/

    public function index() {
        $publications = Publication::orderBy('created_at', 'desc')->get();

        return view('publication.index', ['publications' => $publications]);
    }

    public function show(Publication $publication) {
        return view('publication.show',
            [
                'publication' => $publication,
                'comments' => $publication->comments()->withTrashed()->get()
            ]
        );
    }

    public function create() {
        
        $users = User::all();
        return view('publication.form', ['authors' => $users]);
    }

    public function add(StorePublicationRequest $request) {

        $data = $request->validated();

        $newPublication = new Publication($data);
        $newPublication->save();

        return redirect()->route(
            'publication.show', $newPublication
        )->with('success', 'Successfully added');
    }

    public function edit(Publication $publication) {

        $this->authorize('update', $publication);

        $users = User::all();

        return view(
            'publication.form',
            ['publication' => $publication, 'authors' => $users]
        );
    }

    public function update(
        UpdatePublicationRequest $request,
        Publication              $publication
    ) {
        $this->authorize('update', $publication);
        $data = $request->validated();
        $publication->fill($data);
        $publication->save();

        return redirect()->route(
            'publication.show', ['publication' => $publication]
        )->with('success', 'Successfully updated');
    }

    public function destroy(Publication $publication) {
        $this->authorize('update', $publication);
        $publication->delete();

        return redirect()->route(
            'publication.index'
        )->with('success', 'Successfully deleted');
    }
}
