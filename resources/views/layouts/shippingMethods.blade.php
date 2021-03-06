<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                     
  <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
      @if (session('coupon'))
      <div class="alert alert-success" role="alert">
          {{ session('coupon') }}
      </div>
  @endif
  
    <h4 class="mtext-109 cl2 p-b-30">
       
      Totales
    </h4>

    <div class="flex-w flex-t bor12 p-b-13">
      <div class="size-208">
        <span class="stext-110 cl2">
          Subtotal:
        </span>
      </div>
      {{-- Bs. {{number_format(((int)(Cart::subtotal())*1000), 0, ',', '.')}} --}}
      <div class="size-209">
        <span class="mtext-110 cl2">
        <input type="text" id="subtotal" value="Bs. {{Cart::subtotal(0,',','.')}}">
        </span>
      </div>
    </div>

    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
      <div class="size-208 w-full-ssm">
        <span class="stext-110 cl2">
          Envio:
        </span>
      </div>

      <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
        <p class="mtext-110 cl2">
          MRW ó Domesa 
          {{-- There are no shipping methods available. Please double check your address, or contact us if you need any help. --}}
        </p>
        <br>

        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
            <p class="mtext-110 cl2">
              Bs. {{number_format($mrwPrice, 0, ',', '.')}}
              {{-- There are no shipping methods available. Please double check your address, or contact us if you need any help. --}}
            </p>
          </div>
        
        {{-- <div class="p-t-15">
          <span class="stext-112 cl8">
            Calculate Shipping
          </span>

          <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
            <select class="js-select2" name="time">
              <option>Select a country...</option>
              <option>USA</option>
              <option>UK</option>
            </select>
            <div class="dropDownSelect2"></div>
          </div>

          <div class="bor8 bg0 m-b-12">
            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="statex" placeholder="State /  country">
          </div>

          <div class="bor8 bg0 m-b-22">
            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
          </div>
          
          <div class="flex-w">
            <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
              Update Totals
            </div>
          </div>
            
        </div> --}}
      </div>
    </div>

    <div class="flex-w flex-t p-t-27 p-b-33">
      <div class="size-208">
        <span class="mtext-101 cl2">
          Total:
        </span>
      </div>

      <div class="size-209 p-t-1">
        <span class="mtext-110 cl2" >
        <input type="text" value="Bs. {{number_format((Cart::total(0,'','')+$mrwPrice), 0, ',', '.')}}" id="total">	
        </span>
      </div>
      <div class="flex-w flex-t p-t-27 p-b-33">
          <div class="size-208">
            <span class="mtext-101 cl2">
              Total en $:
            </span>
          </div>

          <div class="size-209 p-t-1">
            <span class="mtext-110 cl2" >
            <input type="text" value="$ {{number_format((Cart::total(0,'','')+$mrwPrice)/$dollarPrice, 2, ',', '.')}}" id="totalDollar">	
            </span>
          </div>
        </div>
        
        <div class="size-209 p-t-1">
            <span class="mtext-110 cl2" >
            <input type="text" value="1 $ = {{number_format(($dollarPrice), 2, ',', '.')}}" id="total">	
            </span>
          </div>
          
    </div>
  

      <?php if(!request()->is('product/payment')){
				echo '<a href="product/shippingProducts"><button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
      Continuar
    </button></a>';
			} else {  

        echo '<a href="/reportPayment"><button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
      Reportar Pago
    </button></a>';

      } ?> 
		
    
    
  </a>	
  </div>
</div>