<?php

namespace ProcessWire;

?>

<style>
.FormBuilderErrors {
    display: none;
}
.Inputfields {
    width: 74%;
    height: 160px;
}
div#wrap_Inputfield_con_name {
    width: 30%;
    height: 40%;
    padding-left: 30px;
    float:left;
}
div#wrap_Inputfield_con_email {
    width: 35%;
    height: 40%;
    float: left;
}
div#wrap_Inputfield_checkbox {
    width: 30%;
    height: 40%;
    float: left;
}
div#wrap_Inputfield_con_societe {
    width: 30%;
    height: 40%;
    float: left;
    padding-left:30px
}
div#wrap_Inputfield_con_tel {
    width: 35%;
    height: 40%;
    float:left
}
button {
    background-color: #cfc6c6;
    width: 150px;
    height: 30px;
    border-radius: 5px;
    color: #bf1717;
    margin: 20px;
}
input#Inputfield_con_name {
    width: 180px;
    height: 30px;
    border-radius: 5px;
}
input#Inputfield_con_email {
    width: 180px;
    height: 30px;
    border-radius: 5px;
    margin-left: 10px;
}
input#Inputfield_con_societe {
    width: 180px;
    height: 30px;
    border-radius: 5px;
}
input#Inputfield_con_tel {
    width: 180px;
    height: 30px;
    border-radius: 5px;
    margin-left: 10px;
}
label.InputfieldHeader {
    margin-left: 5px;
}
span:first-child {
    display: none;
}
span.pw-no-select {
    font-size: 15px;
}
input#Inputfield_checkbox {
    width: 30;
    height: 20;
    margin-top: 30px;
}
span.uk-text-middle.uk-text-uppercase {
    display: contents;
}
</style>
<div id="content-body" pw-append>
	<div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-3@m" uk-grid uk-lightbox>
		<?php foreach ($page->lightbox_images as $key => $item) {
?>
			<div>
				<a href="<?= $item->url ?>">
					<div class="uk-cover-container">
						<canvas width="320" height="200"></canvas>
						<img src="<?= $item->size(0,260)->url ?>" alt="<?= $item->description ?>" uk-cover>
					</div>
				</a>
			</div>
		<?php }?>
	</div>
	<div style="background-color:Gainsboro;height:240px;">
		<div style="height: 50px;font-size: 17px;margin-left: 30;padding-top: 20px;">
			<mark style="background-color:pink;color:black"><?php echo $page->form_description ; ?></mark><br>
			<mark style="background-color:pink; color:red"><?php echo $page->form_description2 ; ?></mark>
		</div><br>
		<div style="height:158px;;">
		<?php echo $forms->render("contact"); ?>
		</div>
	</div>
</div> 