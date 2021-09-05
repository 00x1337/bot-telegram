<?php

namespace App\Http\Livewire;

use App\Models\all;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Symfony\Component\String\s;

class Dash extends Component
{
    public $word,$reply,$oo,$checkboxforwords,$cargoTypes,$select_words,$show_log;
    public $selectedtypes;
    public    $log=[];

    public function Get_Msg()
    {
        if (Auth::User()->api == null){
            $this->dispatchBrowserEvent('swal', [
                'type' => 'error',
                'message' => 'اذهب الئ الاعدادات واضيف Token الخاص بك',
            ]);
        }
        array_push($this->log,"جاري الاتصال ...");

        $date = "";
        $stop =false;
        $_sleep = 2;

        while (!$stop) {
            try {
                $ret = @file_get_contents("https://api.telegram.org/bot" . Auth::User()->api . "/getUpdates");
                if (strpos($http_response_header[0], "200")) {


                    $tt = json_decode($ret, true);

                    foreach ($tt['result'] as $all) {
                        $first_name = $all['message']['from']['first_name'];
                        $is_bot = $all['message']['from']['is_bot'];
                        $username = $all['message']['from']['username'];
                        $type = $all['message']['from']['username'];
                        $id = $all['message']['from']['id'];
                        $text = $all['message']['text'];
//
                        $this->oo = $text;
                        var_dump($all['message']);
                        if (all::where("words", '=', $text)->count() >= 1) {
                            $pp = all::where("words", '=', $text)->first();
                            if ($text == $pp->words) {
                                $text = all::where("words", '=', $text)->first()->reply;
                                $text = explode("{}", $text);
                                $text1 = array_rand($text);
                                $text = $text[$text1];


                                if (stripos($date, $all['message']['date']) == 0) {
                                    $date .= ' ' . $all['message']['date'];

                                    $ret = file_get_contents("https://api.telegram.org/bot" . Auth::User()->api . "/sendMessage?chat_id=" . $id . "&text=" . $text);

                                }
                            }
                        }
                    }
                    sleep($_sleep);
                    $_sleep -= 1;
                }else{
                    array_push($this->log,"خطأ في الاتصال");
                    $stop =true;
                }
            }catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception  $e){
                array_push($this->log,$e);
                $_sleep +=5;
            }
            sleep($_sleep);
            }

    }

    public function add(){
        $str = "Hello world. It's a beautiful day.";
        $arr = array($str);
        if ($this->selectedtypes == true){

        $f =  all::find($this->select_words);
        $add_array = array(all::where('id','=',$this->select_words)->first()->reply,$this->reply);
        $f->words = all::where('id','=',$this->select_words)->first()->words;
        $f->reply = implode("{}",$add_array);
        $f->update();
        $this->dispatchBrowserEvent('swal', [
            'type' => 'success',
            'message' => 'تم اضافة الرد',
        ]);
        }else{
            $f = new all();
            $f->words = $this->word;
            $f->reply = $this->reply;
            $f->user_id = Auth::User()->id;

            $f->save();
            $this->dispatchBrowserEvent('swal', [
                'type' => 'success',
                'message' => 'تم اضافة الرد',
            ]);
        }

    }

    public $initial_cargo_types;


    public function render()
    {
        $re_rr = all::where('user_id','=',Auth::User()->id)->get();
        return view('livewire.dash',compact('re_rr'));
    }
}
