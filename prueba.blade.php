<?php $count = 1; ?>
								@foreach($cartItems as $cartItem)
								<input id="rowId<?php echo $count;?>" name="rowId" type="hidden" value="{{$cartItem->rowId}}">
								<input id="proId<?php echo $count;?>" name="proId" type="hidden" value="{{$cartItem->id}}">
								
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{asset('/images/'. $cartItem->options->image)}}" alt="IMG">
										</div>
										&nbsp;<a href="#" id="deleteButton<?php echo $count;?>" class="deleteBtn">Eliminar</a>
									</td>
								<td class="column-2">{{$cartItem->name}}&nbsp; talla: &nbsp;{{$cartItem->options->size}} <br>color: {{$cartItem->options->color}}</td>
									<td class="column-3">Bs. {{number_format($cartItem->price, 0, ',', '.')}}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" id="downCart<?php echo $count;?>">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$cartItem->qty}}" autocomplete="off" min="1" max="30" id="up<?php echo $count;?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" id="upCart<?php echo $count;?>">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>

								<td class="column-5"><input type="text" value="Bs. {{number_format($cartItem->subtotal, 0, ',', '.')}}" id="subtotal<?php echo $count;?>" style="text-align:right;" ></td>
								</tr>
								<?php $count++; ?>
								@endforeach