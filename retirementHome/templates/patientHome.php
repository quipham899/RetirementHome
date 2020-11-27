<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Patient's Home</title>

    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/latest/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Crimson+Text|Lato:400,400i,700" />
    <link rel="stylesheet" href="{{ url_for('static', filename='styles.css') }}" type="text/css" />

  </head>

  <body>

    <form action="../PHPFiles/patientHome.php" method="post">
      <p>
          <label for="patientId">PatientID:</label>
          <input type="text" name="patientId" id="patientId">
      </p>
      <p>
        <label for="date">Date:</label>
        <input type="text" name="date" id="date">
      </P>
      <p>
          <label for="patientName">Patient Name:</label>
          <input type="text" name="patientName" id="patientName">
      </p>
        <input type="submit" name = "PatientHome" value="submit">

    </form>
    <?php include '../PHPFiles/patientHome.php';?>
  </body>
</html>
