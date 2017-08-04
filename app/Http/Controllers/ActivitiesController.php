<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 02/08/17
 * Time: 22:55
 */

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivities;
use App\Models\Activity;
use App\Models\Status;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * @var Activity
     */
    private $model;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $activities = $this->model->paginate();

        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        $allStatus = app(Status::class)->all();

        return view('activities.create', compact('allStatus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:0|max:255|String',
            'description' => 'required|min:0|max:600|String',
            'start_date' => 'required|date',
            'finish_date' => 'required_unless:status_id,4',
            'status_id' => 'required|integer|exists:status,id',
            'situation' => 'required|in:Ativo,Inativo'
        ]);

        $this->model->create($request->all());

        return redirect()->route('activities.index');
    }

    public function delete(int $id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('activities.index');
    }

    public function edit(int $id)
    {
        $activity = $this->model->find($id);
        $allStatus = app(Status::class)->all();

        return view('activities.edit', compact('activity', 'allStatus'));
    }

    public function update(int $id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:0|max:255|String',
            'description' => 'required|min:0|max:600|String',
            'start_date' => 'required|date',
            'finish_date' => 'required_unless:status_id,4',
            'status_id' => 'required|integer|exists:status,id',
            'situation' => 'required|in:Ativo,Inativo'
        ]);

        $this->model->find($id)->update($request->all());

        return redirect()->route('activities.index');
    }
}