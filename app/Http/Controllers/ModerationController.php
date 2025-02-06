<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class ModerationController extends Controller
{

    public function moderation()
    {
        $products = Products::with('user')->paginate(5);
        return view('moderation.moderation', ['products' => $products]);
    }
    public function published()
    {

        $products = Products::with('user')->where('status', 'published')->paginate(5);

        return view('moderation.moderation', ['products' => $products]);
    }
    public function unpublished()
    {
        $products = Products::with('user')->where('status', 'unpublished')->paginate(5);

        return view('moderation.moderation', ['products' => $products]);
    }
    public function archive()
    {
        $products = Products::with('user')->where('status', 'archive')->paginate(5);

        return view('moderation.moderation', ['products' => $products]);
    }
   
    public function moderation_check(Request $request)
    {
        $action = $request->input('submit_action'); // Определяем, какая кнопка нажата
        $selectValue = $request->input('options', []); // Получаем значение из селекта
        $products = Products::whereIn('id', $selectValue)->get();

        if ($products->isEmpty()) {
            return redirect(route('moderation.moderation'))->with('status', 'Действие не выполнено, вероятно что ничего не выбрано.');
        } else {
            if ($action === 'delete') {

                Products::whereIn('id', $selectValue)->delete();
                return redirect(route('moderation.moderation'))->with('status', 'Записи успешно удалены.');
            } elseif ($action === 'publish') {

                Products::whereIn('id', $selectValue)->update(['status' => 'published']);
                return redirect(route('moderation.published'))->with('status', 'Записи успешно опубликованы.');
            } elseif ($action === 'archive') {

                Products::whereIn('id', $selectValue)->update(['status' => 'archive']);
                return redirect(route('moderation.archive'))->with('status', 'Записи добавлены в архив.');
            }
        }
    }
}
