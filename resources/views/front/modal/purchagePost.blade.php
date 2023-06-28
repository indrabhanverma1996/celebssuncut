<div id="postamount" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">CONFIRM POST PURCHASE</h4>
         </div>
         <div class="modal-body">
            <ul class="message-friend">
            <div class="tipamountarea">
               <h5 class="modal-title">You will be charged  $10</h5>
               <label>Payment method <span>Minimum $5 USD</span></label>
               <div  data-toggle="modal" data-target="#addcard"  onclick="price">+ add new card</div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
         </div>
      </div>
   </div>
</div>
<div id="addcard" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ADD CARD</h4>
         </div>
         <div class="modal-body">
            <h2>BILLING DETAILS</h2>
            <p>We are fully compliant with Payment Card Industry Data Security Standards.</p>
            <form method="post" action="{{url('gocardlessPayment')}}">
               @csrf 
               <div class="tipamountarea">
                  <div class="row">
                     <div class="col-md-6">
                        <label>country</label>
                        <select id="country" name="country"  >
                           <option>select country</option>
                           @foreach($country as $val)
                           <!-- <img src="https://countryflagsapi.com/png/{{$val->sortname}}">  -->
                           <option value="{{$val->id}}" <?php if($val->name == $ipdat->geoplugin_countryName){ echo"selected"; }  ?>>{{$val->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-6">
                        <label>State / Province</label>
                        <select id="state" name="state">
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <label>Street</label>
                        <input type="text" name="street" placeholder="Street">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label>City</label>
                        <input type="text" placeholder="City" name="city" value="{{$ipdat->geoplugin_city}}">
                     </div>
                     <div class="col-md-6">
                        <label>ZIP / Postal Code</label>
                        <input type="text" placeholder="City" name="postal_code">
                     </div>
                  </div>
                  <h2>CARD DETAILS</h2>
                  <div class="row">
                     <div class="col-md-6"><label>Email</label><input  type="text" placeholder="Email" name="email" value="{{Auth::user()->email}}" readonly></div>
                     <!--  <div class="col-md-6"><label>Name on the card</label><input type="text" placeholder="Name on the card" name="card_name"></div>
                        <div class="col-md-12"><label>Card Number</label><input type="text" placeholder=" Card number" name="Expiration" ></div>
                        <div class="col-md-6"><label> Expiration </label><input type="text" placeholder="MM / YY" name="cvvno"></div>
                        <div class="col-md-6"><label>CVC No</label><input type="text" placeholder="CVC"></div> -->
                  </div>
                  <input type="hidden" name="postid" id="postid" value="">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="tick">
                           <input type="radio" id="huey" name="drone" value="huey"
                              checked>
                           <label for="huey">Tick here to confirm that you are at least 18 years old and the age of majority in your place of residence</label>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="tip-box" >
                           OnlyFans will make a one-time charge of $
                           <p id="htmlamount"></p>
                           when adding your payment card. The charges on your credit card statement will appear as "OnlyFans".
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-default" >Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>