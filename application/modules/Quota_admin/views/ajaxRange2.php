<div class="row">
<div class="col-xs-6">
  <input id='ex2' name='ambil_quota' type='text' class='form-control' onkeyup='this.value = minmax(this.value, 0, 0)' maxlength="0">
</div>
<div class="col-xs-6">
  <h4><b>Rp. 0</b></h4>
</div>
</div>
<script type="text/javascript">
//setting slider range
function minmax(value, min, max)
{
    if(parseInt(value) < min || isNaN(value))
        return 0;
    else if(parseInt(value) > max)
        return 0;
    else return value;
}
$('#ex2').keyup(function () {
  function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.\t'+e(d)+''}
  rp = toRp($(this).val());
  $('#dt_quota').text(rp);
});


</script>
