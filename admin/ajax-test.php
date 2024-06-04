<?php include 'includes/header.php'; ?>

<div id="comments" class="card">
<?php 
$products  = getAll('products');
if($products){
    while($row = mysqli_fetch_assoc($products)){
        echo "<p>";
        echo $row['id'];
        echo "<br/>";
        echo $row['name'];
        echo "</p>";
    }
}
?>
</div>
<button>show more comments</button>


</body>
</html>
<script>
$(document).ready(function(){
    var commentCount =2;
    $("button").click(function(){
        commentCount = commentCount + 2;
        $("#comments").load("orders.php",{
            commentNewCount : commentCount,
            
        });
    });
});
</script>