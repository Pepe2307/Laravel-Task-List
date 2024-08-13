<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// TODO: MAIN ROUTE    ******************
Route::get('/tasks', function () {
    return view('index',[
        'tasks'=>Task::latest()->paginate()
    ]);
})->name('tasks.index');


// ? ROUTES BY ID      ******************
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    -> with('success', 'Task created successfully');

})->name('task.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
    -> with('success', 'Task UPDATED successfully');

})->name('task.update');



Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');


Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('succes', 'Task updated successfully');
})-> name('tasks.toggle-complete');


//! FALLBACK Y REDIRECT ******************
Route::fallback(function () {
    return '404 custom error page';
});
Route::get('/', function () {
    return redirect ()->route('tasks.index');
});