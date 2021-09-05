<div>



    <div class="container">

        <table class="table is-striped is-fullwidth">

            <tr class="th is-selected">

                <th>الكلمة</th>

                <th>الردود</th>

                <th>تعديلات</th>

            </tr>
            @foreach($re_rr as $all)

                <tr  >

                    <td>{{$all->words}}</td>

                    <td>@if(strpos($all->reply,'{}'))
                            @foreach(explode('{}',$all->reply) as $replys)
                                <span class="tag is-link">
  {{$replys}}
  <button class="delete is-small"></button>
</span>
                            @endforeach
                        @else
                            <span class="tag is-link">{{$all->reply}}<button class="delete is-small"></button></span>
                        @endif
                    </td>

                    <td>
                        {{--               <div class="modal" id="myModal">--}}
                        {{--                        <div class="modal-background"></div>--}}
                        {{--                        <div class="modal-card">--}}
                        {{--                            <header class="modal-card-head">--}}
                        {{--                                <p class="modal-card-title">تعديل</p>--}}
                        {{--                                <button class="delete" aria-label="close" data-bulma-modal="close"></button>--}}
                        {{--                            </header>--}}
                        {{--                            <section class="modal-card-body">--}}

                        {{--                                <input class="input" type="text" wire:model="word" value="{{$all->words}}">--}}
                        {{--                                @if(strpos($all->reply,'{}'))--}}
                        {{--                                    @foreach(explode('{}',$all->reply) as $replys)--}}
                        {{--                                        <input class="input"  type="text" wire:model="reply" value="">{{$replys}}--}}

                        {{--                                    @endforeach--}}
                        {{--                                @else--}}
                        {{--                                    <input class="input"  type="text" wire:model="reply" value="{{$all->reply}}">--}}
                        {{--                                @endif--}}
                        {{--                            </section>--}}
                        {{--                            <footer class="modal-card-foot">--}}
                        {{--                                <button class="button is-success" data-bulma-modal="close" wire:click="">حفظ</button>--}}
                        {{--                                <button class="button" data-bulma-modal="close">الغاء</button>--}}
                        {{--                            </footer>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        <span class="tag is-danger is-medium" wire:loading.attr="disabled" wire:click="del('{{$all->id}}')">حذف<button class="delete"></button></span>
                        <x-jet-confirmation-modal wire:model="confirmingdel">
                            <x-slot name="title">
                                هل انت متاكد تريد الحذف
                            </x-slot>

                            <x-slot name="content">

                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('confirmingdel')" wire:loading.attr="disabled">
                                    الغاء
                                </x-jet-secondary-button>

                                <x-jet-danger-button class="ml-2" wire:click="del_ok('{{$all->id}}')" wire:loading.attr="disabled">
                                    حذف
                                </x-jet-danger-button>
                            </x-slot>
                        </x-jet-confirmation-modal>
                        <x-jet-confirmation-modal wire:model="confirmingUserDeletion">
                            <x-slot name="title">
                                تعديل
                            </x-slot>

                            <x-slot name="content">

                                {{--                                <input class="input" type="text" wire:model="word[{{$all->id}}]" value="{{$all->words}}">--}}
                                {{--                                @if(strpos($all->reply,'{}'))--}}
                                {{--                                    @foreach(explode('{}',$all->reply) as $replys)--}}
                                {{--                                        <input class="input"  type="text" name="text" value="{{$replys}}"  wire:model="email">--}}

                                {{--                                    @endforeach--}}
                                {{--                                @else--}}
                                {{--                                    <input class="input"  type="text"   value="http://www.facebook.com/$facebook">--}}
                                {{--                                @endif--}}
                                <h1>...قريباَ</h1>
                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                                    الغاء
                                </x-jet-secondary-button>

                                <x-jet-button class="ml-2" wire:click="del_ok('{{$all->id}}')" wire:loading.attr="disabled">
                                    حفظ
                                </x-jet-button>
                            </x-slot>
                        </x-jet-confirmation-modal>


                        <a class="button is-link" href="/edit/{{$all->id}}">
                            تعديل
                        </a>


                    </td>
                </tr>
            @endforeach

        </table>

    </div>




</div>
