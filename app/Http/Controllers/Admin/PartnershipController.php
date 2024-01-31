<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partnership;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link'  => 'required',
            // 'logo'  => 'required',
        ]);

        $data = $request->all();

        if ($request->has('logo')) {
            $logo = $request->logo;
            $new_logo = time() . 'logopartnership' . $logo->getClientOriginalName();
            $tujuan_uploud = 'upload/logopartnership/';
            $logo->move($tujuan_uploud, $new_logo);
            $data['logo'] = $tujuan_uploud . $new_logo;
        }

        Partnership::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data  = Partnership::findOrFail($id);

        return view('Admin.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = Partnership::findOrFail($id);

        return view('Admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'link'  => 'required',
            // 'logo'  => 'required',
        ]);

        $data = Partnership::where('id', $id)->findOrFail($id);

        if ($request->hasFile('logo')) {

            //upload new image
            $image = $request->file('logo');
            $new_foto = time() . 'logopartnership' . $image->getClientOriginalName();
            $tujuan_uploud = 'upload/logopartnership/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($data->logo))) {
                unlink(($data->logo));
            }

            //update with new image
            $data->update([
                'logo'    => $tujuan_uploud . $new_foto,
                'link'    => $request->link,
            ]);
        } else {
            //update without image
            $data->update([
                'link'    => $request->link
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partnership::findOrFail($id)->delete();

        return redirect()->back();
    }
}
