<?php require 'inc/head.php';

if (!empty($_SESSION['cookie'])) {
    $cookies = array_count_values($_SESSION['cookie']);
}
?>
    <section class="cookies container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Cookie</th>
                        <th>Quantité :</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Pecan nuts</td>
                        <td><?php echo isset($cookies[46])? $cookies[46] : 0 ?></td>
                    </tr>
                    <tr>
                        <td>Chocolate chips</td>
                        <td><?php echo isset($cookies[36])? $cookies[36] : 0 ?></td>
                    </tr>
                    <tr>
                        <td>Chocolate cookie</td>
                        <td><?php echo isset($cookies[58])? $cookies[58] : 0 ?></td>
                    </tr>
                    <tr>
                        <td>M&M's&copy; cookies</td>
                        <td><?php echo isset($cookies[32])? $cookies[32] : 0 ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php require 'inc/foot.php';