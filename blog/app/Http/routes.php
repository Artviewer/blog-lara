<?php
use App\News;
use Illuminate\Http\Request;

/**
 * Вывести список всех задач
 */
Route::get('/', function () {
    $news = News::orderBy('created_at', 'asc')->get();

    return view('news', [
        'news' => $news
    ]);
});

/**
 * Вывод административной части
 */
Route::get('/admin', function () {
    $news = News::orderBy('created_at', 'asc')->get();

    return view('admin', [
        'news' => $news
    ]);
});

/**
 * Вывод административной части
 */
Route::any('/concretnews/{id}', function ($id) {
    $news = News::where('id','=',$id)->get();
    return view('concretnews', [
        'news' => $news
    ]);
});


Route::any('/admin/edit/{id}', function($id){
    $news = News::where('id','=',$id)->get();
    return view ('edit',[
        'news'=>$news
    ]);
});

Route::post('/admin/edit/{id}', function (Request $request) {
    $item = News::where('id','=',$request->id)->get();
    $item->title = $request->title;
    $item->text = $request->text;
    $item->update();
    return redirect('/admin/edit/{id}');
});

/**
 * Добавить новую задачу
 */
Route::post('/admin', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'text' => 'required|min:100'
    ]);

    if ($validator->fails()) {
        return redirect('/admin')
            ->withInput()
            ->withErrors($validator);
    }
    $item = new News;
    $item->title = $request->title;
    $item->text = $request->text;
    $item->save();

    return redirect('/admin');
});


/**
 * Удалить существующую задачу
 */
Route::delete('/admin/{id}', function ($id) {
    News::findOrFail($id)->delete();
    return redirect('/admin');
});