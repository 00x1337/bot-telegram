<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' لوحة التحكم بالرد') }}
        </h2>
    </x-slot>
    <br>
    <main>
        <div class="features">
            <div class="container">
                <div class="box" style="width: 100%;">
                    <div class="field">
                        <form action="{{ route('edit') }}" method="post">
                            @csrf
                            <label>
                            الكلمة
                            <br>
                            <input class="input" type="text" name="word" value="{{$all->words}}">
                        </label>
                        <label>
                            الرد
                                                            @if(strpos($all->reply,'{}'))
                                                                @foreach(explode('{}',$all->reply) as $replys)
                                                                    <input class="input"  type="text" name="reply[]"  value="{{$replys}}">

                                                                @endforeach
                                                            @else
                                                                <input class="input"  type="text"  value="{{$all->reply}}">
                                                            @endif
                        </label>
                            <input class="button is-link"  type="submit"  value="hh">

                        </form>
                    </div>
                </div></div></div>
    </main>
</x-app-layout>
