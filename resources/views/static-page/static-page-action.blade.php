<div class="align-items-center">
    <a href="javascript:void(0)" onClick="editFunc({{ $id }})" class="m-1 btn btn-success edit">
        <i class="fa fa-edit"></i>
    </a>
    <a href="javascript:void(0);" onClick="toggle({{ $id }})" class="m-1 btn btn-primary">
        <i class="fa {{$is_toggled ? "fa-check-square" : "fa-square"}}" style="transform: scale(1.5)"></i>
    </a>
    <a href="javascript:void(0);" onClick="deleteFunc({{ $id }})"
        class="m-1 delete btn btn-danger">
        <i class="fa fa-trash"></i>
    </a>
</div>
