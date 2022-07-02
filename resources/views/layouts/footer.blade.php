<footer class="main-footer">
    <?php 
        $startYear = 2022;
        $curYear = date('Y');
    ?>

    <strong>Copyright &copy; <?php echo $startYear.(($startYear != $curYear)? '-'.$curYear : '')?>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>