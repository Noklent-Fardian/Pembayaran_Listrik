<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\level as model;

class LevelController extends Controller
{
    
    public $pack = [
        'title' => [
            'index' => 'Nama Level',
            'create' => 'Buat Level',
            'edit' => 'Edit Level',
            'show' => 'Show Level',
        ],
        'route' => [
            'index' => 'level.index',
            'show' => 'level.show',
            'create' => 'level.create',
            'store' => 'level.store',
            'edit' => 'level.edit',
            'update' => 'level.update',
            'destroy' => 'level.destroy',
            'fields' => 'level.__fields'
        ],
        'dataTable' => [
            'nama_level' => 'Nama Level',
        ],
        'show' => [
            'nama_level' => 'Nama Level',
            
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = model::orderBy( 'nama_level')->paginate(20);
        $dataCount = model::getDataCount();
        if ($request->get('field') != null and $request->get('s') != null) {
            $data = model::search($request->get('s'), $request->get('field'));
        }
        return view($this->pack['route']['index'], ['pack' => $this->pack, 'data' => $data, 'dataCount' => $dataCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->pack['route']['create'], ['model' => [], 'pack' => $this->pack]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_level' => 'required|max:20|unique:level,nama_level',
        ]);

        $data = new model();
        $data->loadModel($request->all());
        try {
            $data->save();
            if ($request->saveAndAddAnother) {
                return redirect()->route($this->pack['route']['create'])->with(
                    [
                        'success' => true,
                        'message' => 'Success add new data.',
                    ]
                );
            }
            return redirect()->route($this->pack['route']['show'], $data)->with(
                [
                    'success' => true,
                    'message' => 'Success add new data.',
                ]
            );
        } catch (\Exception $e) {
            return redirect()->route($this->pack['route']['create'])->with(
                [
                    'success' => false,
                    'message' => 'An error happen, ' . $e->getMessage(),
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view($this->pack['route']['show'], [
            'pack' => $this->pack,
            'data' => model::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->pack['route']['edit'], [
            'pack' => $this->pack,
            'model' => model::findOrFail($id),
        ]);
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
        $data = model::findOrFail($id);
        $this->validate($request, [
            'nama_level' => 'required|max:20|unique:level,nama_level,' . $data->id,
        ]);
        $data->loadModel($request->all(), 'update');
        try {
            $data->save();
            if ($request->saveAndContinueEditing) {
                return redirect()->route($this->pack['route']['edit'], $data)->with(
                    [
                        'success' => true,
                        'message' => 'Success update data.',
                    ]
                );
            }
            return redirect()->route($this->pack['route']['show'], $data)->with(
                [
                    'success' => true,
                    'message' => 'Success update data.',
                ]
            );
        } catch (\Exception $e) {
            return redirect()->route($this->pack['route']['edit'], $data)->with(
                [
                    'success' => false,
                    'message' => 'An error happen, ' . $e->getMessage(),
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Model::findOrFail($id);
        try {
            $data->delete();
            return redirect()->route($this->pack['route']['index'])->with(
                [
                    'success' => true,
                    'message' => 'Success delete data.',
                ]
            );
        } catch (\Exception $e) {
            return redirect()->route($this->pack['route']['show'], $data)->with(
                [
                    'success' => false,
                    'message' => 'An error happen, ' . $e->getMessage(),
                ]
            );
        }
    }
}
