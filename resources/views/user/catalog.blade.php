@extends('user.layout')
@section('contents')
    <div class="row justify-content-start m-0 p-0 my-4 py-2">
        <div class="row">
            <h4 class="fw-normal">@lang('catalog.title')</h4>
            <h2 class="text-danger text-nowrap fw-medium">@lang('catalog.subTitle')</h2>
        </div>
        <div class="d-none d-lg-flex col-12 col-md-4 col-lg-3 " style="">
            <form action="javascript:void(0)" id="Form" class="Form form-horizontal" method="POST"
                  enctype="multipart/form-data">
                <label for="kind_of_work_id" class="form-label p-0">@lang('catalog.filter.kindOfWork')</label>
                <select id="kind_of_work_id" name="kind_of_work_id"
                        class="kinds form-select rounded-5 border-danger border-2" aria-label="Default select example">
                    <option id="default" value="0">@lang('catalog.filter.all')</option>
                    <option value="1">@lang('catalog.filter.internalWork')</option>
                    <option value="2">@lang('catalog.filter.externalWork')</option>
                </select>
                <label for="category_id" class="form-label p-0 fw-normal">@lang('catalog.filter.series')</label>
                <select id="category_id" name="category_id"
                        class="categories form-select rounded-5 border-danger border-2"
                        aria-label="Default select example">
                    <option selected value="0">@lang('catalog.filter.all')</option>
                    @foreach ($category as $value)
                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
                <div class="row w-100 m-0 my-2">
                    {{-- <button type="submit" class="btn btn-outline-danger">Применить фильтр</button> --}}
                    <button type="button" class="reset btn btn-danger my-2"
                            id="reset">@lang('catalog.buttons.reset')</button>
                </div>
            </form>
        </div>
        <div class="d-flex d-lg-none ">
            <button type="button" class="w-100 btn btn-outline-danger  fs-5" data-bs-toggle="modal"
                    data-bs-target="#ModalForm">
                @lang('catalog.filter.title')
            </button>
        </div>
        <div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('catalog.filter.title')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="FormModal" class="Form form-horizontal" method="POST"
                              enctype="multipart/form-data">
                            <label for="kind_of_work_id"
                                   class="form-label p-0">@lang('catalog.filter.kindOfWork')</label>
                            <select id="kind_of_work_id" name="kind_of_work_id"
                                    class="kinds form-select rounded-5 border-danger border-2"
                                    aria-label="Default select example">
                                <option selected value="0">@lang('catalog.filter.all')</option>
                                <option value="1">@lang('catalog.filter.internalWork')</option>
                                <option value="2">@lang('catalog.filter.externalWork')</option>
                            </select>
                            <label for="category_id"
                                   class="form-label p-0 fw-normal">@lang('catalog.filter.series')</label>
                            <select id="category_id" name="category_id"
                                    class="categories form-select rounded-5 border-danger border-2"
                                    aria-label="Default select example">
                                <option selected value="0">@lang('catalog.filter.all')</option>
                                @foreach ($category as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                            <div class="row w-100 m-0 my-2">
                                {{-- <button type="submit" class="btn btn-outline-danger">Применить фильтр</button> --}}
                                <button type="button" class="reset btn btn-danger my-2"
                                        id="reset">@lang('catalog.buttons.reset')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 m-0">
            <div id="searchResult" class="row">
                @include('user.search_result')

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        let kind_of_work = 0;
        const fetch_data = (array = []) => {
            setTimeout(() => {
                $.ajax({
                    type: "get",
                    url: '?' + array.join('&'),
                    success: (data) => {
                        if (change) {
                            var categories = '<option selected value="0">Все</option>';
                            for (let item of Object.entries(data[0])) {
                                item = item[1]
                                categories +=
                                    `<option value="${item['id']}">${item['title']}</option>`
                            }
                            $('.categories').html(categories);
                            change = false;
                        }
                        $("#searchResult").html(data[1]);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }, 1000);
        }

        $('body').on('click', '.pagination a', (e) => {
            e.preventDefault();
            var page = $(e.target).attr('href').split('?')[1].split('&');
            fetch_data(page)

        })
        $('.reset').on('click', function (e) {
            $(this).closest('form').find("input").each(function (i, v) {
                $(this).val("");
            });
            $('.Form').find('select').each((i, item) => {
                $(item).val(0);
            })
            fetch_data();
        })
        let change = false;
        $('.kinds').on('change', function () {
            change = true;
            $('.categories').val(0);
        })
        $('.Form').on('change', function (e) {
            e.preventDefault();
            var arr = []
            $(this).find('select').each((i, item) => {
                item = $(item);
                arr.push(`${$(item).attr('name')}=${$(item).val()}`);
            })
            fetch_data(array = arr);

        });
    </script>
@endsection
