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
        $categories = Category::whereNotNull('parent_id')->with('parent')->get();;
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
        $category = $this->categoryRepository->createCategory($request->all());
        if (!$category) {
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('category.index', 'Category added successfully' ,'success',false, false);
    }

    public function edit($id) {

        $targetCategory = $this->categoryRepository->findCategoryBuId($id);
        $categories = Category::whereNull('parent_id')->get();

        $this->setPageTitle('Categories', 'Edit Category : '.$targetCategory->name);

        return view('admin.category.edit',compact('targetCategory', 'categories'));
    }

    public function update( CategoryStoreRequest $request)
    {
        $category = $this->categoryRepository->updateCategory($request->all());
        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirectBack('Category updated successfully' ,'success',false, false);

    }

    public function delete($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category deleted successfully' ,'success',false, false);

    }


}
