<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>MailInfo</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <section  class="validation">
      <div class="container">
          <div class="validation__inner">
              <div class="validation__title">Please
                  enter the mail:</div>

              <form class="validation__form">
                  <input class="input" placeholder="example@mail.com" type="text" id="expression" name="expression" aria-label="validation-form" >
                  <button class="validation__button glare" id="send-btn" type="button">Search</button>
              </form>
              <table class="table">
                    <tr>
                        <td>Mail</td>
                        <td>name</td>
                        <td>lastName</td>
                        <td>id</td>
                    </tr>
              </table>

          </div>
      </div>
  </section>
  <script src="JS/jquery-3.6.0.min.js"></script>
<!--  <script-->
<!--          src="https://code.jquery.com/jquery-3.6.0.min.js"-->
<!--          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="-->
<!--          crossorigin="anonymous"></script>-->
  <script src="JS/app.js"></script>
</body>
</html>