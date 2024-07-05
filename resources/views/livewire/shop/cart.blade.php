<div class="container">
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$cart['products'])
                                <tr>
                                    <td colspan="3" class="table-active text-center text-muted">Your Cart is Empty</td>
                                </tr>
                            @else
                                @foreach ($cart['products'] as $product)
                                    <tr>
                                        <td>{{ $product->title }}</td>
                                        <td>Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="removeFromCart({{ $product->id }})"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                @if (!$cart['products'])
                                    <td colspan="3"><a href="{{ route('shop.index') }}"
                                            class="btn btn-primary float-right">Shop <i class="bi bi-bag-check"></i></a>
                                    </td>
                                @else
                                    <td colspan="3"><button class="btn btn-primary float-right">Checkout <i
                                                class="bi bi-bag-check"></i></button></td>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
