<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BaseController
{

    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        //$categories  = $this->categoryRepository->listCategories();

        $categories = Category::whereNotNull('parent_id')->get();
        $this->setPageTitle('category', 'list category');
        return view('admin.category.index', compact('categories'));
    }

    public function create(){

        $categories = Category::whereNull('parent_id')->get();
        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
            dd($request->all());
    }
}
