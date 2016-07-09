<?php $page="home"; include "top.php"; ?>

<div id="main" class="page">
	<div style="width: 570px;float: left;">
		<div style="margin-bottom:20px;"><iframe width="560" height="315" src="https://www.youtube.com/embed/ikEG_s6Z1d8" frameborder="0" allowfullscreen></iframe></div>
	</div>
	<div style="width: 570px;float: left;margin-left:20px;">
		<h2>HAVE A QUESTION?</h2>
		<div id="contact_form">
			<div>
				<input id="nom" type="text" placeholder="name">&nbsp;&nbsp;<input id="company" type="text" placeholder="company"><br/>
				<input id="phone" type="text" placeholder="phone">&nbsp;&nbsp;<input id="email" type="text" placeholder="email"><input id="botty" type="text" value="" style="width:0px;height:0px;border:0;padding:0;margin:0;" />
			</div>
			<div><textarea id="msg" placeholder="message"></textarea></div>
			<div style="margin-top:20px;">
				<h3 style="font-size:24px;">541-914-3827</h3>
				<span id="send" onclick="send();">send</span>
				<div class="clearer"></div>
			</div>
			<div class="clearer"></div>
		</div>
	</div>
	<div class="clearer"></div>
</div>

<?php include "bottom.php"; ?>