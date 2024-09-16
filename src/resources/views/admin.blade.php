@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <div class="admin-form__heading">
        <h2>Admin</h2>
    </div>
    <!-- 検索フォーム -->
    <form action="/admin" method="GET">
        @csrf
        <div class="form__group-key">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        </div>
        <div class="form__group">
            <select name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        <div class="form__group">
            <select name="category">
                <option selected>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__group">
            <input type="date" name="date" value="{{ request('date') }}">
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">検索</button>
        </div>
        <div class="form__reset">
            <a class="form__reset-link" href="/admin">リセット</a>
        </div>
    </form>

    <!-- エクスポート -->
    <div class="container">
        <div class="export-container">
            <form action="/export" method="get">
                <!-- 検索条件を隠しフィールドで送信 -->
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">
                <button class="export-container-submit" type="submit" >エクスポート</button>
            </form>
<!-- ペジネーション -->
        </div>
        <div class="pagination-container">
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>

    <!-- 検索結果 -->
    <table class="table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if ($contact->gender == 1)
                    男性
                    @elseif ($contact->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection