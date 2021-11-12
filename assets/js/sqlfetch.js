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
            loadData: function (test) {
                return $.ajax({
                    type: "GET",
                    url: "./library/employeeManager.php",
                    // dataType: 'json',
                    data: test
                });
            }
        },
        fields: [{
                title: "Id",
                name: "id",
                type: "",
                css: ''
            },
            {
                title: "First Name",
                name: "firstname",
                type: "text",
                width: 150,
                validate: "required"
            },
            {
                type: "control"
            }

        ]
    });