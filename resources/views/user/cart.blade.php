@extends('user.layout', ['title' => 'Главная'])
@section('contents')
    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="storage/image/{{ $details['main_image'] }}"
                                        class="card-img-top" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['title'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>

                        <td data-th="Total" class="text-center">
                            <div class="border rounded-4 boder-2 border-black-50 m-0 p-0" style="min-width: 100px">
                                <input type="button" id="product-minus" value="-" class="p-0 m-0 border-0"><input
                                    id="quantity" type="text" min="1"
                                    class="p-0 m-0 number w-auto border-0 text-center quantity" size="1"
                                    value="{{ $details['quantity'] }}"><input type="button" id="product-plus"
                                    value="+" class="border-0 p-0 m-0">
                            </div>
                        </td>
                        <td class="actions" style="min-width:100px">
                            <a id="delete-product" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a id="save-product" class="mx-2 btn btn-outline-success btn-sm"> <i
                                    class="fa fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ route('user.catalog') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Вернуться
                        к каталогу</a>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#delete-product").click(function(e) {
            console.log("dsdsdsd");
            e.preventDefault();
            var ele = $(this);
            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
        $('#product-plus').click(function(e) {
            e.preventDefault();
            var ele = $(this);
            var quantity = ele.parents().children('input#quantity');
            var value = parseInt(quantity.val()) + 1;
            quantity.val(value)
        })
        $('#product-minus').click(function(e) {
            e.preventDefault();
            var ele = $(this);
            var quantity = ele.parents().children('input#quantity');
            var value = parseInt(quantity.val()) - 1;
            quantity.val(value)
        })

        $("#save-product").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            console.log($(this));
            console.log()
            $.ajax({
                url: '{{ route('change.count') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                    quantity: ele.parents('tr').children('.text-center').children('div').children(
                        'input#quantity').val()
                },
                success: function(response) {
                    console.log(response)
                }
            });
        });

        $("#edit-cart-info").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $('.number').on('input', function() {
            $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё.,]/, ''))
        });
    </script>
@endsection
