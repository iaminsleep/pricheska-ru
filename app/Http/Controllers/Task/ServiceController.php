<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use App\Models\Task\Task;
use App\Models\Task\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use App\Http\Requests\Task\OrderService;
use App\Http\Requests\Task\StoreService;

class ServiceController extends Controller
{
    public function order(OrderService $request, $id)
    {
        $service = Service::findOrFail($id);

        $task = Task::create([
            'title' => $service->name,
            'description' => $service->description,
            'category_id' => $service->category_id,
            'creator_id' => auth()->user()->id,
            'performer_id' => $service->user_id,
            'budget' => $service->price,
            'deadline' => $request->deadline,
            'address' => $request->address,
            'image' => $service->image,
        ]);

        // Create a new notification instance for the barber that was chosen for this job
        $performerNotification = new UserNotification([
            "message" => 'Вас выбрали исполнителем для',
            "task_name" => $service->name,
            'task_id' => $task->id,
            "type" => 'executor',
        ]);
        $performerNotification->notifiable_type = 'App\Models\User';
        $performer = User::find($service->user_id);
        $performer->notify($performerNotification);

        return redirect(route('tasks.single', ['id' => $task->id]));
    }

    public function create()
    {
        $errors_array = [
            [
                'name' => 'Название',
                'alias' => 'name'
            ],
            [
                'name' => 'Описание услуги',
                'alias' => 'description'
            ],
            [
                'name' => 'Категория',
                'alias' => 'category_id'
            ],
            [
                'name' => 'Цена',
                'alias' => 'price'
            ],
        ];


        return view('front.tasks.services.create', [ 'errors_array' => $errors_array ]);
    }

    public function store(StoreService $request)
    {
        $data = $request->validated();
        $data['image'] = Service::uploadImage($request);

        $service = Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'user_id' => auth()->user()->id,
            'price' => $data['price'],
            'image' => $data['image'],
        ]);

        return redirect(route('users.single', ['id' => $service->user->id]));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('front.tasks.services.edit', [
            'service' => $service,
        ]);
    }

    public function update(StoreService $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->all();

        if ($file = Service::uploadImage($request, $service->image)) { // загрузка и удаление предыдущего изображения через модель поста
            $data['image'] = $file;
        }

        $service->update($data);

        return redirect()->route('users.single', ['id' => $service->user->id]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // $service->deleteImage(); // удаление изображения через фукнцию в eloquent модели
        $service->delete();

        return redirect()->route('users.single', ['id' => $service->user->id]);
    }
}
