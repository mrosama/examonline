<?php
$this->load->helper('url');

?>

<table align="center">
<tr><td align="right" dir="ltr">
<?php
echo str_replace("{BaseCounter}",base_url('bin/counter/'),$hitcounter);
?>
</td></tr></table>