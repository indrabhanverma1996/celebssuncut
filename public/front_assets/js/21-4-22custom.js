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
document.getElementById("defaultOpen").click();


//
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
     }
// read file
     function readFile(input) {

    counter = input.files.length;
        for(x = 0; x<counter; x++){
            if (input.files && input.files[x]) {

                var reader = new FileReader();

                reader.onload = function (e) {
            $("#photos").append('<div class="col-md-6 col-sm-6 col-xs-6"><img src="'+e.target.result+'" class="img-thumbnail"></div>');
                };

                reader.readAsDataURL(input.files[x]);
            }
    }
    if(counter == x){$("#status").html('');}
  }


function readcoverURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
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

                reader.onload = function (e) {
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
        $("#ageverification").click( function() {
            $('#ageverificationapp').hide('#ageverification');
        });
        //trigger next modal
        $("#ageverification").click( function() {
            console.log("Hello world!");
            $('#ageverified').modal('show');
        });
        $("#closelast").on("click", function() {
            $('#ageverified').modal('hide');
        });




        //// ajax js

        