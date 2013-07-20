

<?php echo $this->element('ads/ad-edit-form');?>

<style type="text/css">
<?php /*
/	ADS EDIT FORM		/


.ads-add fieldset{
	width: 257px;
	border: 1px solid #dedede;
	font-size: .8em;
	color: #777;
	padding: 0 15px;
}	
input#AdTags{
	font-size: 16px;
	width: 253px;
	margin: 10px 0; 	
}

input[type="submit"]{
	padding: 3px 15px;	
}	
	*/?>
/**		ERROR Mesages		*/
ol.description{
	margin-top: 1em;	
	margin-left: 7px;
	color: №444;
	font-size: 0.8em;	
}
ol.description li{
	margin-bottom: 1em;	
}	
.description span{
	color: #777;
	font-size: 0.9em;	
}
.description span a{
	color: #999;
	font-weight: bold;		
}
.description span a:hover{
	text-decoration: none;
}	
h3.error{
	margin: 0;
	padding: 0;
	height: 60px;	
}
.error-message {
	border: 1px dashed red;
	color: #FF2233;
	font-size: 0.8em;
	left: 350px;
	padding: 5px;
	position: absolute;
	top: 300px;
	width: 260px;
}
.text-error, .tags-error{
	color: red;
	font-size: .8em;
}	
.ads-add .text-error{
	height: 200px;
	margin-top: 35px;
}
.ads-add .tags-error{
	
}
div.submit{
	float: right;
	margin-right: 10px;
}
input.error, select.error, textarea.error{
	background-color: #fee;
	border: 1px solid #faa;	
}	

</style>
