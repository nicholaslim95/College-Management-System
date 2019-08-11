<!DOCTYPE html>
<!--
// @author: Low Teck Cheng
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <form class="form-inline" method="post" action="#">
                    <table class='table table-hover'>
                        <tr>
                        <tr>
                            <th colspan='2' style='text-align:center;'> Compare Branches</th>
                        </tr>
                        <?php
                        include_once 'classes/Database.php';
                        include_once 'controllers/BranchesController.php';
                        include_once 'views/BranchesView.php';

                        $branches = new BranchesView();
                        $branches->showcompareBranches("b1", "1st");
                        echo '</tr><tr>';
                        $branches->showcompareBranches("b2", "2nd");
                        ?>
                        </tr>
                        <tr>
                            <td colspan='2'  style='text-align:center;'>
                                <input type="submit" name="submit" value="Compare" class="btn btn-default"/>
                            </td>
                        </tr>
                    </table>
            </form>
            <div class="container">
            <form class="form-inline" method="POST" action="">
                    <table border="1" class='table table-hover'>
                        <tr>
                        <tr>
                            <th colspan='3' style='text-align:center;'>Comparison</th>
                        </tr>
                        <?php
                        include_once 'classes/Database.php';
                        include_once 'controllers/BranchesController.php';
                        include_once 'views/BranchesView.php';

                        $brancheses = new BranchesView();
                        $brancheses->showtableCompareBranch();
                        
                        
                        ?>
                        </tr>
                    </table>
            </form>
        </div>
    </body>
</html>
