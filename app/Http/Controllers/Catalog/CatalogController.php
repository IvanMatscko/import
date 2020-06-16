<?php

namespace App\Http\Controllers\Catalog;

use App\Catalog;
use App\Exports\CatalogExport;
use App\Http\Controllers\Controller;
use App\Imports\CatalogImport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::all();
        return view('catalog.catalog', compact('catalogs'));
    }

    public function export()
    {
        return Excel::download(new CatalogExport(), 'catalog.xlsx');
    }

    public function import(Request $request)
    {

        $catalogs = Excel::toCollection(new CatalogImport(), $request->file('import_file'));

        $data = [];
        $existing =0 ;
        foreach ($catalogs[0] as $key => $row) {
            $data[] = [
                'rubric' => $row[1],
                'categories' => $row[2],
                'brand' => $row[3],
                'product_name' => $row[4],
                'code' => $row[5],
                'description' => $row[6],
                'price' => $row[7],
                'guarantee' => $row[8],
                'availability' => $row[9],
            ];

            if ($key % 1000 == 0) {
                DB::table('catalogs')->insert($data);
                $data = [];
            }else {
                ++$existing;
            }

        }
        DB::table('catalogs')->insert($data);




        /*$t = time();
        foreach ($catalogs[0] as $row) {
            Catalog::where('id', $row[0])->insert([
                'rubric' => $row[1],
                'categories' => $row[2],
                'brand' => $row[3],
                'product_name' => $row[4],
                'code' => $row[5],
                'description' => $row[6],
                'price' => $row[7],
                'guarantee' => $row[8],
                'availability' => $row[9],
            ]);
        }
        echo time() - $t;
        die;*/

        return redirect()->route('catalog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        //
    }
}
