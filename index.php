<?php 
include "config.php";
?>
<!doctype html>
<html>

<head>
    <title>How to Auto populate dropdown with jQuery AJAX</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        $("#sel_depart").change(function() {
            var deptid = $(this).val();

            $.ajax({
                url: 'getUsers.php',
                type: 'post',
                data: {
                    depart: deptid
                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;

                    $("#sel_user").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $("#sel_user").append("<option value='" + id + "'>" + name +
                            "</option>");

                    }
                }
            });
        });

    });
    </script>
</head>

<body>


    <div>Authors </div>
    <select id="sel_depart">
        <option value="0">- Select -</option>
        <?php 
            // Fetch Department
            $sql_authors = "SELECT * FROM authors";
            $authors_data = mysqli_query($con,$sql_authors);
            while($row = mysqli_fetch_assoc($authors_data) ){
                $departid = $row['id'];
                $depart_name = $row['aut_name'];
              
                // Option
                echo "<option value='".$departid."' >".$depart_name."</option>";
            }
            ?>
    </select>
    <div class="clear"></div>

    <div>Books </div>
    <select id="sel_user">
        <option value="0">- Select -</option>
    </select>
</body>

</html>