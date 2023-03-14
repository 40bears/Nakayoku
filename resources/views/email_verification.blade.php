<html>

<body>
    Thank you for registering.<br>
    We have received your registration request. <br>
    <br>
    <br>
    Please verify your email by clicking the link below. <br>
    <br>
    <br>
    Email address: {{$email}}<br>
    Registration email confirmation link: <br>
    <a style="width: 50%;" href="{{ url("signup-confirmation?&email=$email&token=$otp") }}">
        {{ url("signup-confirmation?email=$email&token=$otp") }}</a><br>
    <br>
    <br>
    If you have any questions or concerns, please feel free to contact us.

</body>

</html>