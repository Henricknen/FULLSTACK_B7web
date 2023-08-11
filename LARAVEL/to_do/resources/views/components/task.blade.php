

<div class="task">
    
    <div class="title">
        <input type="checkbox" {{-- data-id="{{ $data['id'] }}" --}}
            @if ($data && $data['done'])
                checked
            @endif
        >
        <div class="task_title">{{ $data['title'] ?? '' }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div> {{$data['category'] ?? ''}} </div>
    </div>
    <div class="actions">
        <a href="{{ $data['edit_url'] ?? '' }}">
        {{-- <a href="#"> --}}
            <img src="/assets/images/icon-edit.png">
        </a>
        <a href="{{ $data['delete_url'] ?? '' }}">
        {{-- <a href ="#"> --}}
            <img src="/assets/images/icon-delete.png">
        </a>    
    </div>
</div>

{{-- <div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}"> --}
    
    <div class="title">
        <input type="checkbox" onchange = "taskUpdate(this)" {{-- data-id="{{ $data['id'] }}" --}

        @if ($data && $data['is_done'])
            checked
        @endif
        >
        <div class="task_title">{{ $data['title'] ?? '' }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div> {{$data['category'] ?? ''}} </div>
    </div>
    <div class="actions">
        @if (isset($data['id']))
        <a href="{{ route('task.edit', ['id' => $data['id']]) }}">
            <img src="/assets/images/icon-edit.png">
        </a>
        <a href="{{ route('task.delete', ['id' => $data['id']]) }}">
            <img src="/assets/images/icon-delete.png">
        </a>
    @endif
    
    </div>
 </div> --}}

