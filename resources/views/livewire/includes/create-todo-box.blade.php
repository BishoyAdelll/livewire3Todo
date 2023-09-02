<form>
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
            Todo </label>
        <input wire:model="name" type="text" id="title" placeholder="Todo.." class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

       @error('name')
        <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
        @enderror
    </div>
    <button wire:click.prevent="create" type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
        +</button>
    @if(session('message'))
    <span class="text-green-500 text-xs">{{session('message')}}</span>

    @endif
</form>