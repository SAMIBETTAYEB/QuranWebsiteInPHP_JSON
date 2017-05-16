<?php
session_start();
$jsons_url = "http://mp3quran.net/api/_english_sura.json";
$jsons=file_get_contents($jsons_url);
$jsons=preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$jsons);
$json_s=json_decode($jsons);
//echo $json_s==null?"null":"Not null";
//print_r(get_object_vars($json_s));
//echo $json_s->Suras_Name[0]->name;
//echo json_last_error();
for($a=0;$a<count($json_s->Suras_Name);$a+=2) { if($a<10) $extra="00"; elseif($a<100) $extra="0"; else $extra="";
if($a+1<10) $extra1="00"; elseif($a+1<100) $extra1="0"; else $extra1="";  ?><div class='container-fluid'><div class='row'>
<div class='col-md-6 col-xs-12'><div class="soura"><?php echo " ".$json_s->Suras_Name[$a]->name."<div style='direction:ltr; float:left;'><span style='font-weight:bold; color:#000000;'>".$extra.$json_s->Suras_Name[$a]->id."</span> - </div>"; ?><div class="pull-right"><img class="download" data-id="<?php echo $json_s->Suras_Name[$a]->id; ?>" src="dist/img/download.png"> | <img  class="listen" data-id="<?php echo $_POST['s'].'/'.$extra.$json_s->Suras_Name[$a]->id.'.mp3'; ?>" src="dist/img/listen.png"></div></div></div>
<div class='col-md-6 col-xs-12'><div class="soura"><?php echo $json_s->Suras_Name[$a+1]->name."<div style='direction:ltr; float:left;'><span style='font-weight:bold; color:#000000;'>".$extra1.$json_s->Suras_Name[$a+1]->id."</span> - </div>"; ?><div class="pull-right"><img class="download" data-id="<?php echo $json_s->Suras_Name[$a+1]->id; ?>" src="dist/img/download.png"> | <img class="listen" data-id="<?php echo $_POST['s'].'/'.$extra1.$json_s->Suras_Name[$a+1]->id.'.mp3'; ?>" src="dist/img/listen.png"></div></div></div></div></div><?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	$(".listen").click(function(){
		var thisl=$(this);
		$("#audio_container").html("<li style='position:fixed;bottom:0;left:0; width:100%; background-color:#FFFFFF; padding:5px;'><audio style='width:100%;' controls='' autoplay='' name='media'><source id='player' src='"+thisl.attr("data-id")+"' type='audio/mpeg'></audio></li>");
		//$("#player").attr("src",thisl.attr("data-id"));//.attr("src",($(this).attr("data-id")+"\n"));
	});
});
</script>