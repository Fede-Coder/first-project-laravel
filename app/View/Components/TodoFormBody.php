<?php

namespace App\View\Components;

use App\Models\Todo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TodoFormBody extends Component
{
    public ?Todo $todo;
    /**
     * Create a new component instance.
     *
     * @param Todo|null $todo
     * @return void
     */
    public function __construct(Todo $todo=null)
    {
        if (is_null($todo)) {
            $todo = Todo::make([]);
        }
        $this->todo = $todo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render(): View|Closure|string
    {
        $params = [
            'todo' => $this->todo,
        ];
        return view('components.todo-form-body', $params);
    }
}
