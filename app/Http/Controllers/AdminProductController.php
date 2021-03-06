<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, Tag $tag, ProductTag $productTag){
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index(){
        $products = $this->product->paginate(4);
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $htmlOption = $this->getCategory('');

        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'description' => $request->description,
                'content' => $request->contents,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'page' => $request->page,
                'count' => $request->count,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'views_count' => 0,

            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $product = $this->product->create($dataProductCreate);

            //Insert data to product_images
            if($request->hasFile('image_path')){
                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            //Th??m tags cho product
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    //Th??m v??o b???ng tags
                    $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->attach($tagIds);
            }
            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().'-- Line : '.$exception->getLine());
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }

    public function update($id, Request $request){
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'description' => $request->description,
                'content' => $request->contents,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'page' => $request->page,
                'count' => $request->count,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,

            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //Th??m d??? li???u cho product_images
            if($request->hasFile('image_path')){
                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            //Th??m tags cho product
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    //Th??m v??o b???ng tags
                    $tagInstance = $this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().'-- Line : '.$exception->getLine());
        }
    }

    public function delete($id){
        $this->product->find($id)->delete();
        return redirect()->route('products.index');
    }
}
