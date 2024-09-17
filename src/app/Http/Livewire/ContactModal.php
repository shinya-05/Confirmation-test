<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactModal extends Component
{
    public $contact;
    public $isOpen = false; // モーダルの開閉状態を管理する変数

    // イベントリスナー
    protected $listeners = ['openModal'];

    // モーダルを開く
    public function openModal($contactId)
    {
        dd("Modal Open Triggered with Contact ID: " . $contactId); // デバッグ
        $this->contact = Contact::find($contactId);
        $this->isOpen = true;
    }

    // モーダルを閉じる
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.contact-modal');
    }
}
