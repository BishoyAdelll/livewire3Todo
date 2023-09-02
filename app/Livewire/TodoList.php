<?php

namespace App\Livewire;
use Livewire\Attributes\Rule; 
use App\Models\Todo;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    #[Rule('required|min:3|max:15')]
    public $name;
    public $search;
    public $todoId;
    public $editingTodoId;
    #[Rule('required|min:3|max:15')]
    public $editingTodoName;

    public function create(){
       $validated=$this->validateOnly('name');
       Todo::create($validated);
       $this->reset();
       session()->flash('message','Created');
       $this->resetPage();
    }
    public function delete($todoId){
        try {
            Todo::findOrFail($todoId)->delete();
        } catch (Exception $e) {
            session()->flash('error','failed To Delete this record ');
            return;
        }
       
    }
    public function toggle($todoId){
        $todo=Todo::find($todoId);
        $todo->completed=!$todo->completed;
        $todo->save();
        // $todo->completed =!$todo->completed;
        // $todo->save();
    }
    public function edit($todoId){
        $this->editingTodoId=$todoId;
        $this->editingTodoName=Todo::find($todoId)->name;
    }
    public function cancel(){
        $this->reset('editingTodoId','editingTodoName');
    }
    public function updateTodo(){
        $this->validateOnly('editingTodoName');
       Todo::find( $this->editingTodoId)->update([
            'name'=>$this->editingTodoName,
        ]);
        $this->cancel();
    }
    public function render()
    {
        return view('livewire.todo-list',[
            'todos'=>Todo::latest()->where('name','LIKE',"%{$this->search}%")->paginate(3)
        ]);
    }
}
