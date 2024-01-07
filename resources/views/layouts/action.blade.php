<div class="align-items-center">
    @if ($request === '/admin/users' && Auth()->user()->id === $value->id)
        <a href="javascript:void(0)" onClick="" class="m-1 btn btn-success edit disabled">
            <i class="fa fa-edit"></i>
        </a>

        <a href="javascript:void(0);" onClick="" class="m-1 delete btn btn-danger disabled">
            <i class="fa fa-trash"></i>
        </a>
    @else
        <a href="javascript:void(0)" onClick="editFunc({{ $value->id }})" class="m-1 btn btn-success edit">
            <i class="fa fa-edit"></i>
        </a>

        @if (isset($value->is_toggled))
            <a href="javascript:void(0);" onClick="toggle({{ $value->id }})" class="m-1 btn btn-primary">
                <i class="fa {{ $value->is_toggled ? 'fa-check-square' : 'fa-square' }}"
                    style="transform: scale(1.5)"></i>
            </a>
        @endif

        <a href="javascript:void(0);" onClick="deleteFunc({{ $value->id }})" class="m-1 delete btn btn-danger">
            <i class="fa fa-trash"></i>
        </a>
    @endif

</div>
