<?php
if(!session_id())
    session_start();
    
include ("dbconnect.php");

function pay_khalti($amt,$pid,$uid)
{   
        if(!session_id()){
            session_start();
        }
    $url = "https://test-pay.khalti.com";
    $data = [
        'amt' => $amt,
        'pdc' => 0,
        'psc' => 0,
        'txAmt' => 0,
        'tAmt' => $amt,
        'pid' => $pid,
        'scd' => 'EPAYTEST',
        'su' => 'http://localhost/onlineliquorstore/payment/paySuccess.php?q=su&&uid='.$uid.'',
        'fu' => 'http://localhost/onlineliquorstore/payment/payFail.php?q=fu'
    ];
?>
<form id="myForm" action="<?= $url ?>" method="post">
    <?php
        foreach ($data as $name => $value) {
            echo '<input type="hidden" name="' . htmlentities($name) . '" value="' . htmlentities($value) . '">';
        }
        ?>
</form>
<script type="text/javascript">
document.getElementById('myForm').submit();
</script>
<?php
}
function pay_esewa($amt, $pid,$uid)
{   
        if(!session_id()){
            session_start();
        }
    $url = "https://uat.esewa.com.np/epay/main";
    $data = [
        'amt' => $amt,
        'pdc' => 0,
        'psc' => 0,
        'txAmt' => 0,
        'tAmt' => $amt,
        'pid' => $pid,
        'scd' => 'EPAYTEST',
        'su' => 'http://localhost/onlineliquorstore/payment/paySuccess.php?q=su&&uid='.$uid.'',
        'fu' => 'http://localhost/onlineliquorstore/payment/payFail.php?q=fu'
    ];
?>
<form id="myForm" action="<?= $url ?>" method="post">
    <?php
        foreach ($data as $name => $value) {
            echo '<input type="hidden" name="' . htmlentities($name) . '" value="' . htmlentities($value) . '">';
        }
        ?>
</form>
<script type="text/javascript">
document.getElementById('myForm').submit();
</script>
<?php
}

?>