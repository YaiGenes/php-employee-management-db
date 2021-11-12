<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../assets/css/main.css" rel="stylesheet" />
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <header class="bg-light mb-4">
    </header>
    <main class="container-xl mx-auto pb-90">
        <form action="./library/employeeController.php?update=true" method="POST" class="container-md">
            <h3>Employee: </h3>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input name="name" type="text" class="form-control" id="inputName" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputMail">Email adrress</label>
                        <input name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputCity">City</label>
                        <input name="city" type="text" class="form-control" id="inputCity" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputState">State</label>
                        <input name="state" type="text" class="form-control" id="inputState" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputPostalCode">Postal Code</label>
                        <input name="postalCode" type="number" class="form-control" id="inputPostalCode" value="">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="inputLastName">Last Name</label>
                        <input name="lastName" type="text" class="form-control" id="inputLastName" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputGender">Example select</label>
                        <select class="form-control" id="inputGender" name="gender[]">
                            <option value="default">
                            </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStreetAddress">Street Adrress</label>
                        <input name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputAge">Age</label>
                        <input name="age" type="number" class="form-control" id="inputAge" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputPhoneNumber">Phone Number</label>
                        <input name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="">
                    </div>
                </div>
            </div>
            <a type="btn" class="btn btn-secondary" href="dashboard.php">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <footer class="fixed-bottom">
        <?php
        require("../assets/html/footer.html");
        ?>
    </footer>
    <!-- <script src="../assets/js/index.js"></script> -->
</body>

</html>