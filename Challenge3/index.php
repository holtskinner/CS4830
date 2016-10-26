<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="container">
    <h1 class="center-align">Challenge 3</h1>
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
                    <input id="first-name" type="text" class="validate">
                    <label for="first-name">First Name</label>
                </div>
                <div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
                    <input id="last-name" type="text" class="validate">
                    <label for="last-name">Last Name</label>
                </div>
                <div class="input-field col s6"> <i class="material-icons prefix">cake</i>
                    <input id="birthdate" type="date" class="datepicker">
                    <label for="birthdate">Birthdate</label>
                </div>
                <div class="input-field col s6"> <i class="material-icons prefix">account_circle</i>
                    <input id="last-name" type="text" class="validate">
                    <label for="last-name">Last Name</label>
                </div>
                <div class="input-field col s6"> <i class="material-icons prefix">phone</i>
                    <input id="telephone" type="tel" class="validate">
                    <label for="telephone">Telephone</label>
                </div>
            </div>
            <div class="center-align">
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
        </form>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
  $(document).ready(function() {
    $('select').material_select();
    $('.datepicker').pickadate({
      selectMonths: true,
      selectYears: 15
    });
  });

  </script>
</body>

</html>
