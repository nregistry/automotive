<?php

/** 
* follow instructions on "https://developers.facebook.com/docs/facebook-login/web/" 
*/

require_once('../init/initialization.php');
$title = 'Member || Register';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-header.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.login-form {
    font-family: arial;
    color: #333;
} 
.login-form form {
    width: 300px;
    margin: 0 auto;
    padding: 20px 30px 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #ffffff;
}
.login-form h2 {
    text-align: center;
    font-size: 35px;
    margin: 10px 0px 40px;
}
.login-form input {
    width: 100%;
    border: 1px solid #ddd;
    padding: 5px 10px;
    height: 45px;
    margin: 0px 0px 20px;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 17px;
}
.login-form button {
    margin: 10px auto 30px;
    display: table;
    font-size: 20px;
    padding: 10px 30px;
    background-color: #4CAF50;
    border: none;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}
.login-form button:hover{
  opacity: 0.8;
}
.login-form input[type="checkbox"] {
    height: 16px;
    width: 16px;
    margin-right: 5px;
    float: left;
}
.login-form .forget-psw {
    float: right;
}
.login-form .forget-psw a {
    color: #2196F3;
    text-decoration: none;
}
.social-btn button.twitter-btn, .social-btn button.facebook-btn {
    width: 100%;
    font-size: 18px;
    margin: 0px 0px 10px;
}
.social-btn button.twitter-btn{
  background-color: #26abfd;
}
.social-btn button.facebook-btn{
  background-color: #3f68be;
}
.social-btn {
    border-top: 1px solid #ddd;
    padding-top: 30px;
    margin-top: 30px;
}
.social-btn button i {
    margin-right: 5px;
    font-size: 20px;
}
@media (max-width: 767px){
.login-form form {
    width: 90%;
    padding: 20px 15px 20px;
}
.social-btn button.twitter-btn, .social-btn button.facebook-btn {
    font-size: 15px;
}
} 
</style>

<div class="login-form">
  <form id="loginForm" method="post">
    <h2>Login</h2>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Enter Password" name="password" required>
	<button type="submit" id="loginSubmitBtn" class="btn btn-primary btn-block">Login</button>

    <label class="remember-me"><input type="checkbox" name="remember">Remember me</label>
	
	<span class="forget-psw">
    <a href="<?php echo base_url(); ?>members/forgot.php">I forgot my password</a>
	</span>
	<span class="forget-psw">
    <a href="<?php echo base_url(); ?>members/register.php">Register a new membership</a>
	</span>

    <div class="social-btn">
      <button type="submit" class="twitter-btn"><i class="fa fa-twitter" aria-hidden="true"></i> Login with Twitter</button>
      <button type="submit" class="facebook-btn" scope="public_profile,email" onlogin="checkLoginState();"><i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook</button>
    </div>
  </form>
</div>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-footer.php"); ?>


<script>

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

    $(document).ready(function(){
        $('#loginForm').submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"<?php echo base_url(); ?>api/members/login.php",
                type:"POST",
                data:form_data, 
                dataType:"json",
                beforeSend:function(){
                    $('#loginSubmitBtn').html("Loading...");
                },
                success:function(data){
                    if(data.message == "success"){
                        toastr.success('You have successfully logged in to your account.');
                        $('#loginSubmitBtn').html("success");
                        window.location.href = "<?php echo base_url(); ?>members/index.php";
                    }

                    if(data.message == "errorUser"){
                        toastr.error('Please make sure you have entered correct username and password to continue');
                        $('#loginSubmitBtn').html("Error");
                        $('#password').val('');
                        return false;
                    }
                }
            });
        });
    });
</script>
