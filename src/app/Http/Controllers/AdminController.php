<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{

    public function index (Request $request)
{
    // 検索クエリを作成
    $query = Contact::query();

    // 名前またはメールアドレスで検索
    if ($request->input('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->input('keyword') . '%')
              ->orWhere('last_name', 'like', '%' . $request->input('keyword') . '%')
              ->orWhere('email', 'like', '%' . $request->input('keyword') . '%');
        });
    }

    // 性別で検索
    if ($request->input('gender')) {
        $query->orwhere('gender', $request->input('gender'));
    }

    // お問い合わせの種類で検索
    if ($request->input('category')) {
        $query->orwhere('category_id', $request->input('category'));
    }

    // 日付で検索
    if ($request->input('date')) {
        $query->orwhereDate('created_at', '=', $request->input('date'));
    }

    // ペジネーションを含めた結果を取得
    $contacts = $query->paginate(7);

    // $categoriesを追加してビューに渡す
    $categories = Category::all();

    // 検索結果を返す
    return view('admin', compact('contacts', 'categories'));
}


    public function export(Request $request)
{
    // 検索クエリを作成
    $query = Contact::query();

    // 名前またはメールアドレスで検索
    if ($request->input('keyword')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->input('keyword') . '%')
              ->orWhere('last_name', 'like', '%' . $request->input('keyword') . '%')
              ->orWhere('email', 'like', '%' . $request->input('keyword') . '%');
        });
    }

    // 性別で検索
    if ($request->input('gender')) {
        $query->orWhere('gender', $request->input('gender'));
    }

    // お問い合わせの種類で検索
    if ($request->input('category')) {
        $query->orWhere('category_id', $request->input('category'));
    }

    // 日付で検索
    if ($request->input('date')) {
        $query->orWhereDate('created_at', '=', $request->input('date'));
    }

    // 絞り込んだデータをCSVとしてエクスポート
    $contacts = $query->get();
    return Excel::download(new ContactsExport($contacts), 'filtered_data.csv');
}


}
