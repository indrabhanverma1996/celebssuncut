$('.ae-select-content').text($('.dropdown-menu > li.selected').text());
var newOptions = $('.dropdown-menu > li');
newOptions.click(function() {
    $('.ae-select-content').text($(this).text());
    $('.dropdown-menu > li').removeClass('selected');
    $(this).addClass('selected');
});

var aeDropdown = $('.ae-dropdown');
aeDropdown.click(function() {
    $('.dropdown-menu').toggleClass('ae-hide');
});

//
function opentab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();


//
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function documentphoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgs')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function statusvideos(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#statusvideo')
                .attr('src', e.target.result)
                .width(300)
                .height(400);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// read file
function readFile(input) {

    counter = input.files.length;
    for (x = 0; x < counter; x++) {
        if (input.files && input.files[x]) {

            var reader = new FileReader();

            reader.onload = function(e) {
          
          var  result = e.target.result.substring(5, 10);
           
          if(e.target.result.substring(5, 10) =='image'){
              
         $("#photos").append('<div class="col-md-6 col-sm-6 col-xs-6"><span id="removeclose" onclick="removeclose()"><i class="fa fa-close picremove" id="cros"></i></span><div id="ts" class="onclickremove"><img src="' + e.target.result + '" class="img-thumbnail" id="img"></div></div>');
          }else{
$("#photos").append('<div class="col-md-6 col-sm-6 col-xs-6"><span id="removeclose" onclick="removeclose()"><i class="fa fa-close picremove" id="cros"></i></span><div id="ts" class="onclickremove"><video loop autoplay muted controls class="float-right w-100 " id="img"><source src="' + e.target.result + '" type="video/mp4 "></video></div></div>');

          }
                
            };

            reader.readAsDataURL(input.files[x]);
        }
    }
    if (counter == x) { $("#status").html(''); }
}

function removeclose(){
 document.getElementById('img').remove();
 document.getElementById('cros').remove();
}


function readcoverURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah1')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readpostImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#post-image')
                .attr('src', e.target.result)
                .width(400)
                .height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}





$(document).ready(function() {

    $('#example').dataTable({
        "sDom": '<lf<t>ip>',
        "bScrollInfinite": false,
        "bScrollCollapse": false,
        "sScrollY": "150px"
    });
    var dataTableObj = $('#example').DataTable();
    $('#customSearch').on('keyup change', function() {
        dataTableObj.column(1).search(this.value).draw();
    });


    $(document).on('click', '#example tbody tr', function() {
        alert($(this).html());
        var dataTable = $('#example').dataTable();
        dataTable.fnDeleteRow($(this).get(0));
    });

    var table = $('#example').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup(function() {

        table.draw();
    });



});


$(window).load(function() {
    $('#myModal').modal('show');
});
$(".close").click(function() {
    $('.vip-members').modal('hide');
});
$("#ageverification").click(function() {
    $('#ageverificationapp').hide('#ageverification');
});
//trigger next modal
$("#ageverification").click(function() {
    console.log("Hello world!");
    $('#ageverified').modal('show');
});
$("#closelast").on("click", function() {
    $('#ageverified').modal('hide');
});

// message



 function search_func(value)
{
  
  var search = $("#search-field").val();

    $.ajax({
       type: "GET",
       url: "/celebs/search-user",
       data: {'search_keyword' : search},
       dataType: "JSON",
       success: function(data){
      var base_url = window.location.origin; 
    
      if(data==0){
           $(".tab-content").append('<div class="img-name"><figure class="avatar me-3"> No result found</div>');

       }else{
           if(data.value==''){
              $(".tab-content").hide(); 
           }else{
            $(".tab-content").append('<div class="img-name"><figure class="avatar me-3"><img src="'+ base_url +'/celebs/public/front_assets/images/default-profile-pic-e1513291410505.jpg" alt="image" class="shadow-sm rounded-circle w35"></figure><h4 class="fw-700 text-grey-900 font-xssss mt-1">'+data.name+' <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">'+data.username+'</span></h4></div></div>');
   
           }

      
       }}
    });
}

function dddd() {
   
  var cat = document.getElementById("postcategory").value;


     if(cat==1){
       $("#postamountddd").hide();
      

            }else{
          $("#postamountddd").show();
            }
}


