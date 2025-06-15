<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('questionnaire');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        Log::debug('data', $data);

        /* $filePaths = [];
        if (!empty($data['files'])) {
            foreach ($data['files'] as $file) {
                if ($file) {
                    $path = $file->store('uploads', 'public');
                    $filePaths[] = $path;
                }
            }
        } */

        Questionnaire::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'birth_date' => $data['birth_date'],
            'email' => $data['email'],
            'marital_status' => $data['marital_status'],
            'about' => $data['about']
        ]);

        return response()->json(['success' => true]);
    }
}
