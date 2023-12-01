<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::all();
        return view ('admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view ('admin.slider.create');
    }

    public function store(SliderFormRequest $request) {

        $validatedData = $request->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] =  "uploads/slider/$filename";

        }

        $validatedData['status'] = $request->status == true ? '1':'0';

        Slider::create([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'image' => $validatedData['image'],
        'status' => $validatedData['status'],
        'link' => $validatedData['link'],
        'text' => $validatedData['text'],

        ]);

        return redirect('admin/sliders')->with('message', 'Slider adicionado com sucesso.');

    }

    public function edit(Slider $slider)  {
       return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider) {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            // Lógica para lidar com a imagem
            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] =  "uploads/slider/$filename";
        }
    
        $validatedData['status'] = $request->status == true ? '1' : '0';
    
        if (isset($validatedData['image'])) {
            // Apenas atualize a imagem se ela estiver presente no $validatedData
            Slider::where('id', $slider->id)->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'],
                'status' => $validatedData['status'],
                'link' => $validatedData['link'],
                'text' => $validatedData['text']
            ]);
        } else {
            // Atualize os outros campos, exceto a imagem
            Slider::where('id', $slider->id)->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
                'link' => $validatedData['link'],
                'text' => $validatedData['text']
            ]);
        }
    
        return redirect('admin/sliders')->with('message', 'Slider editado com sucesso.');
    }

    public function destroy(Slider $slider) {
        if($slider->count() > 0) {
        $destination = $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

       $slider->delete();
       return redirect('admin/sliders')->with('message', 'Slider deletado com sucesso.');
    }
    return redirect('admin/sliders')->with('message', 'Algo aconteceu de errado.');
    }
    
}
