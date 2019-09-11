<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function showAllPersons() {
        return response()->json(Person::all());
    }

    public function showOnePerson($id) {
        return response()->json(Person::with('father', 'mother')->find($id));
    }

    public function create(Request $request) {
        $this->personValidate($request);
        $person = Person::create($request->all());

        return response()->json($person, 201);
    }

    public function update($id, Request $request) {
        $this->personValidate($request);
        $person = Person::findOrFail($id);
        $person->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id) {
        Person::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    private function personValidate($request) {
        $this->validate($request, [
            'fname' => 'required|min:3|max:255',
            'lname' => 'required|min:3|max:255',
            'birthday' => 'required|date',
        ]);
    }

}
