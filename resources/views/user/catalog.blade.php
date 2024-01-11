@extends('user.layout', ['title' => 'Каталог'])
@section('contents')
    <div class="row justify-content-start m-0 p-0 my-4 py-2">
        <div class="row">
            <h4 class="fw-normal">Предлагаем</h1>
                <h2 class="text-danger text-nowrap fw-medium">НАШУ ПРОДУКЦИЮ</h1>
        </div>
        <form action="" enctype="">

        </form>
        <div class="col-3">
            <form action="javascript:void(0)" id="Form" name="Form" class="form-horizontal" method="POST"
                enctype="multipart/form-data">
                <label for="category_id" class="form-label p-0 fw-normal">Серия</label>
                <select id="category_id" name="category_id" class="form-select rounded-5 border-danger border-2"
                    aria-label="Default select example">
                    <option selected value="0">Все</option>
                    @foreach ($category as $value)
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
                <label for="kind_of_work_id" class="form-label p-0">Работы</label>
                <select id="kind_of_work_id" name="kind_of_work_id" class="form-select rounded-5 border-danger border-2"
                    aria-label="Default select example">
                    <option selected value="0">Все</option>
                    <option value="1">Внутренние работы</option>
                    <option value="2">Внешние работы</option>
                </select>
                <div class="row w-100 m-0 my-2">
                    <button type="submit" class="btn btn-outline-danger">Применить фильтр</button>
                    <button type="button" class="btn btn-danger my-2" id="reset">Сбросить всё</button>
                </div>
            </form>
        </div>
        <div class="clearfix col-12"></div>
        <div id="searchResult col-12 w-100">
        </div>
    </div>
    
@endsection
@section('scripts')
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
                method: "get",
                url: '{{ route('user.catalog.fetch') }}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#searchResult").html(data);
                    var oTable = $('#table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
