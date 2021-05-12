<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderAdminController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }

    public function index(){
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create(){
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request){
        try {
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }

            $this->slider->create($dataInsert);
            DB::commit();
            return redirect()->route('sliders.index');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().'-- Line : '.$exception->getLine());
        }

    }

    public function edit($id){
        $slider = $this->slider->find($id);

        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,$id){
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }

            $this->slider->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('sliders.index');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().'-- Line : '.$exception->getLine());
        }
    }
}
