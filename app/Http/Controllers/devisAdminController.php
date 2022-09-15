<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\devis;
use Illuminate\Http\Request;

class devisAdminController extends Controller
{
    public function index()
    {
        $devis = Checkout::orderby('id', 'DESC')->get();

        return view('backend.devis.index', compact('devis'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $devis = Checkout::find($id);
        if ($devis) {
            $status = $devis->delete();
            if ($status) {
                return redirect()->route('devis.index')->with('success', 'Commande supprimé avec succès');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
