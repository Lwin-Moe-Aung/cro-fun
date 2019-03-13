<div>

    <div style="margin-top: 15px;">
        <?php $type = substr($photo, strpos($photo, ".") + 1);

         if($type=="png" || $type=="jpeg" || $type=="jpg" || $image=="Images")
             {
          ?>

            <a href="{{asset('uploads/'.$image.'/'.$photo)}}" target="_blank"><img src="{{asset('uploads/'.$image.'/'.$photo)}}" class="{{$preview_image}}" alt="" width="150" height="100"></a>


        <?php
             }

              if($type=="zip" || $pdf=="Pdf")
                 {
                     ?>
            <a href="{{asset('uploads/'.$pdf.'/'.$photo)}}" class="{{$preview_image}}" ><span id="zip">{{$photo}}</span></a>
            <?php
                 }

        ?>


	</div>


	 <!-- Start Modal Box-->
    <div class="modal fade" id="{{$modal_id}}" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">   Crowd Funding  </h4>
                </div>
                <div class="modal-body">
                    <div class="dropzone dropzone-previews" id="{{$dropzone_id}}"></div>
                    

                        <input type="hidden" name="{{$photo_value}}" id="{{$photo_value}}" value={{$photo}}>

                  
                    <div class="remark"></div>
                </div>
                <div class="modal-footer" style="text-align: center;    background-color: #EEEEEE ;">
                    <button type="button" class="btn btn-success" data-dismiss="modal" >Close</button>
                </div>
            </div>
          
        </div> 
        <!-- End Modal Box-->
    </div>
   
</div>