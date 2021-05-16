<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;

class CategoryController extends Controller
{
    use StorageImageTrait;
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory('');

        return view('admin.category.add',compact('htmlOption'));
    }

    public function store(Request $request){
        $dataInsert = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'recommend' => $request->recommend,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'category');
        if(!empty($dataUploadFeatureImage)){
            $dataInsert['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->category->create($dataInsert);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function edit($id){

        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit',compact('category','htmlOption'));
    }

    public function update($id, Request $request){
        $dataUpdate = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'recommend' => $request->recommend,
        ];

        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'category');
        if(!empty($dataUploadFeatureImage)){
            $dataUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }

        $this->category->find($id)->update($dataUpdate);
        return redirect()->route('categories.index');
    }

    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
