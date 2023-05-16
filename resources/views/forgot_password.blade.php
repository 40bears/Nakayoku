<html>

<body>
    Thank you for using GLOBAL CARPATICA SL.<br>
    We have received your password change request. <br>
    <br>
    <br>
    Please verify your identity by clicking the link below. <br>
    <br>
    <br>
    Email address: {{$email}}<br>
    Registration email confirmation link: <br>
    <a style="width: 50%;" href="{{ url("forgot-password-confirmation?&email=$email&token=$otp") }}">
        {{ url("forgot-password-confirmation?email=$email&token=$otp") }}</a><br>
    <br>
    <br>
    If you have any questions or concerns, please feel free to contact us.

</body>

</html>