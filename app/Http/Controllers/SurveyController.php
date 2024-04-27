<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SurveyExport;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::orderBy('created_at', 'desc')->paginate(5);
        return view ('view.questions', compact('surveys'));
    }

    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        Survey::create($request->all());

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('survey.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        //
    }

    public function cetak(){
        $surveys = Survey::all();
        return view ('rekap.cetak-survey', compact('surveys'));
    }

    public function xlsx()
    {
        return Excel::download(new SurveyExport, 'survey_questions.xlsx');
    }

    public function survey(){
        $survey = Survey::all();
        return view ('auth.survey', compact('survey'));
    }

    // public function cetakForm()
    // {
    //     return view('survey.cetak-survey-form');
    // }

    // public function cetakTanggal($tanggalAwal, $tanggalAkhir)
    // {
    //     $tanggalAwal = date('Y-m-d', strtotime($tanggalAwal));
    //     $tanggalAkhir = date('Y-m-d', strtotime($tanggalAkhir));
    //     $cetakPertanggal = Survey::whereDate('created_at', '>=', $tanggalAwal)
    //                             ->whereDate('created_at', '<=', $tanggalAkhir)
    //                             ->get();
                                
    //     return view('survey.cetak-survey-tanggal', compact('cetakPertanggal'));
    // }
}
