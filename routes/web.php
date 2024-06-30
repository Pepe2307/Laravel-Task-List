<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// TODO: MAIN ROUTE    ******************
Route::get('/tasks', function () {
    return view('index',[
        'tasks'=>Task::latest()/* ->where('completed', true) */->get()
    ]);
})->name('task.index');
// TODO: MAIN ROUTE    ******************




// ? ROUTES BY ID      ******************
Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('task.edit');

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
// ? ROUTES BY ID      ******************


//! FALLBACK Y REDIRECT ******************
Route::fallback(function () {
    return '404 custom error page';
});
Route::get('/', function () {
    return redirect ()->route('task.index');
    /* return redirect ('/hello'); */
});
//! FALLBACK Y REDIRECT ******************