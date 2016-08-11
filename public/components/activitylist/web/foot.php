<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/config.js"></script>
<?php
    if(array_key_exists("extraJses",$config) && count($config["extraJses"]) > 0){
        foreach($config["extraJses"] as $js){
?>
<script src="<?php echo $js;?>"></script>
<?php
		}
    }
?>
<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/app.min.js"></script>
<script src="<?php echo $CURRENT_STATIC_DOMAIN?>/public/js/activitylist/web.min.js"></script>
<?php
    if(array_key_exists("matchJs", $config) && $config["matchJs"] == "true"){
?>
<script src="<?php echo $CURRENT_STATIC_DOMAIN . '/' . $router["activity_name"];?>/js/web.min.js"></script>
<?php
        }
?>

<?php require_once("../public/components/GA_Baidu_statistic.php");?>
</body>

</html>