<main>
    <div  class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900"><article class="tile is-child notification is-primary">

                        لوحة تحكم البوت
                    </article></h3>

                <p class="mt-1 text-sm text-gray-600">
                </p><article class="tile is-child notification is-link">

                    هنا يمكنك تشغيل البوت واضافة الكلمات
                </article>

                <article class="tile is-child notification is-danger">
                    <p class="title">ملاحظة...</p>
                    <p class="subtitle">اغلاقك لصفحة سوف يغلق البوت</p>
                </article>
                <p></p>
            </div>

            <div class="px-4 sm:px-0">

            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <!-- Profile Photo -->

                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4">
                            @if($selectedtypes != true)
                            <label class="block font-medium text-sm text-gray-700" for="name">
                                الكلمة
                            </label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="name" type="text" wire:model="word" autocomplete="name">
                            <hr>
                            @else
                                @if($selectedtypes == true)
                                    <div class="select is-danger is-focused">
                                        <select Wire:model="select_words" class="is-hovered">
                                            @foreach($re_rr as $f)

                                                <option value="{{$f->id}}"  name="select_words">{{$f->words}}</option>
                                            @endforeach

                                        </select>
                                    </div>   <br><br>
                                @endif
                            @endif

                            <label class="checkbox">
                                <input type="checkbox" wire:model="selectedtypes">
                                اختيار كلمة واصافة رد زائد
                            </label>
                            <br>

                        </div>

                        <!-- Email -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="email">
                                الرد
                            </label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="email" type="email" wire:model="reply">
                            <button class="button is-medium is-fullwidth is-danger" wire:click="add">اضافة</button>
                            <br>
                            <a class="button is-medium is-fullwidth is-primary" href="words">اظهار الكلمات كامله </a>

                        </div>

                        <!-- Api -->
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block font-medium text-sm text-gray-700" for="api">
                                Api
                            </label>
                            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="api" type="text" readonly value="{{Auth::User()->api}}">
                            <label class="checkbox">
                            <input type="checkbox" wire:model="show_log">
اظهار السجل
                            </label>
                        </div>
                        <br>
                        <div class="col-span-6 sm:col-span-4">
                            @if($show_log == true)
                                    <textarea name="" id="" cols="30" rows="10" style=" background-color: #f14668;width: 100%;color: #000;border-radius: 4px;">{{implode("\n",$log)}}</textarea>
                            @endif
                                <button class="button is-medium is-fullwidth is-primary" wire:click="Get_Msg">تشغيل</button>

                        </div>

                    </div>


                </div>


        </div>
    </div>
</main>
