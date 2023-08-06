{{-- 
    <div class="title">
        <input type="checkbox"   ? $data['id'] : ''}}"
            @if (isset($data['is_done']) && $data['is_done'])
                checked
            @endif
        /> --}}
{{-- 
       
       
    </div>
</div> --}}


{{-- <div class="task {{isset($data['is_done']) && $data['is_done'] ? 'task_done' : 'task_pending'}}"> --}}
<div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
    <div class="title">
        <input type="checkbox" onchange = "taskUpdate(this)"
        {{-- <input type="checkbox" onchange = "taskUpdate(this)" data-id="{{ $data['id'] }}" --}}

        @if (isset($data['is_done']) && $data['is_done'])
        {{-- @if ($data && $data['is_done']) --}}
            checked
        @endif
        >
        <div class="task_title">{{ $data['title'] ?? '' }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div> {{$data['category']-> title ?? ''}} </div>
    </div>
    <div class="actions">
        @if (isset($data['id'])) {
            <a href="{{route('task.edit', ['id'=> ['id']])}}">
                <img src="/assets/images/icon-edit.png">
            </a>
            <a href="{{route('task.delete', ['id'=> ['id']])}}">
                <img src="/assets/images/icon-delete.png">
            </a>   
        }     
    </div>
</div>