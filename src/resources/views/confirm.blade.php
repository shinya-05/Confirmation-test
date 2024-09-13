@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</p>
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <p>
                            @switch($contact['gender'])
                                @case(1)
                                    男性
                                    @break
                                @case(2)
                                    女性
                                    @break
                                @case(3)
                                    その他
                                    @break
                            @endswitch
                        </p>
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['email'] }}</p>
                        <input type="hidden" name="email" value="{{ $contact['email'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['tell1'] }}-{{ $contact['tell2'] }}-{{ $contact['tell3'] }}</p>
                        <input type="hidden" name="tell1" value="{{ $contact['tell1'] }}"/>
                        <input type="hidden" name="tell2" value="{{ $contact['tell2'] }}"/>
                        <input type="hidden" name="tell3" value="{{ $contact['tell3'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['address'] }}</p>
                        <input type="hidden" name="address" value="{{ $contact['address'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact['building'] }}</p>
                        <input type="hidden" name="building" value="{{ $contact['building'] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <p>{{ $category->content }}</p>  <!-- カテゴリの表示 -->
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <p>{{ nl2br(e($contact['detail'])) }}</p>
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <a class="form__button-correction" href="#" onclick="event.preventDefault(); history.back();">修正</a>
        </div>
    </form>
</div>
@endsection