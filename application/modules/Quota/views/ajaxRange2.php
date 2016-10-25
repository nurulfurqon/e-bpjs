  <b>Rp. 0</b> &nbsp;&nbsp;&nbsp;<input id='ex2' type='text' class='angka3' value='' data-slider-min='0' data-slider-max='0' data-slider-step='0' data-slider-value='0' style='width:310px;'/>&nbsp;&nbsp;&nbsp; <b>Rp. 0</b>
  <script type="text/javascript">
  //setting slider range
  var x;
  var rp;
  var ct;
  // With JQuery
  $("#ex2").slider({
    formatter:function(value){
    function toDuit(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.\t'+e(d)+''}
    duit = toDuit(value);
    return duit;
  }
  });
  $("#ex2").on("slide", function(slideEvt) {
  x = (slideEvt.value);
  function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.\t'+e(d)+''}
  rp = toRp(x);
  $("#ex2SliderVal").text(rp);
  //ct = document.getElementById("ex2").innerHTML;;
  //ct.setAttribute("name", "fuck you");

  });
  </script>
