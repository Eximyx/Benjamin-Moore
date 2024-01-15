<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('../layouts.scripts')
    @include('user.style')
</head>

<body>
    <div class="container p-2">
        @include('user.navbar')
        @yield('contents')

        <div class="d-flex ">
            <button type="button" class="w-100 btn btn-outline-danger  fs-5" data-bs-toggle="modal"
                data-bs-target="#LeadsForm">
                Фильтр
            </button>
        </div>
        <div class="m-0 p-0 row">
            @include('user.footer')
        </div>
    </div>

    <div class="modal fade" id="LeadsForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="javascript:void(0)" id="Form" name="Form" method="POST"
                        class="form-horizontal" enctype="multipart/form-data">
                        <h3 class="fw-normal fs-3">Оставьте заявку</h3>
                        <h2 class="text-wrap fw-normal fs-5 mb-2">Мы свяжемся с вами в течении 5 минут</h2>
                        <input type="hidden" name="id" id="id">

                        <div class="col-12 justify-content-between align-items-center">
                            <label class="form-label p-0">Имя</label>
                            <input type="text" class="form-control rounded-5 border-danger border-2" id="name"
                                name="name" placeholder="Имя">
                        </div>
                        <div class="col-12 justify-content-between align-items-center">
                            <label class="form-label p-0">Email</label>
                            <input type="email" class="form-control rounded-5 border-danger border-2" id="contactInfo"
                                name="contactInfo" placeholder="Email">
                        </div>
                        <div class="col-12 justify-content-between align-items-center">
                            <label for="exampleFormControlTextarea1" class="form-label p-0">Сообщение</label>
                            <textarea class="form-control rounded-4 border-danger border-2" id="message" name="message" rows="6"
                                placeholder="Текст сообщения"></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit"
                                class="w-auto px-5 btn btn-danger text-center rounded-4 fs-4">Заказать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $('#Form').submit(function(e) {

        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: '{{ route('leads') }}',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                var oTable = $('#table').dataTable();
                oTable.fnDraw(false);
            },
            error: function(data) {
                // #('')
                console.log(data);
            }
        });
    });
</script>
@yield('scripts')

</html>
