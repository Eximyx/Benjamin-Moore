<div style="display: flex; align-items: center; justify-content: center; width: 100%">
    @if ($request === '/admin/users' && Auth()->user()->id === $value->id)
        <a href="javascript:void(0)" onClick="editMyself()" class="m-1 btn edit">
            <i class="fa fa-edit" style="color: #17a673"></i>
        </a>
        <a href="javascript:void(0);" onClick="deleteMyself()" class="m-1 delete btn">
            <i class="fa fa-trash" style="color: #e74a3b"></i>
        </a>
    @else
        <a href="javascript:void(0)" onClick="editFunc( {{$value->id}})" class="m-1 btn edit">
            <i class="fa fa-edit" style="color: #17a673"></i>
        </a>
        @if (isset($value->is_toggled))
            <a href="javascript:void(0);" onClick="toggle({{ $value->id }})" class="m-1 btn">
                <i class="fa {{ $value->is_toggled ? 'fa-square-check' : 'fa-regular fa-square' }}"
                   style="transform: scale(1.5); "></i>
            </a>
        @endif
        @if(!str_contains(request()->url(), "metadata") && !str_contains(request()->url(), "static-page"))
            <a href="javascript:void(0);" onClick="deleteFunc({{ $value->id }})" class="m-1 delete btn">
                <i class="fa fa-trash" style="color: #e74a3b"></i>
            </a>
        @endif
    @endif
</div>
