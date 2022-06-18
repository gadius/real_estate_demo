<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RealEstateRequest;
use App\Http\Controllers\BaseController;
use App\Models\RealEstate;
use App\Http\Resources\RealEstateResource;
use App\Http\Resources\RealEstateCollection;


class RealEstateController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestate = RealEstate::select(['id','name','real_state_type','city','country'])->get();
      
        return $this->sendSuccess(new RealEstateCollection($realestate), 'RealEstate retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RealEstateRequest $request)
    {     
        $realestate = RealEstate::create($request->all());
     
        return $this->sendSuccess(new RealEstateResource($realestate), 'RealEstate created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realestate = RealEstate::find($id);
    
        if (is_null($realestate)) {
            return $this->sendError('RealEstate not found.');
        }
     
        return $this->sendSuccess(new RealEstateResource($realestate), 'RealEstate retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RealEstateRequest $request, RealEstate $realestate)
    {                
        $realestate->update($request->all());  

        return $this->sendSuccess(new RealEstateResource($realestate), 'RealEstate updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $realestate)
    {
        $realestate->delete();
     
        return $this->sendSuccess([], 'RealEstate deleted successfully.');
    }
}
