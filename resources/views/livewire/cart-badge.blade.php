<div>
    {{-- Cart --}}
    
    <div class="d-flex navbar-nav">

        {{-- Show cart is there are any items --}}
        @if (isset($cart_items) && $cart_items > 0)
            <li class="nav-item me-3">
                <a class="nav-link" href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping fa-fw">
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger py-1 px-2"
                            style="margin-top: -5px; margin-left: 3px; font-size: 10px;">
                            {{ $cart_items }}
                        </span>
                    </i> Cart
                </a>
            </li>
        @endif


        {{--------------------- DEV - EDIT CART ---------------------}}
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                DEV
            </a>
            <ul class="dropdown-menu">
                <li><a wire:click='addItem("item1")' class="dropdown-item" href="#">Add item</a></li>
                <li><a wire:click='removeItem("item1")' class="dropdown-item" href="#">Remove item</a></li>
                <li><a wire:click='getAllItems' class="dropdown-item" href="#">Get all</a></li>
                <li><a wire:click='clearCart' class="dropdown-item" href="#">Clear</a></li>
            </ul>
        </li> --}}
    </div>
</div>