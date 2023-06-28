
        
          @if($account=='username')<tr>
                        <td>
                          <a href="#username"><input type="text" class="form-control" name="" value="{{Auth::user()->nickname}}" placeholder="username"> 
                        </td>
                    </tr>
                    @elseif($account=='email')<tr>
                        <td>
                          <a href="#username"><input type="text" class="form-control" name="" value="{{Auth::user()->email}}" placeholder="email" readonly> 
                        </td>
                    </tr>
                   
                 @elseif($account=='phoneno')
                      
                          <a href="#"><input type="text" class="form-control" name="phoneno" value="" placeholder="Phone no">                       
                    
             @elseif($account=='password')
              <div class="row">
                     <div class="col-md-4" >

                    <div class="alert alert-success" id="mssag" role="alert">
                          
                        </div ></div>
                        </div>
             <tr><td class="account-pass">
             <h3> Security</h3>
                           <div class="form-group row">
                            <label for="password" class="col-md-4">New Password</label>
  
                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control" name="cpassword" autocomplete="cpassword">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
                        
                         
                          </div>  
                           <button type="button" onclick="changePassword()" onclick=""class="btn btn-primary">save</button>                  
</td>
</tr>
               @endif

                       

