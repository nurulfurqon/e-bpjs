
<b>Rp. 50.000</b> &nbsp;&nbsp;&nbsp;<input id='ex2' type='text' name="ambil_quota" class='angka3' value='<?php echo set_value('ambil_quota') ?>' data-slider-min='50000' data-slider-max='<?php echo $ambil->quota_pegawai ?>' data-slider-step='50000' data-slider-value='50000' style='width:300px;'/>&nbsp;&nbsp;&nbsp; <b>Rp.<?php echo number_format($ambil->quota_pegawai,0,',','.')?></b>
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
