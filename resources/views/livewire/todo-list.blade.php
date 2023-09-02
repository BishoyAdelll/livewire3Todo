<div>
<div class="container content py-6 mx-auto">
        @if(session('error'))
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">Be Warned</p>
        <p>{{session("error")}}</p>
        </div>
        @endif
            <div class="mx-auto">
                <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
                    <div class="flex ">
                        <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
                    </div>
                    <div>
                        @include('livewire.includes.create-todo-box')
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.includes.search-box')
        <div id="todos-list">
           @foreach($todos as $todo)
           @include('livewire.includes.todo-card')
           @endforeach

            <div class="my-2">
                {{$todos->links()}}
            </div>
        </div>
</div>
