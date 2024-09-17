<div>
    @if($isOpen)
        <div class="modal-overlay">
            <div class="modal-container">
                <div class="modal-header">
                    <h2>詳細情報</h2>
                    <button wire:click="closeModal" class="modal-close-button">&times;</button>
                </div>
                <div class="modal-body">
                    @if($contact)
                        <p><strong>お名前:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
                        <p><strong>性別:</strong> {{ $contact->gender == 1 ? '男性' : '女性' }}</p>
                        <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
                        <p><strong>電話番号:</strong> {{ $contact->tell }}</p>
                        <p><strong>住所:</strong> {{ $contact->address }}</p>
                        <p><strong>建物名:</strong> {{ $contact->building }}</p>
                        <p><strong>お問い合わせの種類:</strong> {{ $contact->category->content }}</p>
                        <p><strong>お問い合わせ内容:</strong> {{ $contact->detail }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button wire:click="closeModal" class="btn-close">閉じる</button>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-container {
    background-color: white;
    padding: 20px;
    width: 400px;
    border-radius: 10px;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-body {
    margin-top: 20px;
}

.modal-footer {
    text-align: right;
    margin-top: 20px;
}

.modal-close-button {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}
</style>


