<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
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
        $users = User::all();

        if(auth()->user()->role->name == 'admin') 
        {
            return view('dashboard.index', [
                'proposals' => $proposals->paginate(12),
                'users' => $users
            ]);
        }
        else if (auth()->user()->role->name == 'approver') 
        {
            return view('dashboard.index', [
                'proposals' => $proposals->paginate(12),
                'users' => $users
            ]);
        } 
        else 
        {
            return view('dashboard.index', [
                'proposals' => Proposal::where('user_id', auth()->user()->id)->latest()->paginate(12),
                'users' => $users
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
         
        $validatedData['no_adp'] = '1234567'; 
        $validatedData['no_capex'] = '7654321';
        $validatedData['ofc'] = false;
        $validatedData['gl'] = false;
        $validatedData['manager'] = false;
        $validatedData['fm'] = false;
        $validatedData['acc'] = false;
        $validatedData['user_id'] = auth()->user()->id;

        $file_permohonan = 'p'.time().'.'.$request->file_permohonan_adp->extension();
        $file_estimasi = 'e'.time().'.'.$request->file_estimasi_adp->extension();

        $validatedData['file_permohonan_adp'] = $file_permohonan;
        $validatedData['file_estimasi_adp'] = $file_estimasi;

        $request->file_permohonan_adp->move(public_path('file_permohonan'), $file_permohonan);
        $request->file_estimasi_adp->move(public_path('file_estimasi'), $file_estimasi);

        Proposal::create($validatedData);

        
        return redirect('/dashboard')->with('success', 'Berhasil mengupload proposal');

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
    public function update($id)
    {
        $approved = Proposal::find($id);
        if(auth()->user()->role_name === 'ofc')
        {
            $approved->ofc = true;
        }
        if(auth()->user()->role_name === 'gl')
        {
            $approved->gl = true;
        }
        if(auth()->user()->role_name === 'manager')
        {
            $approved->manager = true;
        }
        if(auth()->user()->role_name === 'fm')
        {
            $approved->fm = true;
        }
        if(auth()->user()->role_name === 'acc')
        {
            $approved->acc = true;
        }
        $approved->update();
        
        return redirect('/dashboard')->with('success', 'Berhasil approve');
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
