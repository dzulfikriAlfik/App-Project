<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $data = [
         "title" => "Supplier",
         "suppliers" => Supplier::all()
      ];
      return view('suppliers.index', $data);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $data = [
         "title" => "Tambah Supplier"
      ];
      return view('suppliers.create', $data);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $validatedData = $request->validate([
         'supplier_name' => 'required',
         'supplier_phone' => 'required',
         'supplier_address' => 'required',
      ]);

      Supplier::create($validatedData);

      return redirect('suppliers')->with('success', 'Berhasil menambah data supplier');

      // return back()->with('success', ' Post baru berhasil dibuat.');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $data = [
         "title" => "Edit Supplier",
         "supplier" => Supplier::find($id)
      ];
      return view("suppliers.edit", $data);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Supplier $supplier)
   {
      $validatedData = $request->validate([
         'supplier_name' => 'required',
         'supplier_phone' => 'required',
         'supplier_address' => 'required',
      ]);

      Supplier::where('supplier_id', $supplier->supplier_id)
         ->update($validatedData);

      return redirect('suppliers')->with('success', 'Berhasil mengubah data supplier');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Supplier $supplier)
   {
      Supplier::destroy($supplier->supplier_id);

      return redirect('/suppliers')->with('success', 'Berhasil menghapus supplier');
   }
}
