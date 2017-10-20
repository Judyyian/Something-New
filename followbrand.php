<?php
include("header.php");
?>
<style>
.list-group {
    overflow: hidden;
    border-left: 1px solid rgb(221, 221, 221);
    border-right: 1px solid rgb(221, 221, 221);
}
.list-group-item:first-child, .list-group-item:last-child {
    border-top-right-radius: 0px;
    border-top-left-radius: 0px;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
    overflow: hidden;
}
.list-group-item {
    border-left: 0px solid rgb(221, 221, 221);
    border-right: 0px solid rgb(221, 221, 221);
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
}
.list-group-item > .show-menu {
    position: absolute;
    height: 100%; width:24px;
    top: 0px; right: 0px;
    background-color: rgba(51, 51, 51, 0.2);
    cursor: pointer;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
}
.list-group-item > .show-menu > span {
    position: absolute;
    top: 50%;
    margin-top: -7px;
    padding: 0px 5px;
}
.list-group-submenu {
    position: absolute;
    top: 0px;
    right: -88px;
    white-space: nowrap;
    list-style: none;
    padding-left: 0px;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
}
.list-group-submenu .list-group-submenu-item {
    float: right;
    white-space: nowrap;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: rgb(51, 51, 51);
    color: rgb(235, 235, 235);
}
.list-group-item.open {
    margin-left: -88px;
}
.list-group-item.open > .show-menu {
    right: 88px;
}
.list-group-item.open .list-group-submenu{
    right: 0px;
}
.list-group-submenu .list-group-submenu-item.primary {
    color: rgb(255, 255, 255);
    background-color: rgb(50, 118, 177);
}
.list-group-submenu .list-group-submenu-item.success {
    color: rgb(255, 255, 255);
    background-color: rgb(92, 184, 92);
}
.list-group-submenu .list-group-submenu-item.info {
    color: rgb(255, 255, 255);
    background-color: rgb(57, 179, 215);
}
.list-group-submenu .list-group-submenu-item.warning {
    color: rgb(255, 255, 255);
    background-color: rgb(240, 173, 78);
}
.list-group-submenu .list-group-submenu-item.danger {
    color: rgb(255, 255, 255);
    background-color: rgb(217, 83, 79);
}	
</style>
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li>Following brands</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<?php

$datatable = "brands";

$sql = " SELECT *  FROM ".$datatable;
$rs_result = $conn->query($sql); 
while($row = $rs_result->fetch_assoc()) {
    ?>
    <br>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <ul class="list-group">
                <li class="list-group-item open">
                   <?php echo $row["brand_name"];?>
                    <span class="show-menu">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </span>
                    <ul class="list-group-submenu">
                        <li class="list-group-submenu-item success"><span class="glyphicon glyphicon-remove"></span></li>
                        <li class="list-group-submenu-item danger"><span class="glyphicon glyphicon-ok"></span></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>                            
<script>
  $(function () {
    $('.list-group-item > .show-menu').on('click', function(event) {
        event.preventDefault();
        $(this).closest('li').toggleClass('open');
    });
});
</script>

    <?php 
}; 
?>	
<?php
include("footer.php");
?>