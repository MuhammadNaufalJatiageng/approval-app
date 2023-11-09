<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::latest();

        if(auth()->user()->role_id == 1) 
        {
            return view('dashboard.index', [
                'proposals' => $proposals->paginate(12)
            ]);
        }
        else if (auth()->user()->role_id == 2) 
        {
            return view('dashboard.index', [
                'proposals' => $proposals->paginate(12)
            ]);
        } 
        else 
        {
            return view('dashboard.index', [
                'proposals' => Proposal::where('user_id', auth()->user()->id)->paginate(12)
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'required|max:255',
            'file_permohonan_adp' => 'required|file|mimes:pdf',
            'file_estimasi_adp' => 'required|file|mimes:pdf',
            'divisi' => 'required'
        ]);
         
        $validatedData['file_permohonan_adp'] = $request->file('file_permohonan_adp')->getClientOriginalName(); 
        $validatedData['file_estimasi_adp'] = $request->file('file_estimasi_adp')->getClientOriginalName(); 
        $validatedData['no_adp'] = '1234567'; 
        $validatedData['no_capex'] = '7654321';
        $validatedData['user_id'] = auth()->user()->id;


        $file_permohonan = $request->file('file_permohonan_adp');
        $file_estimasi = $request->file('file_estimasi_adp');

        $file_permohonan->move('file_permohonan',$file_permohonan->getClientOriginalName());

        $file_estimasi->move('file_estimasi',$file_estimasi->getClientOriginalName());

        Proposal::create($validatedData);

        
        return redirect('/')->with('success', 'Berhasil mengupload proposal');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }
}
