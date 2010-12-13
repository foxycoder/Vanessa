<div id="title"></div>
<div id="login-button" class="small-arrow blue" onclick="plummitAndAway($('UserLoginForm'));"><?php __('Login')?></div>
<?php
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array('value' => 'UvaAnetID', 'label' => false, 'onfocus' => 'this.value = "";', 'onblur' => 'if (this.value=="") this.value="UvAnetID";'));
    echo $form->input('password', array('value' => __('Password', true), 'type' => 'text', 'label' => false, 'onfocus' => 'this.value = ""; this.setAttribute("type", "password");', 'onblur' => 'if (this.value=="") { this.value="Password"; this.setAttribute("type", "text"); }'));
    echo $form->end();
?>
<div id="vanessa" class="vanessa"></div>
<div id="speech-bubble" class="speech-hi"></div>
<style>
#login-button { position: absolute; z-index: 2; top: 68px; left: 278px; }
#vanessa { position: absolute; z-index: 2; top: 198px; left: 248px; }
#speech-bubble { position: absolute; z-index: 3; top: 138px; left: 388px; }
</style>
<script language="javascript">
document.observe('dom:loaded', function() {
	$('speech-bubble').hide();
	setTimeout(function() {
  	$('login').morph('top:250px;', { duration:1.3, transition: 'elastic' });
	}, 500);
  	setTimeout(function() {
	  	$('speech-bubble').appear();
  	}, 2000);
  	$$('input').each(function(i) {
  	  	i.observe('keydown', function(e) {
  	  	  	if (e.which == 13) {
  	  	  	  	plummitAndAway($('UserLoginForm'));
  	  	  	}
  	  	});
  	});
});
function plummitAndAway(form) {
	$('login').transform(
		{
			scale: .8,
			duration: .3,
			transition: 'elastic'
		});
	setTimeout(function() {
		$('login').morph(
    		'top:-260px; left:100%',
    		{
    			duration: .5,
    			transition: 'easeInBack',
    			after: function() {
    				$('login').hide();
    				form.submit();
    			}
    		});
		},
	500);
}
</script>