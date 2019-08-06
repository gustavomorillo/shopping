@foreach($cartItems as $cartItem)


{{$cartItem->name}}<br>
{{$cartItem->price}}<br>
{{$cartItem->options->has('size')?$cartItem->options->size:''}}<br>






@endforeach