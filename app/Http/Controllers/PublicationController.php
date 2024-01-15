<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
use App\Models\User;

class PublicationController extends Controller {
    public function index() {
        $publications = Publication::orderBy('created_at', 'desc')->get();

        return view('publication.index', ['publications' => $publications]);
    }

    public function show(Publication $publication) {
        return view(
            'publication.show',
            ['publication' => $publication, 'comments' => $publication->comments]
        );
    }

    public function create() {
        $users = User::all();

        return view('publication.form', ['authors' => $users]);
    }

    public function add(StorePublicationRequest $request) {
        $data = $request->validated();

        $newP = new Publication($data);
        $newP->save();

        return redirect()->route(
            'publication.show', $newP
        )->with('success', 'Successfully added');
    }

    public function edit(Publication $publication) {
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
        $data = $request->validated();
        $publication->fill($data);
        $publication->save();

        return redirect()->route(
            'publication.show', ['publication' => $publication]
        )->with('success', 'Successfully updated');
    }

    public function destroy(Publication $publication) {
        $publication->delete();

        return redirect()->route(
            'publication.index'
        )->with('success', 'Successfully deleted');
    }

}
