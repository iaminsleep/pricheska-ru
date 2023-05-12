<?php

namespace App\Http\Controllers\Admin\Task;

use App\Models\Task\Service;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('category')->paginate(5); // извлекаем посты с определёнными отношениями (не всеми), для оптимизации ресурсов
        return view('admin.services.index', ['services' => $services]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // $service->deleteImage(); // удаление изображения через фукнцию в eloquent модели
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Услуга удалена');
    }
}
