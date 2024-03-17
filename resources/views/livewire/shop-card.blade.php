<div class="col-auto mx-2 mb-5">
    <div class="card {{ $product['is_available'] ? '' : 'disabled-card' }}"
        style="max-width: 20rem; border-radius: 1rem; outline: 1.5px solid var(--green-accent);">
        <img src="{{ asset($product['img']) }}" class="card-img-top"
            style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
        <div class="card-body">
            <div class="row ">
                <div class="col d-flex justify-content-between">
                    <span class="card-title fs-5">
                        @if(isset($product['quantity']))
                            {{ $product['quantity'] }} {{ $product['name'] }}
                        @else
                            {{ $product['name'] }}
                        @endif
                        
                       </span>
                    <span class="" style="font-weight: 500; font-size:large;">£{{ $product['price'] }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button wire:click='addToCart' class="btn btn-primary {{ $product['is_available'] ? '' : 'disabled'}} w-50">Add to Cart</button>
                </div>
            </div>
        </div>
        @if (!$product['is_available'])
        <div class="coming-soon">
            @if(isset($product['unavailable_message']))
                {{ $product['unavailable_message'] }}
            @else
                Coming Soon
            @endif
        </div>
        
        @endif
    </div>
</div>