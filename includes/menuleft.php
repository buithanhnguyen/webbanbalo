<?php
    include 'connect.php';
?>

<div class="top-nav rsidebar span_1_of_left">
    <h3 class="cate">CATEGORIES</h3>
    <ul class="">
        <?php
            $sql='SELECT * FROM loai';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<li class="brand" style="font-size:30px;font-weight:bold"><a href="index.php?maloai='.$row['maloai'].'">'.$row['tenloai'].'</a></li>';
            }
        ?>
    </ul>
</div>
<!--initiate accordion-->
<script type="text/javascript">
    $(function () {
        var menu_ul = $('.menu > li > ul'),
            menu_a = $('.menu > li > a');
        menu_ul.hide();
        menu_a.click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true, true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true, true).slideUp('normal');
            }
        });

    });
</script>

<?php
    $sql="SELECT * FROM balo WHERE mabalo = '001-05' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class=" chain-grid menu-chain">
            <a href="single.php?mabalo=<?php echo $row['mabalo']; ?>"><img class="img-responsive chain" src="images/<?php echo explode(',',$row['hinh'])[0]; ?>" alt=" " /></a>
            <div class="grid-chain-bottom chain-watch">
                <span class="actual dolor-left-grid"><?php echo number_format($row['gia']); ?> VND</span>
                <span class="reducedfrom">4,900,000 VND </span>
                <h6><a href="single.html"><?php echo $row['tenbalo']; ?></a></h6>
            </div>
        </div>
    <?php } ?>

   

<!-- <div class=" chain-grid menu-chain">
    <a href="single.html"><img class="img-responsive chain" src="images/wat.jpg" alt=" " /></a>
    <div class="grid-chain-bottom chain-watch">
        <span class="actual dolor-left-grid">300$</span>
        <span class="reducedfrom">500$</span>
        <h6><a href="single.html">Lorem ipsum dolor</a></h6>
    </div>
</div> -->
<a class="view-all all-product" href="product.php">VIEW ALL PRODUCTS<span> </span></a>