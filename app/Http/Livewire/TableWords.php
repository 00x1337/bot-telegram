<?php

namespace App\Http\Livewire;

use App\Models\all;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TableWords extends Component
{
    public $sel;
    public $reply;
    public $word;
    public $confirmUserDeletion;
    public $confirmingdel;

    public function edit($id){
        $tt = implode('\n',$this->replys);
        $find_words = all::where('id','=',$id)->first();
        $tt .= '<input type="text" class="input is-primary" wire:model="words[]" value="'.$find_words->words.'">';

        foreach(explode('{}',$find_words->reply) as $all){
            $tt .= '<input type="text" class="input is-primary" wire:model="replys[]" value="'.$all.'">';

        }
        $this->dispatchBrowserEvent('swal', [
            'type' => 'modal',
            'html' =>
                $tt,
            'showCancelButton' => true,
        ]);
    }

    public $confirmingUserDeletion;
    public $userDeleted;
    public function mount(){
        $this->confirmingUserDeletion=false;
        $this->userDeleted=false;
        $this->confirmingdel =false;

    }
    public function deletingUser(){
        $this->confirmingUserDeletion=true;
    }
    public function deleteUser()
    {
        $this->userDeleted = true;
        $this->confirmingUserDeletion=false;
    }
//  : {
//            autocapitalize: 'off'
//  },
//  confirmButtonText: 'Look up',
//  showLoaderOnConfirm: true,
//  preConfirm: (login) => {
//            return fetch(`//api.github.com/users/${login}`)
//                .then(response => {
//                if (!response.ok) {
//                    throw new Error(response.statusText)
//        }
//                return response.json()
//      })
//      .catch(error => {
//                Swal.showValidationMessage(
//                    `Request failed: ${error}`
//                )
//      })
//  },
//  allowOutsideClick: () => !Swal.isLoading()
//}).then((result) => {
//if (result.isConfirmed) {
//Swal.fire({
//title: `${result.value.login}'s avatar`,
//imageUrl: result.value.avatar_url
//    })
//  }
//})
//    }


    public function del_ok($id){
        $this->confirmingdel =false;

        $find_words = all::where('id','=',$id);
            $find_words->delete();

    }
    public function del($id){
    $this->confirmingdel =true;
}
    public function render()
    {
        $re_rr = all::where('user_id','=',Auth::User()->id)->get();

        return view('livewire.table-words',compact('re_rr'));
    }
}
