<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\AcceptResponse;

use App\Http\Services\DeleteResponse;
use App\Http\Requests\Task\StoreResponse;
use App\Http\Services\CreateResponseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResponseController extends Controller
{
    public function __invoke($responseId, $service)
    {
        try {
            $response = Response::findOrFail($responseId);

            $service->execute($response);

            return back();
        } catch(ModelNotFoundException $exception) {
            return back();
        }
    }

    public function store(StoreResponse $request, CreateResponseService $service, $taskId)
    {
        $service->execute($request->validated(), $taskId);

        return redirect(route('tasks.single', ['id' => $taskId]));
    }

    public function accept($responseId)
    {
        return $this->__invoke($responseId, new AcceptResponse());
    }

    public function delete($responseId)
    {
        return $this->__invoke($responseId, new DeleteResponse());
    }
}
