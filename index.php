<?php
include_once('db.php');
$result = mysqli_query($con, "SELECT * FROM `products`
");
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <a class="btn btn-danger my-5" href="javascript:void(0)" onclick="delete_all()">Delete</a>

            <form method="post" id="frm">
                <div class="table-responsive ">
                    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" name="" id="delete" onclick="select_all()" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr class="table-primary" id="box<?= $row['id'] ?>">
                                    <td scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" name="checkbox[]" id="<?= $row['id'] ?>" value="<?= $row['id'] ?>" type="checkbox">
                                        </div>
                                    </td>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['sku'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </form>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        function select_all() {
            if ($('#delete').prop("checked")) {
                $('input[type=checkbox]').each(function() {
                    $('#' + this.id).prop('checked', true);
                });
            } else {
                $('input[type=checkbox]').each(function() {
                    $('#' + this.id).prop('checked', false);
                });

            }
            // console.log(this.id);
        };


        function delete_all() {
            var check = confirm("Are you Sure?")
            if (check == true) {
                $.ajax({
                    url: 'delete.php',
                    type: 'post',
                    data: $('#frm').serialize(),
                    success: function(result) {
                        $('input[type=checkbox]').each(function() {
                            if ($('#' + this.id).prop("checked")) {
                                $('#box' + this.id).remove();
                            };
                        });
                    }
                })
            }

        }
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>