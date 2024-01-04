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
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="storage/image/{{$details['main_image']}}" class="card-img-top"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['title'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    
                    <td rowID="{{$details['quantity']}}" data-th="Total" class="text-center"><input id="quantity" type="number" min="1" value="{{$details['quantity'] }}"></td>
                    <td class="actions">
                            <a id="delete-product" class="mx-3 btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('user.catalog') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>  Вернуться к каталогу</a>
                {{-- <button id="deleteCart" class="btn btn-danger">Очистить корзину</button> --}}
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
    
    $("#delete-product").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    $("#quantity").click(function (e) {
        e.preventDefault();
        var ele = $(this);
            {
            $.ajax({
                url: '{{ route('quantity') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                    quantity: ele.parents("td").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
            }
    });
    {{--
    // $("#deleteCart").click(function (e) {
    //     e.preventDefault();
    //     var ele = $(this);
    //     if(confirm("Do you really want to clear the cart?")) {
    //         $.ajax({
    //             url: '{{ route('clear') }}',
    //             method: "DELETE",
    //             data: {
    //                 _token: '{{ csrf_token() }}', 
    //                 id: {{session()->get('cart')->id}}
    //             },
    //             success: function (response) {
    //                 window.location.reload();
    //             }
    //         });
    //     }
    // });--}}

    $("#edit-cart-info").change(function (e) {  
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });


</script>
@endsection