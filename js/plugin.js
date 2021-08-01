 var selectedCourseId =0;
 var selectedSessionId =0;
$(function () {

// start courses script
$('.alert').hide();

$(".courseItem").hover(function(){
  $(this).find('.badge').addClass("badge-warning text-primary").removeClass("badge-dark text-light");
  }, function(){
  $(this).find('.badge').addClass("badge-dark text-light").removeClass("badge-warning text-primary");
});


$('#addSession').on('click',addSession);
$('#updateSession').on('click',updateSession);
$('#deleteSession').on('click',deleteSession);

// var $courseContent=["Intro. to ","How to Program in ","Design in "];
// $('.courseItem').on('click', function(event){
//     event.preventDefault();
//     $html='<div id="list-detail" class="list-group">';
//     $name=$(this).attr("course");
//     for($i=0; $i<3; $i++)
//     {
//       $html+='<a href="#" class="list-group-item list-group-item-action">'+$courseContent[$i]+$name+'</a>';
//     }
//     $html+="</div>";
//     $('#list-detail').replaceWith($html);
//     console.log(event.currentTarget);
// });

// AJAX techenique
$('.courseItem').on('click', function(event){
  $('.main-cont .session-card').show();
  var courseId = $(this).attr("courseId");
  selectedCourseId = courseId;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if(this.readyState==4 && this.status == 200){
          // console.log("status="+this.status+" readyState="+this.readyState);
          $('#list-detail').replaceWith(""+this.responseText);
          // console.log(this.responseText);

          $('#list-detail .list-group-item').on('click',function (event){
           $('#session-title').val($(this).text());
           $('#session-rank').val($(this).attr('rank'));
           selectedSessionId = $(this).attr('sessionId');
          });
      }
    }

  xhttp.open("GET","./courseContent.php?courseId="+courseId,true);
  xhttp.send();
  $('.alert').hide(200);
  });
// end courses script

});

function linkSessionWithAction() {
  $('#list-detail .list-group-item').on('click',function (event){
    console.log($(this));
           $('#session-title').val($(this).text());
           $('#session-rank').val($(this).attr('rank'));
           selectedSessionId = $(this).attr('sessionId');
          });
}

function addSession() {
  var title = $('#session-title').val();
  var rank = $('#session-rank').val();

  if(!(title.length > 0 & rank.length > 0))
  {
    $('.alert').html("Please check session info fields <strong>Title/Rank Couldn't be empty</strong> !").slideDown(200);
    return; 
  }
   $('.alert').hide();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if(this.readyState==4 && this.status == 200){
          $('#list-detail').replaceWith(""+this.responseText);
          linkSessionWithAction();
      }
    }

  xhttp.open("POST","./manageSession.php?"+'title='+title+'&rank='+rank+'&courseId='+selectedCourseId,true);
  xhttp.send();
  }


function updateSession() {
  var title = $('#session-title').val();
  var rank = $('#session-rank').val();

  if(!(selectedSessionId > 0))
  {
    $('.alert').html("Please select a session ").slideDown(200);
    return; 
  }
  if(!(title.length > 0 & rank.length > 0))
  {
    $('.alert').html("Please check session info fields <strong>Title/Rank Couldn't be empty</strong> !").slideDown(200);
    return; 
  }
  $('.alert').hide();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if(this.readyState==4 && this.status == 200){
          $('#list-detail').replaceWith(""+this.responseText);
          linkSessionWithAction();
      }
    }

  xhttp.open("POST","./manageSession.php?"+'title='+title+'&rank='+rank+'&courseId='+selectedCourseId+'&sessionId='+selectedSessionId,true);
  xhttp.send();
  }

function deleteSession() {
  var title = $('#session-title').val();

  if(!(selectedSessionId > 0))
  {
    $('.alert').text("Select a session please!").slideDown(200);
    return; 
  }
  $('.alert').hide();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if(this.readyState==4 && this.status == 200){
          $('#list-detail').replaceWith(""+this.responseText);
          linkSessionWithAction();
          $('#session-title').val("");
          $('#session-rank').val("");
      }
    }

  xhttp.open("POST","./manageSession.php?"+'deleteFlag=1&sessionId='+selectedSessionId+'&courseId='+selectedCourseId,true);
  xhttp.send();
  }