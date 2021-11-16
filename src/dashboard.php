<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee dashboard</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
  <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">
</head>

<body>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <header class="bg-light mb-4 ">
      <?php
            require_once("../assets/html/header.html");
            ?>
    </header>
    <main class="container-fluid">
      <h3>Employees:</h3>

      <!-- Here goes the table -->

      <div class="" id='grid-table'>
      </div>
    </main>
    <footer class="fixed-bottom">
      <?php
            require("../assets/html/footer.html");
            ?>
    </footer>

    <!-- jQuery and ajax Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="../assets/js/index.js"></script> -->

    <!-- jsGrid Library -->
    <script src="../node_modules/jsgrid/src/jsgrid.core.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-indicator.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.load-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.sort-strategies.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.validation.js"></script>
    <script src="../node_modules/jsgrid/src/jsgrid.field.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.text.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.number.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.checkbox.js"></script>
    <script src="../node_modules/jsgrid/src/fields/jsgrid.field.control.js"></script>
    <script>
    $(document).ready(function() {
      $("#grid-table").jsGrid({
        width: "100%",
        height: "600px",

        filtering: true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete data?",

        controller: {
          loadData: function(get) {
            return $.ajax({
              type: "GET",
              url: "./library/employeeManager.php",
              dataType: 'json',
              data: get,
              success: function(get) {
                console.log(get);
              },
              error: function(get) {
                console.log(get);
              },
            })
          },
          insertItem: function(post) {
            return $.ajax({
              type: "POST",
              url: "./library/employeeManager.php",
              dataType: 'json',
              data: post
            });
          },
          updateItem: function(item) {
            console.log(item);
            return $.ajax({
              type: "PUT",
              url: "./library/employeeManager.php",
              dataType: 'json',
              data: item,
              success: function(item) {
                console.log(item);
              },
              error: function(request, error) {
                console.log(error);
                console.log(request);
              }
            })
          },
          deleteItem: function(item) {
            return $.ajax({
              type: "DELETE",
              url: "./library/employeeManager.php",
              dataType: 'json',
              data: item,
              success: function(item) {
                console.log(item);
              },
              error: function(request, error) {
                console.log(error);
                console.log(request);
              }
            });
          },
        },
        fields: [{
            title: "Id",
            name: "id",
            type: "number",
            css: 'd-none'
          },
          {
            title: "First Name",
            name: "name",
            type: "text",
            // width: 150,
            validate: "required"
          },
          //   {
          //     title: "Last Name",
          //     name: "lastname",
          //     type: "text",
          //     // width: 150,
          //     validate: "required"
          //   },
          {
            title: "Email",
            name: "email",
            type: "text",
            // width: 150,
            validate: "required"
          },
          {
            title: "Sex",
            name: "gender",
            type: "text",
            // type: "select",
            // items: [{
            //         Name: "",
            //         Id: ''
            //     },
            //     {
            //         Name: "Male",
            //         Id: 'male'
            //     },
            //     {
            //         Name: "Female",
            //         Id: 'female'
            //     },
            // ],
            // width: 150,
            validate: "required"
          },
          {
            title: "Age",
            name: "age",
            type: "text",
            validate: function(value) {
              if (value > 18) {
                return true;
              }
            }
            // width: 150,
          },
          {
            title: "Street No.",
            name: "street",
            type: "text",
            // width: 150,
            validate: "required"
          },
          {
            title: "City",
            name: "city",
            type: "text",
            // width: 150,
            validate: "required"
          },
          {
            title: "State",
            name: "state",
            type: "text",
            // width: 150,
            validate: "required"
          },
          {
            title: "Postal Code",
            name: "postalcode",
            type: "text",
            // width: 150,
            validate: "required"
          },
          {
            title: "Phone Number",
            name: "phone",
            type: "text",
            // type: "int",
            // width: 150,
            validate: "required"
          },
          {
            type: "control"
          }

        ]
      });
    })
    </script>
</body>

</html>