<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Requests\Attribute\AttributeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends BaseController
{

    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();
        $this->setPageTitle('Attributes', 'List of all attributes');
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Attributes', 'Create Attributes');

        return  view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $attribute = $this->attributeRepository->createAttribute($request->all());

        if(!$attribute){
            return  $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
           return  $this->responseRedirect('attribute.index','Attribute added successfully' ,'success',false, false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = $this->attributeRepository->findAttributeId($id);
        $this->setPageTitle('Attributes', 'Edit Attributes'.$attribute->name);
        return  view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $attribute = $this->attributeRepository->updateAttribute($request->all(), $id);

        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute updated successfully' ,'success',false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = $this->attributeRepository->deleteAttribute($id);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while deleting attribute.', 'error', true, true);
        }
        return $this->responseRedirect('attributes.index', 'Attribute deleted successfully' ,'success',false, false);

    }
}
