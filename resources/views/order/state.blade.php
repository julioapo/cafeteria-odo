@if ($shoppingcartCount)
    <span id='spanItemsCar' class="badge badge-ligth">Su Pedido {{ $shoppingcartCount }}</span>
@else
    <span id='spanItemsCar' class="badge badge-ligth">Su Pedido  0</span>
@endif