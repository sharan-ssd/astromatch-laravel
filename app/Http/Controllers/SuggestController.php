<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuggestController extends Controller
{
    private $religions = [
        "Hindu", "Muslim", "Christian", "Sikh", "Buddhist", "Jain", "Parsi"
    ];

    private $castes = [
        "Brahmin", "Kshatriya", "Vaishya", "Shudra", "SC", "ST", "OBC"
    ];

    private $occupations = [
        "Doctor", "Engineer", "Teacher", "Farmer", "Businessman",
        "Lawyer", "Government Employee", "Artist"
    ];

    public function suggest(Request $request)
    {
        $query = strtolower($request->get('q', ''));
        $type  = strtolower($request->get('type', 'all'));
        $lang  = 'name_' . $request->get('lang', '');

        $results = [];

        if ($type === 'religion') {
        
            $allowedCols = ['name','name_ta','name_hi','name_te','name_kn','name_ml'];
            if (!in_array($lang, $allowedCols)) {
                $lang = 'name';
            }

            $results = DB::select("select $lang as word from ab_$type"."_table where name like '%$query%' ");
            return response()->json($results);
        }

        if ($type === 'caste' || $type === 'all') {
            foreach ($this->castes as $item) {
                if (stripos($item, $query) !== false) {
                    $results[] = ["word" => $item];
                }
            }
        }

        if ($type === 'occupation' || $type === 'all') {
            foreach ($this->occupations as $item) {
                if (stripos($item, $query) !== false) {
                    $results[] = ["word" => $item];
                }
            }
        }

        return response()->json($results);
    }
}
