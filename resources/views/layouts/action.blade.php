<div class="align-items-center">
    @if (Auth()->user()->id !== $id)
    <a href="javascript:void(0)" onClick="editFunc({{ $id }})" class="m-1 btn btn-success edit">
        <i class="fa fa-edit"></i>
    </a>
    @if (isset($is_toggled))
        <a href="javascript:void(0);" onClick="toggle({{ $id }})" class="m-1 btn btn-primary">
            <i class="fa {{ $is_toggled ? 'fa-check-square' : 'fa-square' }}" style="transform: scale(1.5)"></i>
        </a>
    @endif
    <a href="javascript:void(0);" onClick="deleteFunc({{ $id }})" class="m-1 delete btn btn-danger">
        <i class="fa fa-trash"></i>
    </a>
    @else
    <a href="javascript:void(0)" onClick="" class="m-1 btn btn-success edit disabled">
        <i class="fa fa-edit"></i>
    </a>
    <a href="javascript:void(0);" onClick="" class="m-1 delete btn btn-danger disabled">
        <i class="fa fa-trash"></i>
    </a>
    @endif

</div>
