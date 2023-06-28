
@extends('layouts.appFront')

@section('content')

<div class="creat_post">
  <form action="{{url('/Realvideo')}}"  method="post" enctype="multipart/form-data">
    @csrf
<img id="img-preview" >
   <div class="frame-post">
       <div class="storyadd">
       <div class="file storyadd">
      
      <div>
        
  <input type="file" id="choose-file" name="realvideo"  onchange="statusvideos(this);" accept=".png, .jpg, .jpeg,.mp4" />
        <label for="choose-file">Choose File</label>
      </div>
    
        </div>
        
        </div>
       
   </div>
   <button type="submit" class="btn btn-primary">share to story</button>
   </form>
</div>
<style>
    .modal-backdrop.fade.in {
    display: none;
}
#img-preview {
  display: none;
  width: 155px;
  border: 2px dashed #333;  
  margin-bottom: 20px;
}
#img-preview img {
  width: 100%;
  height: auto;
  display: block;
}
[type="file"] {
  height: 0;  
  width: 0;
  overflow: hidden;
}
[type="file"] + label {
  font-family: sans-serif;
  background: #f44336;
  padding: 10px 30px;
  border: 2px solid #f44336;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s;
}
[type="file"] + label:hover {
  background-color: #fff;
  color: #f44336;
}
    </style>


@endsection

<script>



</script>    